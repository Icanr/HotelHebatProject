
@extends('layout.resepsionis')
     
@section('content')
<style>
        .ica{
            background-color : gainsboro;
        }
    </style>
    <div class="row">
    </div>
    <br>
    <div class="container">
	<form action="" method="get" class="d-flex align-items-end gap-2">
		<div class="form-group">
			<div style="color: black"><label for="check_in">Check In</label>
			<div style="width: 200px"><input type="date" class="form-control" id="check_in" name="check_in" value="{{ request('check_in') }}">
		</div>
		<div class="form-group">
        <div style="color: black"><label for="search">Search</label>
        <div style="width: 200px"><input type="text" class="form-control" id="search" name="search" value="{{ request('search') }}">
		</div>
        <br>
		<button type="submit" class="btn btn-info">Cari</button>
	</form>
</div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    

    <div style="margin:30px">
    <table class="table table-bordered">
        <tr class="ica">
            <th>No</th>
            <th>Nama Tamu</th>
            <th>Tanggal Check In</th>
            <th>Tanggal Check Out</th>
            <th>Email</th>
            <th>No Handphone</th>
            <th>Tipe Kamar</th>
            <th>Jumlah Kamar</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($resepsionis as $tipekamar)
        <tr>
            <td class="ica">{{ ++$i }}</td>
            <td>{{ $tipekamar->nama_tamu }}</td>
            <td>{{ $tipekamar->check_in }}</td>
            <td>{{ $tipekamar->check_out }}</td>
            <td>{{ $tipekamar->email }}</td>
            <td>{{ $tipekamar->no_handphone }}</td>
            <td>{{ $tipekamar->tipe_kamar }}</td>
            <td>{{ $tipekamar->jumlah_kamar }}</td>
            <td>{{ $tipekamar->status }}</td>
            <td>
            <form action="{{ route('resepsionis_kamar.update',$tipekamar->id) }}" method="POST">
                
                <a class="btn btn-primary" href="{{ route('reservasi.bukti',$tipekamar->id) }}" target="_blank">Print</a>
 
                @csrf
                @method('PUT')
    
                <button type="submit" class="btn btn-success">Check In</button>
            </form>
            </td>
        </tr>
        @endforeach
    </table>
    </div>
    {!! $resepsionis->links() !!}

@endsection