<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogListing; // wait! Let me check existing model names!
use App\Models\Contact;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\Post;
use App\Models\Project;
use App\Models\Quote;
use App\Models\TeamMember;
use App\Models\Testimonial;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'unread_contacts' => Contact::where('is_read', false)->count(),
            'quotes' => Quote::count(),
            'projects' => Project::count(),
            'posts' => Post::count(),
            'team_members' => TeamMember::count(),
            'testimonials' => Testimonial::count(),
            'jobs' => Job::count(),
            'job_applications' => JobApplication::count(),
        ];

        $recentContacts = Contact::orderBy('created_at', 'desc')->take(5)->get();
        $recentQuotes = Quote::orderBy('created_at', 'desc')->take(5)->get();
        $recentPosts = Post::orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentContacts', 'recentQuotes', 'recentPosts'));
    }
}
