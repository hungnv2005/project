<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $latestCourses = DB::table('courses')
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();

        $cheapestCourses = DB::table('courses')
            ->orderBy('price', 'asc')
            ->limit(6)
            ->get();

        return view('home', compact('latestCourses', 'cheapestCourses'));
    }
}
