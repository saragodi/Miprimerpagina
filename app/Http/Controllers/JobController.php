<?php

namespace App\Http\Controllers;

use Str;

use Session;
use App\Models\Applicant;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {

        $jobs = Job::where('status', 1)->paginate(15);

        return view('back.jobs.index')
            ->with('jobs', $jobs);
    }

    public function archives()
    {
        $jobs = Job::where('status', 0)->paginate(15);

        return view('back.jobs.index')
            ->with('jobs', $jobs);
    }

    public function create()
    {
        return view('back.jobs.create');
    }

    public function store(Request $request)
    {
        $job = new Job;

        $job->name = $request->name;
        $job->company = $request->company;
        $job->location = $request->location;
        $job->state = $request->state;

        $job->status = 1;

        $job->type = $request->type;
        $job->experience = $request->experience;
        $job->modality = $request->modality;

        $job->about = $request->about;

        /* Crear Slug del Nombre */
        $nameslug = Str::slug($request->name);

        // Available alpha caracters
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // generate a pin based on 2 * 7 digits + a random character
        $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];

        // shuffle the result
        $string = str_shuffle($pin);

        $job->slug = $nameslug . '_' . $string;

        $job->save();

        return redirect()->route('jobs.show', $job->id);
    }

    public function show($id)
    {
        $job = Job::find($id);

        $applicants = Applicant::where('job_id', $id)->paginate(20);

        return view('back.jobs.show')
            ->with('job', $job)
            ->with('applicants', $applicants);
    }

    public function edit($id)
    {
        $job = Job::find($id);

        return view('back.jobs.edit')
            ->with('job', $job);
    }

    public function update(Request $request, Job $job)
    {
        //
    }

    public function status($id)
    {
        // Guardar datos en la base de datos
        $job = Job::find($id);

        if ($job->status == 1) {
            $job->status = 0;
        } else {
            $job->status = 1;
        }

        $job->save();

        // Mensaje de session
        Session::flash('success', 'El banner se ha cambiado de estado.');

        // Enviar a vista
        return redirect()->back();
    }

    public function destroy(Job $job)
    {
        //
    }
}
