<?php

namespace App\Http\Controllers;

use App\Announcement;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Self_;

class HomeController extends Controller
{
    const PER_PAGE = 5;
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'announcements' => Announcement::with('user')->paginate(self::PER_PAGE)
        ]);
    }
}
