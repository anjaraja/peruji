<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.home');
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
    
    public function eventsRegis()
    {
        return view('landingpage.events-regis');
    }
    
    public function events1()
    {
        return view('landingpage.events-1');
    }
    
    public function events2()
    {
        return view('landingpage.events-2');
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
