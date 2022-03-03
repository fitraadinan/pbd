<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Club;
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
        // ]);
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
        return view('club.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClubRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClubRequest $request)
    {
        $this->validate($request, [
            'nama_club' => 'required',
            'hari' => 'required',
            'jam' => 'required',
        ]);

        $club = new Club;
        $club->nama_club = $request->input('nama_club');
        $club->hari = $request->input('hari');
        $club->jam = $request->input('jam');
        $club->created_at = Carbon::now();
        $club->save();
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
    public function update(UpdateClubRequest $request, Club $club)
    {
        $this->validate($request, [
            'nama_club' => 'required',
            'hari' => 'required',
            'jam' => 'required'
        ]);

        Club::where('id', $request->id)->update([
            'nama_club' => $request->input('nama_club'),
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
    public function destroy(Club $club)
    {
        //
    }
}
