<?php

namespace App\Http\Controllers;

use App\Models\Campaing;
use Illuminate\Http\Request;

class CampaingController extends Controller
{
    public function index()
    {
        $campaings = Campaing::paginate(20);

        return view('back.campaings.index')
            ->with('campaings', $campaings);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Campaing $campaing)
    {
        //
    }

    public function edit(Campaing $campaing)
    {
        //
    }

    public function update(Request $request, Campaing $campaing)
    {
        //
    }

    public function destroy(Campaing $campaing)
    {
        //
    }
}
