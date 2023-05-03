<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{

    public function index()
    {
        $people = Person::paginate(20);

        return view('back.people.index')
            ->with('people', $people);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Person $person)
    {
        //
    }

    public function edit(Person $person)
    {
        //
    }

    public function update(Request $request, Person $person)
    {
        //
    }

    public function destroy(Person $person)
    {
        //
    }
}
