<?php

namespace App\Http\Controllers;

use Auth;
use Session;

use Carbon\Carbon;
use App\Models\Post;

use App\Models\User;
use App\Models\Order;
use App\Models\Banner;
use App\Models\Product;
use App\Models\Project;
use App\Models\Category;
use App\Models\StoreConfig;

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
        /*
        $product = Product::first();
        $payment = PaymentMethod::where('is_active', true)->first();
        $shipment = ShipmentMethod::first();
        $category = Category::first();

        $total_products = Product::where('status', 'Publicado')->get();
        $total_stock = 0;

        foreach ($total_products as $t_total) {
            $total_stock += $t_total->stock;
        };

        $total_stock;

        $new_clients = User::role('customer')->where('created_at', '>=', Carbon::now()->subWeek())->count();

        $ven_total = 0;
        $ven_mes = 0;
        $ven_semana = 0;
        $ven_semana_prev = 0;

        foreach ($ventas_total as $v_total) {
            $ven_total += $v_total->payment_total;
        };

        foreach ($ventas_mes as $v_month) {
            $ven_mes += $v_month->amount;

        };

        foreach ($ventas_semana as $v_week) {
            $ven_semana += $v_week->payment_total;
        };

        foreach ($ventas_semana_prev as $v_week_prev) {
            $ven_semana_prev += $v_week_prev->payment_total;
        };

        $ven_total;
        $ven_mes;
        $ven_semana;
        $ven_semana_prev;

        if ($ventas_total->count() == 0) {
            $avg_order = 0;
        }else{
            $avg_order = ($ven_total)/($ventas_total->count());
        }

          $banners = Banner::where('is_active', true)->get();
        $projects = Project::where('is_active', true)->get();
        $posts = Post::where('is_publish', 1)->get();



        */


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

        if (Auth::user()->hasRole(['webmaster', 'admin', 'supplier'])) {
            $admin->supplier_id = Auth::user()->supplier_id;
        }

        if (Auth::user()->hasRole(['supplier'])) {
            $admin->assignRole('supplier');
        }

        if (Auth::user()->hasRole(['customer'])) {
            $admin->client_id = Auth::user()->client_id;
            $admin->assignRole('customer');
        }

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

    public function help()
    {
        return view('back.help');
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
