<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cast;
use RealRashid\SweetAlert\Facades\Alert;

class CastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cast = Cast::all();
        return view('cast.index',compact('cast'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('cast.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cast = new cast;

        $request->validate([
            'nama' => 'required',
            'umur' => 'required',
            'bio' => 'required',
        ]);

        $cast->nama = $request->nama;
        $cast->umur = $request->umur;
        $cast->bio = $request->bio;

        $simpan = $cast->save();

        if($simpan){
            Alert::success('Success', 'Data berhasil ditambah');
            return redirect('/cast');
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
        $cast = Cast::where('id',$id)->first();

        return view('cast.edit', compact('cast'));
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
        $cast = Cast::find($id);

        if (!$cast) {
            return redirect()->back()->with('error','Data not found.');
        }

        $cast->nama = $request->input('nama');
        $cast->umur = $request->input('umur');
        $cast->bio = $request->input('bio');
        $update = $cast->save();

        if($update){
            Alert::success('Success', 'Data berhasil diUpdate');
            return redirect('/cast');
        }else{
            Alert::error('Failed', 'Data gagal diUpdate');
        }

        return redirect()->route('cast.index', $id)->with('succes','Data succesfully update');
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
        $cast = cast::find($id);

        if (!$cast) {
            return redirect()->to('cast')->with('error', 'data tidak ditemukan.');
        }

        $delete = $cast->delete();

        if($delete){
            Alert::success('Success', 'Data berhasil dihapus');
            return redirect('/cast');
        }else{
            Alert::error('Failed', 'Data gagal dihapus');
        }

        return redirect()->to('cast')->with('succes', 'Data berhasil dihapus.');
    }
}
