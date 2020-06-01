<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
        ]);

        $user = Auth()->user();
        $user->update($request->all());
        
        if ($request->hasFile('profile')) {
            $extension = $request->profile->extension();
            $request->profile->storeAs('public/profiles', $user->id . '.' . $extension);
        }
        
        if ($request->hasFile('cover')) {
            $extension = $request->cover->extension();
            $request->cover->storeAs('public/covers', $user->id . '.' . $extension);
        }

        return redirect()->back();
    }
}
