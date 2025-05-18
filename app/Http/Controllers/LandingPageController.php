<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('landingpage.home');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function about()
    {
        return view('landingpage.about');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function boardManagement(Request $request)
    {
        return view('landingpage.board-management');
    }

    /**
     * Display the specified resource.
     */
    public function events()
    {
        return view('landingpage.events');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function membership()
    {
        return view('landingpage.membership');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function membershipSignUp()
    {
        return view('landingpage.membership-signup');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function contactUs()
    {
        return view('landingpage.contactus');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function admin()
    {
        return view('dashboard.login');
    }
}
