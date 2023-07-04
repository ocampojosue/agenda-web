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
        // $request->validate([
        //     'title' => 'required',
        //     'description' => 'required',
        //     'start' => 'required',
        //     'end' => 'required',
        // ],
        // [
        //     'title.required' => 'Title is required',
        //     'description.required' => 'Description is required',
        //     'start.required' => 'Start date is required',
        //     'end.required' => 'End date is required',
        // ]);
        $event = Event::create($request->all());
        // return response()->json($event);
    }
}
