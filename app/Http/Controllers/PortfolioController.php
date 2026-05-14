<?php

namespace App\Http\Controllers;

use App\Models\Project;

class PortfolioController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        $categories = Project::select('category')->distinct()->pluck('category');

        return view('pages.portfolio.index', compact('projects', 'categories'));
    }

    public function show(Project $slug)
    {
        $project = $slug;
        $relatedProjects = Project::where('category', $project->category)
            ->where('id', '!=', $project->id)
            ->take(3)
            ->get();

        return view('pages.portfolio.show', compact('project', 'relatedProjects'));
    }
}
