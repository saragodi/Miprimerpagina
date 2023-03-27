<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {

        $jobs = Job::paginate(20);

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

    public function show(Job $job)
    {
        return view('back.jobs.show');
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
