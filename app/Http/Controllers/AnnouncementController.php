<?php

namespace App\Http\Controllers;

use App\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnnouncementController extends Controller
{
    protected $validationRules, $validationMessages;

    public function __construct()
    {
        $this->validationRules = [
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:5000',
        ];

        $this->validationMessages = [
            'required' => ':attribute field is required',
            'string' => ':attribute field must be string',
            'max' => ':attribute field must contain no more then :max characters',
        ];
    }

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
        $request->validate($this->validationRules,$this->validationMessages);

        $announcement = Auth::user()->announcements()->create($request->only(['title', 'description']));

        return redirect()->route('announcement.show', $announcement->id);
    }

    public function edit($id)
    {
        $announcement = Announcement::with('user')->findOrFail($id);

        if(Auth::id() != $announcement->user->id)
            return redirect()->route('home')->with([
                'alert_class' => 'danger',
                'message' => "You can edit only your announcements!"
            ]);
        return view('announcements.edit', ['announcement' => $announcement]);
    }

    public function update(Request $request, $id)
    {
        $request->validate($this->validationRules,$this->validationMessages);


        $announcement = Announcement::findOrFail($id);
        if(Auth::id() != $announcement->user->id)
            return redirect()->route('home')->with([
                'alert_class' => 'danger',
                'message' => "You can edit only your announcements!"
            ]);
        $announcement->update($request->only(['title', 'description']));

        return redirect()->route('announcement.show', $announcement->id);
    }

    public function delete($id)
    {
        $announcement = Announcement::findOrFail($id);
        if(Auth::id() != $announcement->user->id)
            return redirect()->route('home')->with([
                'alert_class' => 'danger',
                'message' => "You can delete only your announcements!"
            ]);
        $announcement->delete();

        return redirect()->route('home');
    }
}
