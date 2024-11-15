<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use App\Models\Biodata;
use Illuminate\Http\Request;

class MobileProfileController extends Controller
{
    public function index()
    {
        return view('mobile.profile.index');
    }

    public function show($slug)
    {
        $biodata = Biodata::with('user')->where('slug', $slug)->firstOrFail();
        return view('mobile.profile.show', compact('biodata'));
    }
}
