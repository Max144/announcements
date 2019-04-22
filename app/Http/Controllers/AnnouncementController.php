<?php

namespace App\Http\Controllers;

use App\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
{
    public function create()
    {
        return view('announcements.create');
    }

    public function show($id)
    {
        $announcement = Announcement::with('user')->findOrFail($id);
        return view('announcements.show', ['announcement' => $announcement]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $announcement = Auth::user()->announcements()->create($request->only(['title', 'description']));

        return redirect()->route('announcement.show', $announcement->id);
    }

    public function edit($id)
    {
        $announcement = Announcement::with('user')->findOrFail($id);
        return view('announcements.edit', ['announcement' => $announcement]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $announcement = Announcement::findOrFail($id);
        $announcement->update($request->only(['title', 'description']));

        return redirect()->route('announcement.show', $announcement->id);
    }

    public function delete($id)
    {
        $announcement = Announcement::findOrFail($id);
        $announcement->delete();

        return redirect()->route('home');
    }
}
