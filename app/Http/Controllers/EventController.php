<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        return view('events.index');
    }
    public function store(Request $request){
        request()->validate(Event::$rules);
        Event::create($request->all());
    }

    public function show(Event $event){
        $evento = Event::all();
        return response()->json($evento, 200);
    }

    public function edit($id){
        $evento = Event::find($id);
        $evento->start = Carbon::parse($evento->start)->format('Y-m-d');
        $evento->end = Carbon::parse($evento->end)->format('Y-m-d');
        return response()->json($evento, 200);
    }

    public function update(Request $request, Event $evento){
        request()->validate(Event::$rules);
        $evento->update($request->all());
        return response()->json($evento, 200);
    }

    public function destroy($id){
        $evento = Event::find($id);
        $evento->delete();
        return response()->json($evento, 200);
    }
}
