<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sewa;
use App\Mobil;

class SewaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mobil = Mobil::all();
        $sewa = Sewa::all();
        return view('rental.sewa.index', compact('sewa', 'mobil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mobil = Mobil::all();
        $sewa = Sewa::all();
        return view('rental.sewa.create', compact('mobil', 'sewa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
    		'nama' => 'required|unique:mobil',
            'alamat' => 'required',
            'no_hp' => 'required',
            'lama_sewa' => 'required',
            'mobil_id' => 'required'
    	]);
 
        Sewa::create([
    		'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'lama_sewa' => $request->lama_sewa,
            'mobil_id' => $request->mobil_id,
    	]);
 
    	return redirect('/sewa')->with('success', 'Data Customer Berhasil DiTambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $mobil = Mobil::all();
        $sewa = Sewa::findorfail($id);
        return view('rental.sewa.show', compact('sewa', 'mobil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mobil = Mobil::all();
        $sewa = Sewa::findorfail($id);
        return view('rental.sewa.edit', compact('sewa', 'mobil'));
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
        $this->validate($request,[
    		'nama' => 'required|unique:mobil',
            'alamat' => 'required',
            'no_hp' => 'required',
            'lama_sewa' => 'required',
            'mobil_id' => 'required'
    	]);

        $sewa = Sewa::find($id);
        $sewa->nama = $request->nama;
        $sewa->alamat = $request->alamat;
        $sewa->no_hp = $request->no_hp;
        $sewa->lama_sewa = $request->lama_sewa;
        $sewa->mobil_id = $request->mobil_id;
        $sewa->update();
        return redirect('/sewa')->with('success', 'Data Customer Berhasil DiUpdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sewa = Sewa::find($id);
        $sewa->delete();
        return redirect('/sewa')->with('success', 'Data Customer Berhasil DiDelete!');
    }
}
