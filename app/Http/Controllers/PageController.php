<?php

namespace App\Http\Controllers;

use App\Models\Service;

class PageController extends Controller
{
    public function home()
    {
        $services = Service::where('is_active', true)
            ->latest()
            ->take(6)
            ->get();

        return view('pages.home', compact('services'));
    }
}