<?php

namespace App\Http\Controllers;

use App\ViewKategori;
use Illuminate\Http\Request;

class ViewKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lap = ViewKategori::all();
       
        return view('laporan.kategori',['laps' => $lap]);
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
     * @param  \App\ViewKategori  $viewKategori
     * @return \Illuminate\Http\Response
     */
    public function show(ViewKategori $viewKategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ViewKategori  $viewKategori
     * @return \Illuminate\Http\Response
     */
    public function edit(ViewKategori $viewKategori)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ViewKategori  $viewKategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ViewKategori $viewKategori)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ViewKategori  $viewKategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(ViewKategori $viewKategori)
    {
        //
    }
}
