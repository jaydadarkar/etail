<?php

namespace App\Http\Controllers;

use App\Models\QuickNote;
use Illuminate\Http\Request;
use Auth;

class QuickNoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::user()->role == "admin" || Auth::user()->role == "manager" || Auth::user()->role == "blogger"){
            $note = QuickNote::create([
                'user_id' => Auth::user()->id,
                'title' => $request->title,
                'content' => $request->content,
            ]);
            return response()->json('Saved',200);
        }
        else{
            return response()->json('Error',500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\QuickNote  $quickNote
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        if(Auth::user()->role == "admin" || Auth::user()->role == "manager" || Auth::user()->role == "blogger"){
            $notes = QuickNote::where('user_id', Auth::user()->id)->with('user')->get();
            return response()->json($notes,200);
        }
        else{
            return response()->json('Error',500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\QuickNote  $quickNote
     * @return \Illuminate\Http\Response
     */
    public function edit(QuickNote $quickNote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\QuickNote  $quickNote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, QuickNote $quickNote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\QuickNote  $quickNote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if(Auth::user()->role == "admin" || Auth::user()->role == "manager" || Auth::user()->role == "blogger"){
            $note = QuickNote::where('id',$request->id)->delete();
            return response()->json('Deleted',200);
        }
        else{
            return response()->json('Error',500);
        }
    }
}
