<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mobil;
use App\Sewa;
use File;

class MobilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mobil = Mobil::all();
        return view('rental.mobil.index', compact('mobil'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rental.mobil.create');
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
            'desc' => 'required',
    		'harga' => 'required',
            'poster' => 'required|mimes:jpg,jpeg,png',
    	]);

        $gambar = $request->poster;
        $name_img = time(). ' - ' . $gambar->getClientOriginalName();

        Mobil::create([
    		'nama' => $request->nama,
            'desc' => $request->desc,
    		'harga' => $request->harga,
            'poster' => $name_img
    	]);

    	$gambar->move('img', $name_img);
    	return redirect('/mobil')->with('success', 'Film Berhasil Disimpan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mobil = Mobil::findorfail($id);
        return view('rental.mobil.show', compact('mobil'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mobil = Mobil::find($id);
        return view('rental.mobil.edit', compact('mobil'));
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
            'desc' => 'required',
    		'harga' => 'required',
            'poster' => 'required|mimes:jpg,jpeg,png',
    	]);

        $mobil = Mobil::findorfail($id);

        if ($request->has('poster')) {

            $path = "img/";
            File::delete($path . $mobil->poster);
            $gambar = $request->poster;
            $new_gambar = time() . ' - ' . $gambar->getClientOriginalName();
            $gambar->move('img', $new_gambar);
            $mobil_data = [
                'nama' => $request->nama,
                'desc' => $request->desc,
                'harga' => $request->harga,
                'poster' => $new_gambar
            ];
        } else {
            $mobil_data = [
                'nama' => $request->nama,
                'desc' => $request->desc,
                'harga' => $request->harga,
            ];
        }
        
        $mobil->update($mobil_data);
        return redirect('/mobil')->with('success', 'Film Berhasil Disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mobil = Mobil::find($id);
        $mobil->delete();
        return redirect('/mobil')->with('success', 'Film Berhasil DiDelete!');
    }
}
