<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Job;

use App\Models\Post;
use App\Models\Banner;
use App\Models\Project;

use App\Models\Category;
use App\Models\Applicant;
use App\Models\Campaing;
use App\Models\LegalText;
use Str;

use Auth;
use Session;

use Image;

use Mail;
use File;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $today = Carbon::now()->format('Y-m-d');

        $banner = Banner::where('is_active', true)->orderBy('updated_at', 'asc')->get()->take(1);

        $campaings = Campaing::where('status', true)->get()->take(6);

        return view('front.index')
            ->with('banner', $banner)
            ->with('campaings', $campaings);
    }

    public function jobs()
    {
        $jobs = Job::where('status', true)->orderBy('created_at', 'asc')->paginate(10);

        return view('front.jobs')
            ->with('jobs', $jobs);
    }

    public function job($slug)
    {
        $job = job::where('slug', $slug)->first();

        return view('front.job_detail')
            ->with('job', $job);
    }

    public function applyTo(Request $request, $id)
    {

        $applicant = new Applicant;

        $applicant->job_id = $id;

        $applicant->names = $request->names;
        $applicant->lastnames = $request->lastnames;
        $applicant->phone = $request->phone;
        $applicant->email = $request->email;

        /* Crear Slug del Nombre */
        $nameslug = Str::slug($request->names);


        if ($request->hasFile('file')) {
            $archivo = $request->file('file');
            $filename = $nameslug . '-cv.'   . $archivo->getClientOriginalExtension();

            $location = public_path('docs/applicants/');
            $archivo->move($location, $filename);

            $applicant->file = $filename;
        }

        $applicant->save();

        $job = Job::find($id);

        //Correo
        $data = array(
            'name' => $applicant->names,
            'email' => $applicant->email,
            'lastname' => $applicant->lastnames,
            'phone' => $applicant->phone,
            'job' => $job->name,
        );

        $email = $applicant->email;
        $name = $applicant->name;

        $files = [
            public_path('docs/applicants/' . $applicant->file),
        ];


        try {
            Mail::send('mail.apply', $data, function ($message) use ($data, $email, $name) {
                $message->to($email, $name)->subject('Hey! Gracias por tu postulación.');

                $message->from('postulaciones.derch@gmail.com', 'Derch');
            });

            Mail::send('mail.new_user', $data, function ($message) use ($files) {
                $message->to('miriam.derch@gmail.com', 'Derch')->subject('Hey! Se han postulado para una vacante');

                $message->from('postulaciones.derch@gmail.com', 'Derch');

                foreach ($files as $file) {
                    $message->attach($file);
                }
            });


            $banner = Banner::where('is_active', true)->orderBy('priority', 'asc')->get()->take(1);

            return view('front.index')
                ->with('banner', $banner);
        } catch (Exception $e) {

            Session::flash('error', 'No se ha identificado servidor SMTP en la plataforma. Configuralo correctamente para enviar correos desde tu sistema.');
            return response()->json(['mensaje' => 'No se ha identificado servidor SMTP en la plataforma. Configuralo correctamente para enviar correos desde tu sistema.'], 200);

            $banner = Banner::where('is_active', true)->orderBy('priority', 'asc')->get()->take(1);


            return view('front.index')
                ->with('banner', $banner);
        }
    }

    public function projects()
    {
        $projects = Project::where('is_active', true)->orderBy('created_at', 'asc')->get();

        return view('front.projects')
            ->with('projects', $projects);
    }

    public function legalText($slug)
    {
        $text = LegalText::where('slug', $slug)->first();

        $legales = LegalText::get();

        $projects = Project::take(5)->orderBy('created_at', 'asc')->where('is_active', 1)->get();

        return view('front.privacy')
            ->with('text', $text)
            ->with('projects', $projects)
            ->with('legales', $legales);
    }

    public function posts()
    {
        $today = Carbon::now()->format('Y-m-d');

        $posts = Post::where('is_publish', 1)->whereDate('publish_date', '<=', $today)->get();

        $next_post = Post::where('is_publish', 1)->where('publish_date', '>', $today)->first();

        $n_days = 0;
        $n_hours = 0;
        $n_min = 0;
        $n_sec = 0;

        if (!empty($next_post)) {
            $n_days = Carbon::parse($next_post->publish_date)->diffInDays($today);
            $n_hours = Carbon::parse($next_post->publish_date)->diffInHours($today);
            $n_min = Carbon::parse($next_post->publish_date)->diffInMinutes($today);
            $n_sec = Carbon::parse($next_post->publish_date)->diffInSeconds($today);
        }

        return view('front.posts')
            ->with('posts', $posts)
            ->with('next_post', $next_post)
            ->with('n_days', $n_days)
            ->with('n_hours', $n_hours)
            ->with('n_min', $n_min)
            ->with('n_sec', $n_sec);
    }

    public function detailPost($slug)
    {
        $today = Carbon::now()->format('Y-m-d');
        $post = Post::where('slug', $slug)->first();

        $posts = Post::where('is_publish', true)->where('name', '!=', $post->name)->where('publish_date', '<=', $today)->orderBy('created_at', 'asc')->get()->take(6);

        return view('front.detail_post')
            ->with('post', $post)
            ->with('posts', $posts);
    }

    public function category($category_slug)
    {
        $today = Carbon::now()->format('Y-m-d');
        $category = Category::where('slug', $category_slug)->firstOrFail();

        $posts = Post::where('is_publish', 1)->whereDate('publish_date', '<=', $today)->whereHas('categories', function ($query) use ($category) {
            $query->where('category_id', $category->id);
        })->get();

        return view('front.posts')
            ->with('category', $category)
            ->with('posts', $posts);
    }
}
