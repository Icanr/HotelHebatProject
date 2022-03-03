@extends('layout.admin')
     
@section('content')
<style>
        .ica{
            background-color : gainsboro;
        }
    </style>
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Data Admin</h2>
            </div>
            <div class="pull-right" style="margin-left:20px">
                <a class="btn btn-primary" href="{{ route('fasilitas_hotel.create') }}"> Create</a>
            </div>
        </div>
    </div>
    <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div style="margin:30px">
    <table class="table table-bordered">
        <tr class="ica">
            <th>No</th>
            <th>Nama Fasilitas</th>
            <th>Keterangan</th>
            <th>Image</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($fasilitas_hotels as $tipekamar)
        <tr>
            <td class="ica">{{ ++$i }}</td>
            <td>{{ $tipekamar->nama_fasilitas }}</td>
            <td>{{ $tipekamar->keterangan }}</td>
            <td><img src="{{ asset('storage/' . $tipekamar->image) }}" width="100px"/></td>
            <td>
            <form action="{{ route('fasilitas_hotel.destroy',$tipekamar->id) }}" method="POST">
                
                <a class="btn btn-primary" href="{{ route('fasilitas_hotel.edit',$tipekamar->id) }}">Edit</a>
 
                @csrf
                @method('DELETE')
    
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            </td>
        </tr>
        @endforeach
    </table>
    </div>
    {!! $fasilitas_hotels->links() !!}
        
@endsection