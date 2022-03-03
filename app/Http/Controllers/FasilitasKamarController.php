<?php

namespace App\Http\Controllers;
use App\Models\Kamar;
use App\Models\FasilitasKamar;
use Illuminate\Http\Request;

class FasilitasKamarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fasilitas_kamars = FasilitasKamar::latest()->paginate(6);

        return view('admin_fasilitas_kamar.index',compact('fasilitas_kamars'))
        ->with('i', (request()->input('page', 1) - 1) * 6);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fasilitas_kamars = FasilitasKamar::all();
        return view('admin_fasilitas_kamar.create', compact('fasilitas_kamars'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'tipe_kamar'=>'required',
            'fasilitas'=>'required',
        ]);

        FasilitasKamar::create($request->all());
        
        return redirect()->route('fasilitas_kamar.index')
                         ->with('success','Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FasilitasKamar  $fasilitasKamar
     * @return \Illuminate\Http\Response
     */
    public function show(FasilitasKamar $fasilitasKamar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FasilitasKamar  $fasilitasKamar
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $fasilitasKamar = Kamar::find($id);
        $fasilitas = Kamar::all();
        return view('admin_fasilitas_kamar.edit', [
            'tipe_kamar' => $fasilitas,
            'fasilitas' => $fasilitasKamar,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FasilitasKamar  $fasilitasKamar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fasilitasKamar = Kamar::find($id);
        $request->validate([
            'tipe_kamar'=>'required',
            'fasilitas'=>'required',
        ]);

        $fasilitasKamar->update($request->all());

        return redirect()->route('fasilitas_kamar.index')
                         ->with('success','Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FasilitasKamar  $fasilitasKamar
     * @return \Illuminate\Http\Response
     */
    public function destroy(FasilitasKamar $fasilitasKamar)
    {
        $fasilitasKamar->delete();
     
        return redirect()->route('fasilitas_kamar.index')
                        ->with('success','Berhasil Hapus !');
    }
}
