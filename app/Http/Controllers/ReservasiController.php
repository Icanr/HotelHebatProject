<?php

namespace App\Http\Controllers;
use App\Models\TipeKamar;
use App\Models\Reservasi;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class ReservasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resepsionis = Reservasi::latest()->filter(request(['check_in', 'search']))->paginate(5);

        return view('resepsionis.index',compact('resepsionis'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipe_kamar = TipeKamar::all();
        return view('pemesanan.index', compact('tipe_kamar'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_tamu'=>'required',
            'check_in'=>'required',
            'check_out'=>'required',
            'email' => 'required',
            'no_handphone' => 'required',
            'tipe_kamar' => 'required',
            'jumlah_kamar' => 'required',
        ]);

        $validateData['status'] = 'Belum Check In';
        $reservasi = Reservasi::create($validateData);
        
        return redirect()->route('reservasi.bukti', $reservasi->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Reservasi  $reservasi
     * @return \Illuminate\Http\Response
     */
    public function show(Reservasi $reservasi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Reservasi  $reservasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Reservasi $reservasi)
    {
        return view('resepsionis.edit', [
            'nama_tamu' => $reservasi,
            'check_in' => $reservasi,
            'check_out' => $reservasi,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Reservasi  $reservasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $reservasi = Reservasi::find($id); 
        $reservasi->update(['status' => 'Sudah Check In']);

        return redirect()->route('resepsionis_kamar.index')
                         ->with('success','Berhasil Update Status');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Reservasi  $reservasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reservasi $reservasi)
    {
        $reservasi->delete();
     
        return redirect()->route('resepsionis.index')
                        ->with('success','Berhasil Hapus !');
    }
    public function bukti($id)
    {   
        $pdf = Pdf::loadView('cetak', ['reservasi' => Reservasi::find($id)]);
        return $pdf->stream('cetak.pdf');
    }
    
}
