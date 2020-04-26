<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Participant;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Participant $participants)
    {
        $this->middleware('auth');
        $this->participant = $participants;
    }

    /**
     * Show the application homepage.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $participants = $this->participant->getAllParticipant();

        return view('app.home', compact('participants'));
    }

}
