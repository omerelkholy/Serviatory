<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //? Dashboard function
    private function getDashboardData()
    {
        return [
            "users" => User::all(),
            "services" => Service::all(),
            "reservations" => Reservation::with(["user", "service"])->get(),
            "allUsersCount" => User::count(),
            "userCount" => User::where("role", "user")->count(),
            "adminCount" => User::where("role", "admin")->count(),
            "serviceCount" => Service::count(),
            "reservationCount" => Reservation::count(),
        ];
    }



    public function dashboard(){
        $data = $this->getDashboardData();
        return view("dashboard.index", $data);
    }

    public function dashUser(Request $request){
        $data = $this->getDashboardData();

        $role = $request->query("role");

        $usersFilter = User::query();

        if ($role){
            $usersFilter->where("role", $role);
        }

        $data['users'] = $usersFilter->get();

        return view("dashboard.users", $data);
    }

    public function dashService(){
        $data = $this->getDashboardData();
        return view("dashboard.services", $data);
    }

    public function dashReservation(){
        $data = $this->getDashboardData();
        return view("dashboard.reservations", $data);
    }
}
