<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class ReservationController extends Controller
{

    //*  Display a listing of the resource.

    public function index()
    {
        $user = auth()->user();
        if ($user->role === "admin") {
            $reservations = Reservation::all();
        } else {
            $reservations = Reservation::where("user_id", $user->id)->get();
        }

        return view("reservations.index", compact(["reservations", "user"]));
    }

    //* Display the specified resource.

    public function show($id)
    {
        $user = auth()->user();
        $reservation = Reservation::find($id);
        $service = $reservation->service;
        return view("reservations.show", compact(["reservation", "user", "service"]));
    }


    //? Store a newly created resource in storage.

    public function create(Request $request)
    {
        $serviceId = $request->query("service_id");
        $service = Service::findOrFail($serviceId);
        return view("reservations.create", compact("service"));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            "service_id" => "required",
            "reservation_date" => "required|date",
            "reservation_time" => "required|date_format:H:i"
        ]);

        $sameUserReservationexists = Reservation::where([
            ["user_id", auth()->id()],
            ["service_id", $validated['service_id']],
            ["reservation_date", $validated['reservation_date']],
            ["reservation_time", $validated['reservation_time']]
        ])
            ->whereIn("status", ["pending", "confirmed"])
            ->exists();

        if ($sameUserReservationexists) {
            return back()->with('error', "You have already booked this service at the selected date and time.");
        }

        $sameReservationexists = Reservation::where([
            ["service_id", $validated['service_id']],
            ["reservation_date", $validated['reservation_date']],
            ["reservation_time", $validated['reservation_time']]
        ])
            ->whereIn("status", ["pending", "confirmed"])
            ->exists();

        if ($sameReservationexists) {
            return back()->with('error', "We are sorry, this time slot for the service is already taken. Please choose another.");
        }


        Reservation::create([
            "user_id" => auth()->id(),
            "service_id" => $validated['service_id'],
            "reservation_date" => $validated['reservation_date'],
            "reservation_time" => $validated['reservation_time'],
            "status" => "pending"
        ]);

        return redirect()->route("services.index");

    }

    //? Update the specified resource in storage.

    public function edit($id)
    {
        session(['return_to' => url()->previous()]);
        $user = auth()->user();
        $reservation = Reservation::find($id);
        $service = $reservation->service;
        return view("reservations.edit", compact(["reservation", "service", "user"]));
    }

    public function update(Request $request, $id)
    {
        $reservation = Reservation::find($id);
        $validated = $request->validate([
            "service_id" => "required",
            "reservation_date" => "required|date",
            "reservation_time" => "required",
            "status" => "required|in:pending,confirmed,rejected,cancelled"
        ]);

        $sameUserReservationexists = Reservation::where([
            ["user_id", auth()->id()],
            ["service_id", $validated['service_id']],
            ["reservation_date", $validated['reservation_date']],
            ["reservation_time", $validated['reservation_time']]
        ])->where("id", "!=", $reservation->id)
            ->whereIn("status", ["pending", "confirmed"])
            ->exists();

        if ($sameUserReservationexists) {
            return back()->with('error', "You have already booked this service at the selected date and time.");
        }

        $sameReservationexists = Reservation::where([
            ["service_id", $validated['service_id']],
            ["reservation_date", $validated['reservation_date']],
            ["reservation_time", $validated['reservation_time']]
        ])->where("id", "!=", $reservation->id)
            ->whereIn("status", ["pending", "confirmed"])
            ->exists();

        if ($sameReservationexists) {
            return back()->with('error', "We are sorry but this Reservation time has been reserved already by another client");
        }

        $reservation->update($validated);

        return redirect(session('return_to', route('reservations.index')))
            ->with('success', 'Reservation updated successfully.');
    }


    //! Remove the specified resource from storage.
    public function destroy($id)
    {
        $reservation = Reservation::find($id);
        $reservation->delete();
        return redirect()->back()->with('success', 'Reservation deleted successfully.');
    }

    public function cancel($id)
    {
        $reservation = Reservation::find($id);
        $reservation->status = "cancelled";
        $reservation->save();

        return redirect()->back()->with('success', 'Your reservation has been cancelled successfully!');
    }

    public function confirm($id)
    {
        $reservation = Reservation::find($id);
        $reservation->status = "confirmed";
        $reservation->save();

        return redirect()->back()->with('success', 'You have confirmed the reservation successfully!');
    }

    public function reject($id)
    {
        $reservation = Reservation::find($id);
        $reservation->status = "rejected";
        $reservation->save();

        return redirect()->back()->with('success', 'You have rejected the reservation successfully!');
    }
}
