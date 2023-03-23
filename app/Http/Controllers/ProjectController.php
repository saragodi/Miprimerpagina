<?php

namespace App\Http\Controllers;

use Str;
use Auth;
use Image;
use Session;
use Purifier;

use App\Models\Project;
use App\Models\ProjectImage;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::orderBy('updated_at', 'desc')->paginate(10);

        return view('back.projects.index')
            ->with('projects', $projects);
    }

    public function create()
    {
        return view('back.projects.create');
    }

    public function store(Request $request)
    {
        //Validar
        $this->validate($request, array(
            'title' => 'unique:projects|required|max:255',
            'main_picture' => 'required|min:10|max:2100',
        ));

        $project = new Project;

        $project->name = $request->title;
        $project->slug = Str::slug($request->title, '_');

        $project->subtitle = $request->subtitle;
        $project->company = $request->company;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = Str::slug($request->title, '-') . 'main-image' . time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('img/projects/' . $filename);

            Image::make($image)->resize(1280, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($location);

            $project->main_picture = $filename;
        }

        $project->is_active = true;

        $project->body = $request->body;

        $project->save();

        // Mensaje de session
        Session::flash('success', 'Se creo el proyecto con exito.');

        // Enviar a vista
        return redirect()->route('projects.edit', $project->id);
    }

    public function storeImage(Request $request)
    {
        $project = Project::find($request->project_id);


        if ($request->hasFile('image')) {

            $var_imagen = new ProjectImage;
            $var_imagen->project_id = $request->project_id;

            $image = $request->file('image');
            $filename = $project->slug . time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('img/projects/' . $filename);

            Image::make($image)->resize(1280, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($location);

            $var_imagen->image = $filename;

            $var_imagen->save();
        }

        // Mensaje de session
        Session::flash('success', 'Imagen guardada exitosamente para el producto.');

        // Enviar a vista
        return redirect()->back();
    }

    public function updateImage($id)
    {
        $var_imagen = ProjectImage::find($id);

        if ($request->hasFile('image')) {
            // Guardar datos en la base de datos

            // Esto se logra gracias a la libreria de imagen Intervention de Laravel
            $imagen = $request->file('image');
            $nombre_archivo = $project->slug . time() . '.' . $imagen->getClientOriginalExtension();
            $ubicacion = public_path('img/projects/' . $nombre_archivo);

            Image::make($imagen)->resize(1280, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($ubicacion);

            $var_imagen->image = $nombre_archivo;
        }

        $var_imagen->save();

        Session::flash('success', 'La imagen fue actualizada exitosamente');


        return redirect()->back();
    }

    public function destroyImage($id)
    {
        $var_imagen = ProjectImage::find($id);
        $var_imagen->delete();
        Session::flash('success', 'La imagen fue borrada exitosamente');


        return redirect()->back();
    }

    public function mainImage(Request $request)
    {
        $project = Project::find($id);

        if ($request->hasFile('image')) {
            // Guardar datos en la base de datos

            // Esto se logra gracias a la libreria de imagen Intervention de Laravel
            $imagen = $request->file('image');
            $nombre_archivo = $project->slug . time() . '.' . $imagen->getClientOriginalExtension();
            $ubicacion = public_path('img/projects/' . $nombre_archivo);

            Image::make($imagen)->resize(1280, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($ubicacion);

            $project->main_picture = $nombre_archivo;

            $project->save();
        }


        Session::flash('success', 'La imagen fue actualizada exitosamente');
        return redirect()->back();
    }

    public function edit($id)
    {
        $project = Project::find($id);

        return view('back.projects.edit')->with('project', $project);
    }

    public function show($id)
    {
        $project = Project::find($id);

        return view('back.projects.show')
            ->with('project', $project);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function status(Request $request)
    {
        // Guardar datos en la base de datos
        $project = Project::find($request->id);

        if ($project->is_active == true) {
            $project->is_active = false;
        } else {
            $project->is_active = true;
        }

        $project->save();

        // Mensaje de session
        Session::flash('success', 'El proyecto se ha cambiado de estado.');

        // Enviar a vista
        return redirect()->route('projects.index');
    }

    public function destroy($id)
    {
        $project = Project::find($id);

        $project->delete();

        // Mensaje de session
        Session::flash('success', 'El proyecto se ha eliminado.');

        return redirect()->back();
    }
}
