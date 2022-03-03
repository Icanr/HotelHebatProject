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
            </div>
            <div class="pull-right" style="margin-left:20px">
                <a class="btn btn-primary" href="{{ route('admin_kamar.create') }}"> Create</a>
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
            <th>Tipe Kamar</th>
            <th>Jumlah Kamar</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($kamars as $tipekamar)
        <tr>
            <td class="ica">{{ ++$i }}</td>
            <td>{{ $tipekamar->tipe_kamar }}</td>
            <td>{{ $tipekamar->jumlah_kamar }}<td>
                  <form action="{{ route('admin_kamar.destroy',$tipekamar->id) }}" method="POST">
                
                    <a class="btn btn-primary" href="{{ route('admin_kamar.edit',$tipekamar->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
        </tr>
        @endforeach
    </table>
    </div>
    {!! $kamars->links() !!}
        
@endsection