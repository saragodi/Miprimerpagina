<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {

        $jobs = Job::paginate(15);

        return view('back.jobs.index')
            ->with('jobs', $jobs);
    }

    public function create()
    {
        return view('back.jobs.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $job = Job::find($id);

        $applicants = Applicant::where('job_id', $id)->paginate(20);

        return view('back.jobs.show')
            ->with('job', $job)
            ->with('applicants', $applicants);
    }

    public function edit(Job $job)
    {
        return view('back.jobs.show');
    }

    public function update(Request $request, Job $job)
    {
        //
    }

    public function destroy(Job $job)
    {
        //
    }
}
