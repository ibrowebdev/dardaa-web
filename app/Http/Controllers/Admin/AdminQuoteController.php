<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Quote;
use Illuminate\Http\Request;

class AdminQuoteController extends Controller
{
    public function index(Request $request)
    {
        $query = Quote::query();

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('company', 'like', "%{$search}%");
            });
        }

        $quotes = $query->latest()->paginate(15)->appends($request->query());

        return view('admin.quotes.index', compact('quotes'));
    }

    public function show(Quote $quote)
    {
        return view('admin.quotes.show', compact('quote'));
    }

    public function destroy(Quote $quote)
    {
        $quote->delete();
        return redirect()->route('admin.quotes.index')->with('success', 'Quote request deleted successfully.');
    }
}
