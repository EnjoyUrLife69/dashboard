<?php

namespace App\Http\Controllers;

use App\Models\Penulis;
use Illuminate\Http\Request;

class PenulisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $penulis = Penulis::all();
        return view('penulis.index', compact('penulis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penulis.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $penulis = new Penulis;
        $penulis->nama_penulis = $request->nama_penulis;
        $penulis->jenis_kelamin = $request->jenis_kelamin;
        $penulis->save();
        return redirect()->route('penulis.index')
    ->with('success', 'data berhasil di tambahkan');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $penulis = Penulis::FindOrFail($id);
        return view('penulis.show', compact('penulis'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $penulis = Penulis::FindOrFail($id);
        return view('penulis.edit', compact('penulis'));

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
        $penulis = Penulis::FindOrFail($id);
        $penulis->nama_penulis = $request->nama_penulis;
        $penulis->jenis_kelamin = $request->jenis_kelamin;
        $penulis->save();
        return redirect()->route('penulis.index')
            ->with('success', 'data berhasil di ubah');

            

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $penulis = Penulis::FindOrFail($id);
        $penulis->delete();
        return redirect()->route('penulis.index')
            ->with('success', 'data berhasil dihapus');

    }
}
