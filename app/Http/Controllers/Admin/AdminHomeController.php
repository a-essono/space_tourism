<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Planet;
use App\Models\Crew;
use App\Models\Technology;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index()
    {
        $planetCount = Planet::count();
        $crewCount = Crew::count();
        $techCount = Technology::count();

        return view('admin.home', compact('planetCount', 'crewCount', 'techCount'));
    }
}
