<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CardTwo;
use Illuminate\Http\Request;

class CardTwoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.card2.index');
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
        CardTwo::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CardTwo  $cardTwo
     * @return \Illuminate\Http\Response
     */
    public function show(CardTwo $cardTwo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CardTwo  $cardTwo
     * @return \Illuminate\Http\Response
     */
    public function edit(CardTwo $cardTwo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CardTwo  $cardTwo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CardTwo $cardTwo)
    {
       
        $cardTwo->update($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CardTwo  $cardTwo
     * @return \Illuminate\Http\Response
     */
    public function destroy(CardTwo $cardTwo)
    {
        $cardTwo->delete();
        return redirect()->back();
    }
}
