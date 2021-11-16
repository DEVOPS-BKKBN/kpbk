<?php

namespace App\Http\Controllers;

use App\ViewKebijakan;
use Illuminate\Http\Request;

class ViewKebijakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lap = ViewKebijakan::all();
       
        return view('laporan.kebijakan',['laps' => $lap]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ViewKebijakan  $viewKebijakan
     * @return \Illuminate\Http\Response
     */
    public function show(ViewKebijakan $viewKebijakan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ViewKebijakan  $viewKebijakan
     * @return \Illuminate\Http\Response
     */
    public function edit(ViewKebijakan $viewKebijakan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ViewKebijakan  $viewKebijakan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ViewKebijakan $viewKebijakan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ViewKebijakan  $viewKebijakan
     * @return \Illuminate\Http\Response
     */
    public function destroy(ViewKebijakan $viewKebijakan)
    {
        //
    }
}
