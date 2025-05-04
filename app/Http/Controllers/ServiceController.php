<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class ServiceController extends Controller
{

    //* Display a listing of the resource.

    public function index()
    {
        $user = auth()->user();
        $services = Service::all();
        return view("services.index", compact(["services", "user"]));
    }


    //? Store a newly created resource in storage.

    public function create()
    {
        session(['return_to' => url()->previous()]);
        return view("services.create");
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required",
            "description" => "required",
            "price" => "required",
            "availability" => "required"
        ]);

        Service::create([
            "name" => $validated["name"],
            "description" => $validated["description"],
            "price" => $validated["price"],
            "availability" => $validated["availability"]
        ]);
        return redirect(session('return_to', route('services.index')))
            ->with('success', 'Service created successfully.');
    }


    //* Display the specified resource.

    public function show($id)
    {
        $user = auth()->user();
        $service = Service::find($id);
        return view("services.show", compact(["service", "user"]));
    }


    //? Update the specified resource in storage.


    public function edit($id)
    {
        session(['return_to' => url()->previous()]);
        $service = Service::find($id);
        return view("services.edit", compact("service"));
    }

    public function update(Request $request, $id)
    {
        $service = Service::find($id);
        $validated = $request->validate([
            "name" => "required",
            "description" => "required",
            "price" => "required",
            "availability" => "required"
        ]);

        $service->update([
            "name" => $validated["name"],
            "description" => $validated["description"],
            "price" => $validated["price"],
            "availability" => $validated["availability"]
        ]);
        return redirect(session('return_to', route('services.index')))
            ->with('success', 'Service updated successfully.');
    }


     //! Remove the specified resource from storage.
    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();
        return redirect()->to(URL::previous())->with('success', 'Service deleted successfully.');
    }

}
