<?php
namespace App\Http\Controllers;

use App\Models\FasilitasKamar;
use App\Models\FasilitasHotel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FasilitasHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fasilitas_hotels = FasilitasHotel::latest()->paginate(6);

        return view('admin_fasilitas_hotel.index',compact('fasilitas_hotels'))
        ->with('i', (request()->input('page', 1) - 1) * 6);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fasilitas_hotels = FasilitasKamar::all();
        return view('admin_fasilitas_hotel.create', compact('fasilitas_hotels'));
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
            'nama_fasilitas'=>'required',
            'keterangan'=>'required',
            'image'=>'required',
        ]);
        $validateData['image'] = $request->file('image')->store('img/image/upload');

        FasilitasHotel::create($validateData);
        
        return redirect()->route('fasilitas_hotel.index')
                         ->with('success','Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FasilitasHotel  $fasilitasHotel
     * @return \Illuminate\Http\Response
     */
    public function show(FasilitasHotel $fasilitasHotel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FasilitasHotel  $fasilitasHotel
     * @return \Illuminate\Http\Response
     */
    public function edit(FasilitasHotel $fasilitasHotel)
{
    $fasilitas_hotels = FasilitasKamar::all();

    return view('admin_fasilitas_hotel.edit', [
        'tipe_kamar' => $fasilitasHotel,
        'nama_fasilitas' => $fasilitas_hotels,
    ]);
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FasilitasHotel  $fasilitasHotel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FasilitasHotel $fasilitasHotel)
    {
        $validateData = $request->validate([
            'nama_fasilitas' => 'required',
            'keterangan' => 'required',
        ]);
    
        // Kalau misalnya ada gambar baru, ganti gambar sebelumnya jadi gambar baru
        if ($request->image) {
            $validateData['image'] = $request->file('image')->store('img/image/upload');
            // Hapus gambar sebelumnya karena kan udah diganti
            Storage::delete($fasilitasHotel->image);
        }
    
        $fasilitasHotel->update($validateData);
    
        return redirect()->route('fasilitas_hotel.index')
        ->with('success', 'Berhasil Diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FasilitasHotel  $fasilitasHotel
     * @return \Illuminate\Http\Response
     */
    public function destroy(FasilitasHotel $fasilitasHotel)
    {
        $fasilitasHotel->delete();
     
        return redirect()->route('fasilitas_hotel.index')
                        ->with('success','Berhasil Hapus !');
    }
}
