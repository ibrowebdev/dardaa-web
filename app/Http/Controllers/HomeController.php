<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->take(3)->get();
        $testimonials = Testimonial::all();

        return view('pages.home', compact('projects', 'testimonials'));
    }
}
