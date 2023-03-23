<?php

namespace App\Http\Controllers;

use Session;
use Auth;
use Image;
use Str;

use App\Models\Category;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class CategoryController extends Controller
{

    public function index()
    {
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        //Validar
        $this->validate($request, array(
            'name' => 'required|max:255',
        ));

        // Guardar datos en la base de datos
        $check_if_exists = Category::where('name', $request->name)->first();

        // Guardar datos en la base de datos
        $category = new Category;

        $category->name = $request->name;
        if (empty($check_if_exists)) {
            $category->slug = Str::slug($request->name, '-');
            $category->color = $request->color;
            $category->priority = $request->priority;
        } else {
            Session::flash('error', 'Esa categoría ya existe.');
            // Enviar a vista
            return redirect()->back();
        }

        $category->save();


        // Mensaje de session
        Session::flash('exito', 'Elemento guardado correctamente en la base de datos.');

        return redirect()->back();
    }

    public function show($id)
    {

        $category = Category::find($id);
        $products = Product::whereHas('subCategory', function ($query) use ($id) {
            return $query->where('category_id', '=', $id);
        })->get();
        return view('back.categories.show')->with('category', $category)->with('products', $products);
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('back.categories.show')->with('category', $category);
    }

    public function update(Request $request, $id)
    {
        //Validar
        $this->validate($request, array(
            'name' => 'required|max:255',
            'image' => 'sometimes|min:10|max:2100|image'
        ));

        // Guardar datos en la base de datos
        $category = Category::find($id);

        foreach ($category->children as $sub) {
            $sub->delete();
        }

        $category->name = $request->name;

        if (empty($check_if_exists)) {
            $category->slug = Str::slug($request->name, '-');
        } else {

            if ($request->parent_id == 0) {
                // Mensaje de session
                Session::flash('error', 'Esta categoría ya existe.');

                // Enviar a vista
                return redirect()->back();
            } else {
                $parent_name = Category::where('id', $request->parent_id)->first();

                $category->slug = Str::slug(($parent_name->name . ' ' . $request->name), '-');
            }
        }

        $category->parent_id = $request->parent_id;
        $category->priority = $request->priority;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = Str::slug($request->name, '-') . '.' . $image->getClientOriginalExtension();
            $location = public_path('img/categories/' . $filename);

            Image::make($image)->resize(1280, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($location);

            $category->image = $filename;
        }

        $category->save();

        // Mensaje de session
        Session::flash('success', 'Se guardó tu categoría exitosamente en la base de datos.');

        // Enviar a vista
        return redirect()->back();
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $products = Product::where('category_id', $category->id)->get();

        foreach ($products as $product) {
            $product->subCategory()->detach();
            $product->category_id = NULL;
            $product->status = 'Borrado';

            $product->save();
        }

        foreach ($category->children as $sub) {
            $sub->delete();
        }

        $category->delete();

        Session::flash('success', 'Elemento eliminado correctamente de la base de datos.');

        return redirect()->route('categories.index');
    }
}
