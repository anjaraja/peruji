<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\EventsController;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = new EventsController();
        $data = $events->index(1,"landingpage");
        return view('landingpage.home',["events"=>$data->original["data"]["data"]]);
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
        $events = new EventsController();
        $upcoming_data = $events->index(1);
        $previous_data = $events->previousEvents(1);
        return view(
            'landingpage.events',
            [
                "upcoming_events"=>$upcoming_data->original["data"]["data"],
                "previous_events"=>$previous_data->original["data"]["data"]
            ]
        );
    }
    
    public function eventsRegis($id)
    {
        $events = new EventsController();
        $data = $events->show($id);
        $data = json_decode(json_encode($data));
        return view('landingpage.events-regis',["events"=>$data->original->data]);
    }
    
    public function eventsDetail($id)
    {
        $events = new EventsController();
        $data = $events->show($id);
        $data = json_decode(json_encode($data));
        return view('landingpage.events-detail',["events"=>$data->original->data]);
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
