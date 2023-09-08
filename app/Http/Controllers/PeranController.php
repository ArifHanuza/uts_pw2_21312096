<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peran;
use RealRashid\SweetAlert\Facades\Alert;

class PeranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peran = Peran::all();
        return view('peran.index',compact('peran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('peran.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $peran = new peran;

        $request->validate([
            'film' => 'required',
            'cast' => 'required',
            'nama' => 'required',
        ]);

        $peran->film_id = $request->film;
        $peran->cast_id = $request->cast;
        $peran->nama = $request->nama;

        $simpan = $peran->save();

        if($simpan){
            Alert::success('Success', 'Data berhasil ditambah');
            return redirect('/peran');
        }else{
            Alert::error('Failed', 'Data gagal ditambah');
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $peran = Peran::where('id',$id)->first();

        return view('peran.edit', compact('peran'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $peran = Peran::find($id);

        if (!$peran) {
            return redirect()->back()->with('error','Data not found.');
        }

        $peran->film_id = $request->input('film_id');
        $peran->cast_id = $request->input('cast_id');
        $peran->nama = $request->input('nama');
        $update = $peran->save();

        if($update){
            Alert::success('Success', 'Data berhasil diUpdate');
            return redirect('/peran');
        }else{
            Alert::error('Failed', 'Data gagal diUpdate');
        }

        return redirect()->route('peran.index', $id)->with('succes','Data succesfully update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        //
        $peran = peran::find($id);

        if (!$peran) {
            return redirect()->to('peran')->with('error', 'data tidak ditemukan.');
        }

        $delete = $peran->delete();

        if($delete){
            Alert::success('Success', 'Data berhasil dihapus');
            return redirect('/peran');
        }else{
            Alert::error('Failed', 'Data gagal dihapus');
        }

        return redirect()->to('peran')->with('succes', 'Data berhasil dihapus.');
    }
}
