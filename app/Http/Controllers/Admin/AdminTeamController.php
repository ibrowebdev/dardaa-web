<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreTeamMemberRequest;
use App\Http\Requests\Admin\UpdateTeamMemberRequest;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AdminTeamController extends Controller
{
    public function index(Request $request)
    {
        $query = TeamMember::query();

        if ($search = $request->input('search')) {
            $query->where('name', 'like', "%{$search}%")
                  ->orWhere('role', 'like', "%{$search}%");
        }

        $team = $query->paginate(15)->appends($request->query());

        return view('admin.team.index', compact('team'));
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(StoreTeamMemberRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('team', $filename, 'public');
            $data['photo'] = '/storage/' . $path;
        }

        TeamMember::create($data);

        return redirect()->route('admin.team.index')->with('success', 'Team member added successfully.');
    }

    public function edit(TeamMember $team)
    {
        // The resource parameter defaults to `team`
        return view('admin.team.edit', ['member' => $team]);
    }

    public function update(UpdateTeamMemberRequest $request, TeamMember $team)
    {
        $data = $request->validated();

        if ($request->hasFile('photo')) {
            if ($team->photo) {
                $oldPath = str_replace('/storage/', '', $team->photo);
                Storage::disk('public')->delete($oldPath);
            }

            $file = $request->file('photo');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('team', $filename, 'public');
            $data['photo'] = '/storage/' . $path;
        }

        $team->update($data);

        return redirect()->route('admin.team.index')->with('success', 'Team member updated successfully.');
    }

    public function destroy(TeamMember $team)
    {
        if ($team->photo) {
            $oldPath = str_replace('/storage/', '', $team->photo);
            Storage::disk('public')->delete($oldPath);
        }

        $team->delete();

        return redirect()->route('admin.team.index')->with('success', 'Team member removed successfully.');
    }
}
