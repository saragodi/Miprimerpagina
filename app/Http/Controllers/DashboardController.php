<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use Image;
use Str;

use Carbon\Carbon;
use App\Models\Post;

use App\Models\User;
use App\Models\Order;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Project;
use App\Models\Category;
use App\Models\StoreConfig;
use App\Models\SEO;

use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Models\ShipmentMethod;

use Spatie\Permission\Models\Role;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('back.dashboard');
    }

    public function configuration()
    {
        return view('back.configuration');
    }

    public function admin_settings()
    {
        $user = Auth::user();

        return view('back.settings.index')
            ->with('user', $user);
    }

    public function systemConfig()
    {
        $webmaster = User::role('webmaster')->get();
        $admin  = User::role('admin')->get();
        $analyst  = User::role('analyst')->get();
        $users = $webmaster->merge($admin->merge($analyst));
        $roles = Role::where('name', '!=', 'customer')->get();

        return view('back.settings.system')->with('users', $users)->with('roles', $roles);
    }

    public function users()
    {
        if (Auth::user()->hasRole(['webmaster', 'admin'])) {
            $webmaster = User::role('webmaster')->get();
            $admin  = User::role('admin')->get();
            $analyst  = User::role('analyst')->get();
            $users = $webmaster->merge($admin->merge($analyst));
        }

        $roles = Role::where('name', '!=', 'customer')->where('name', '!=', 'supplier')->get();

        return view('back.settings.users')
            ->with('users', $users)
            ->with('roles', $roles);
    }

    public function create_u(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email|required|unique:users',
            'password' => 'required|min:4',
        ]);

        $admin = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        $rol = Role::findByName($request->rol);

        // Guardar primero el admin
        $admin->save();

        // Asignar el Rol
        $admin->assignRole($rol->name);

        return redirect()->back();
    }

    public function user_d($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect()->back();
    }


    public function changeColor()
    {
        $user_id = Auth::user()->id;

        $user = User::find($user_id);

        if ($user->color_mode == 0) {
            $user->color_mode = 1;
        } else {
            $user->color_mode = 0;
        }
        $user->save();

        // Mensaje de session
        Session::flash('success', 'Modo de color cambiado exitosamente.');

        return redirect()->back();
    }

    public function fixNav()
    {
        $user_id = Auth::user()->id;

        $user = User::find($user_id);

        if ($user->color_mode == 0) {
            $user->color_mode = 1;
        } else {
            $user->color_mode = 0;
        }
        $user->save();

        // Mensaje de session
        Session::flash('success', 'Modo de color cambiado exitosamente.');

        return redirect()->back();
    }

    public function messages()
    {
        return view('back.messages');
    }

    public function seo()
    {
        $seo = SEO::take(1)->first();

        return view('back.settings.seo')
            ->with('seo', $seo);
    }

    public function generalSearch(Request $request)
    {
        $search_query = $request->input('query');

        $products = Product::where('name', 'LIKE', "%{$search_query}%")
            ->where('category_id', '!=', NULL)
            ->orWhere('description', 'LIKE', "%{$search_query}%")
            ->orWhere('search_tags', 'LIKE', "%{$search_query}%")
            ->orWhereHas('category', function ($query) use ($search_query) {
                $query->where(strtolower('name'), 'LIKE', '%' . strtolower($search_query) . '%');
            })->paginate(30);

        return view('back.general_search')->with('products', $products);
    }
}
