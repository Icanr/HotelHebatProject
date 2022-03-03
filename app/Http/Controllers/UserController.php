<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\FasilitasHotelController;
use App\Models\FasilitasHotel;

class UserController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->search;
        $users = FasilitasHotel::where($keyword)->paginate(5);
        return view('fasilitas_hotel.index', compact('users'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
