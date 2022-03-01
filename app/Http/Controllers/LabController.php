<?php

namespace App\Http\Controllers;

use App\Models\Lab;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreLabRequest;
use App\Http\Requests\UpdateLabRequest;

class LabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lab = DB::table('lab')->get();
        return view('lab.index', [
            'lab' => $lab
        ]);
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
     * @param  \App\Http\Requests\StoreLabRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLabRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function show(Lab $lab)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function edit(Lab $lab)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLabRequest  $request
     * @param  \App\Models\Lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLabRequest $request, Lab $lab)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lab $lab)
    {
        //
    }
}
