<?php

namespace App\Http\Controllers;

use App\Models\TeamMember;

class AboutController extends Controller
{
    public function index()
    {
        $team = TeamMember::all();

        return view('pages.about', compact('team'));
    }
}
