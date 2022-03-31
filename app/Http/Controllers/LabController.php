<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Lab;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreLabRequest;
use App\Http\Requests\UpdateLabRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class LabController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lab = Lab::sortable()->paginate(5);
        session()->forget('search');
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
            'lab_name' => 'required'
        ]);

        $lab = new Lab;
        $lab->lab_name = $request->input('lab_name');
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
            'lab_name' => 'required'
        ]);

        Lab::find($request->id)->update([
            'lab_name' => $request->input('lab_name'),
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

    public function search()
    {
       
        $text  = $_GET['search'];
        session()->put(['search' => $text]);
        
        try{
            $data = Lab::where('lab_name', 'LIKE', '%'.$text.'%')
            ->get();
            return view('lab.index', ['lab' => $data]);
        } catch (ModelNotFoundException $e) {
            session()->flash('message', 'Data tidak valid.'); 
            session()->flash('alert-class', 'alert-danger'); 
            $data = Lab::all();
            return view('lab.index', ['lab' => $data]);
        }
    }
}
