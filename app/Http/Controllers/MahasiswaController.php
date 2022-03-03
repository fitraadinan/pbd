<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreMahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;

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
        $mahasiswa = Mahasiswa::all();
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
        return view('mahasiswa.add');
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
    public function edit(Mahasiswa $id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.edit', ['mahasiswa' => $mahasiswa]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMahasiswaRequest  $request
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMahasiswaRequest $request, Mahasiswa $mahasiswa)
    {
        $this->validate($request, [
            'nim' => 'nim',
            'nama' => 'nama',
            'th_masuk' => 'th_masuk',
            'no_telepon' => 'no_telepon'
        ]);

        Mahasiswa::where('id', $request->id)->update([
            'nim' => $request->input('nim'),
            'nama' => $request->input('nama'),
            'th_masuk' => $request->input('jth_masukam'),
            'no_telepon' => $request->input('no_telepon'),
            'updated_at' => Carbon::now(),
        ]);
        return redirect('/modul/mahasiswa')->with('success', 'Update Mahasiswa Successfull!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mahasiswa  $mahasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        //
    }
}
