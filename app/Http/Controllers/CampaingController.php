<?php

namespace App\Http\Controllers;

use App\Models\Campaing;

use Auth;
use Image;
use Session;
use Purifier;

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
        $campaing = new Campaing;

        $campaing->name = $request->name;
        $campaing->link = $request->link;

        $campaing->description = $request->description;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = 'camapaing' . time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('img/campaings/' . $filename);

            Image::make($image)->resize(1280, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($location);

            $campaing->image = $filename;
        }

        $campaing->save();

        return redirect()->back();
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

    public function status($id)
    {
        // Guardar datos en la base de datos
        $campaing = Campaing::find($id);

        if ($campaing->status == 1) {
            $campaing->status = 0;
        } else {
            $campaing->status = 1;
        }

        $campaing->save();

        // Mensaje de session
        Session::flash('success', 'El banner se ha cambiado de estado.');

        // Enviar a vista
        return redirect()->back();
    }

    public function destroy($id)
    {
        // Guardar datos en la base de datos
        $campaing = Campaing::find($id);

        $campaing->delete();

        // Enviar a vista
        return redirect()->back();
    }
}
