<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Club;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreMahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $mahasiswa = DB::table('mahasiswa')->get();
        // return view('mahasiswa.index', [
        //     'mahasiswa' => $mahasiswa
        // ]);
        $mahasiswa = Mahasiswa::with('club')->sortable()->paginate(5);
        session()->forget('search');
        return view('mahasiswa.index', [
            'mahasiswa' => $mahasiswa
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mahasiswa = Mahasiswa::with('club')->sortable()->paginate(5);
        $club=Club::all();
        return view('mahasiswa.add', [
            'mahasiswa' => $mahasiswa,
            'club' => $club,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMahasiswaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMahasiswaRequest $request)
    {
        $this->validate($request, [
            'nim' => 'required',
            'nama' => 'required',
            'th_masuk' => 'required',
            'no_telepon' => 'required',
        ]);

        $mahasiswa = new Mahasiswa;
        $mahasiswa->nim = $request->input('nim');
        $mahasiswa->nama = $request->input('nama');
        $mahasiswa->th_masuk = $request->input('th_masuk');
        $mahasiswa->no_telepon = $request->input('no_telepon');
        $mahasiswa->club_id = $request->input('club');
        $mahasiswa->created_by = auth()->user()->name;
        $mahasiswa->created_at = Carbon::now();
        $mahasiswa->save();
        return redirect('/modul/mahasiswa')->with('success', "New Mahasiswa has been created!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::find($id);
        $club=Club::all();
        return view('mahasiswa.edit', [
            'mahasiswa' => $mahasiswa,
            'club' => $club,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMahasiswaRequest  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMahasiswaRequest $request, Mahasiswa $mahasiswa, $id)
    {
        $this->validate($request, [
            'nim' => 'required',
            'nama' => 'required',
            'th_masuk' => 'required',
            'no_telepon' => 'required'
        ]);

        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->nim = $request->nim;
        $mahasiswa->nama = $request->nama;
        $mahasiswa->th_masuk = $request->th_masuk;
        $mahasiswa->no_telepon = $request->no_telepon;
        $mahasiswa->club_id = $request->club;
        $mahasiswa->updated_by = auth()->user()->name;
        $mahasiswa->updated_at = Carbon::now();
        $mahasiswa->update();
        return redirect('/modul/mahasiswa')->with('success', 'Update Mahasiswa Successfull!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mahasiswa::find($id)->delete();
        return redirect('/modul/mahasiswa')->with('success', 'Delete Mahasiswa Successfull.');
    }

    public function search()
    {
       
        $text  = $_GET['search'];
        session()->put(['search' => $text]);
        
        try{
            $data = Mahasiswa::where('nama', 'LIKE', '%'.$text.'%')
            ->orWhere('th_masuk', 'LIKE', '%'.$text.'%')
            ->orWhere('nim', 'LIKE', '%'.$text.'%')
            ->orWhere('no_telepon', 'LIKE', '%'.$text.'%')
            ->orWhereRelation('club', 'club_name', 'LIKE', '%'.$text.'%')
            ->orWhereRelation('club', 'hari', 'LIKE', '%'.$text.'%')
            ->sortable()->paginate(5);
            return view('mahasiswa.index', ['mahasiswa' => $data]);
        } catch (ModelNotFoundException $e) {
            session()->flash('message', 'Data tidak valid.'); 
            session()->flash('alert-class', 'alert-danger'); 
            $data = Mahasiswa::sortable()->paginate(5);
            return view('mahasiswa.index', ['mahasiswa' => $data]);
        }
    }
}
