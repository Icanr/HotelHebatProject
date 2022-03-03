@extends('layout.tamu')
     
@section('content')

    <div>
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
        <form method="POST" action="{{route('reservasi.store')}}" target="_blank" class="mb-5">
        @csrf
        <table align="center">
          <tr>
            <td><div style="color:black">Tanggal Check In</td>
            <td><input type="date" name="check_in" value="">&nbsp;&nbsp;</td>
          </tr>
          <tr>
            <td><div style="color:black">Tanggal Check Out</td>
            <td><input type="date" name="check_out" value="">&nbsp;&nbsp;</td>
          </tr>
            <td><div style="color:black">Jumlah Kamar</td>
            <td><input type="number" name="jumlah_kamar" value="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
          </tr>
          <tr>
            <td><div style="color:black">Nama Pemesan</td>
            <td><input type="text" name="nama_tamu" value=""></td>
          </tr>
          <tr>
            <td><div style="color:black">Email</td>
            <td><input type="text" name="email" value=""></td>
          </tr>
          <tr>
            <td><div style="color:black">No Handphone</td>
            <td><input type="text" name="no_handphone" value=""></td>
          </tr>
          <tr>
            <td><div style="color:black">Tipe Kamar</td>
            <td>
            <select name="tipe_kamar">
                    @foreach($tipe_kamar as $tipe)
                    <option value="{{$tipe->tipe_kamar}}">{{$tipe->tipe_kamar}}</option>
                    @endforeach
            </select>
            </td>
          </tr>
          <br>
          <br>
          <tr><td></td></tr>
          <tr>
          <td><button class="btn btn-primary" type="submit" formtarget="_blank">Konfirmasi Pemesanan</button></td>
          </tr>
        </table>
      </form>
      </div>
    </div>
@endsection