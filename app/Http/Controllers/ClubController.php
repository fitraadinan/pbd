<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Lab;
use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreClubRequest;
use App\Http\Requests\UpdateClubRequest;

class ClubController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $club = DB::table('club')->get();
        // return view('club.index', [
        //     'club' => $club
        // ]);php
        $club = Club::all();
        return view('club.index', [
            'club' => $club
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $club = Club::all();
        $lab = Lab::all();
        return view('club.add', [
            'club' => $club,
            'lab' => $lab,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClubRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'club_name' => 'required',
            'hari' => 'required',
            'jam' => 'required',
        ]);

        $club = new Club;
        $club->club_name = $request->input('club_name');
        $club->hari = $request->input('hari');
        $club->jam = $request->input('jam');
        $club->created_at = Carbon::now();
        $club->created_by = auth()->user()->name;
        $club->save();
        $lab = Lab::find($request->input('lab'));
        $lab->club_id = $club->id;
        $lab->created_at = Carbon::now();
        $lab->update();
        return redirect('/modul/club')->with('success', "New Club has been created!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function show(Club $club)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $club = Club::find($id);
        return view('club.edit', ['club' => $club]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClubRequest  $request
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Club $club)
    {
        $this->validate($request, [
            'club_name' => 'required',
            'hari' => 'required',
            'jam' => 'required'
        ]);

        Club::where('id', $request->id)->update([
            'club_name' => $request->input('club_name'),
            'hari' => $request->input('hari'),
            'jam' => $request->input('jam'),
            'updated_at' => Carbon::now(),
        ]);
        return redirect('/modul/club')->with('success', 'Update Club Successfull!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Club  $club
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Club::find($id)->delete();
        Lab::where('club_id', $id)->update([
            'club_id' => null,
        ]);
        return redirect('/modul/club')->with('success', 'Delete Club Successfull.');
    }

    public function search()
    {
       
        $text  = $_GET['search'];
        session(['search' => $text]);
        $data = Club::where('club_name', 'LIKE', '%'.$text.'%')->with('lab')
                    ->orWhere('hari', 'LIKE', '%'.$text.'%')
                    // ->orWhere('lab_name', 'LIKE', '%'.$text.'%')
                    ->get();
        if($data){
            return view('club.index', ['club' => $data]);
        } else {
            session()->flash('message', 'Data tidak valid.'); 
            session()->flash('alert-class', 'alert-danger'); 
        }
        
    }
}
