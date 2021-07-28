<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CardOne;
use Illuminate\Http\Request;

class CardOneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.card1.index');
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
        CardOne::create($request->all());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CardOne  $cardOne
     * @return \Illuminate\Http\Response
     */
    public function show(CardOne $cardOne)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CardOne  $cardOne
     * @return \Illuminate\Http\Response
     */
    public function edit(CardOne $cardOne)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CardOne  $cardOne
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CardOne $cardOne)
    {
        $cardOne->update($request->all());
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CardOne  $cardOne
     * @return \Illuminate\Http\Response
     */
    public function destroy(CardOne $cardOne)
    {
        $cardOne->delete();
        return redirect()->back();
    }
}
