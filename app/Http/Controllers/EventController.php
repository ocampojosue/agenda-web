<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        return view('events.index');
    }
    public function store(Request $request){
        request()->validate(Event::$rules);
        $event = Event::create($request->all());
    }
}
