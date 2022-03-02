<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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
        $lab = Lab::all();
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
        return view('lab.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLabRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLabRequest $request)
    {
        $this->validate($request, [
            'nama_lab' => 'required'
        ]);

        $lab = new Lab;
        $lab->nama_lab = $request->input('nama_lab');
        $lab->created_at = Carbon::now();
        $lab->save();
        return redirect('/modul/lab')->with('success', "New Lab has been created!");
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
    public function edit($id)
    {
        $lab = Lab::find($id);
        return view('lab.edit', ['lab' => $lab]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLabRequest  $request
     * @param  \App\Models\Lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLabRequest $request)
    {
        $this->validate($request, [
            'nama_lab' => 'required'
        ]);

        Lab::where('id', $request->id)->update([
            'nama_lab' => $request->input('nama_lab'),
            'updated_at' => Carbon::now(),
        ]);
        return redirect('/modul/lab')->with('success', 'Update Lab Successfull!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lab  $lab
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Lab::where('id', $id)->delete();
        return redirect('/modul/lab')->with('success', 'Delete Lab Successfull!');
    }
}
