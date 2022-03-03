@extends('layout.admin')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('fasilitas_hotel.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <br>   
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
        
    <form action="{{ route('fasilitas_hotel.update',$tipe_kamar->id) }}" method="POST" enctype="multipart/form-data"> 
        @csrf

        @method('PUT')
        <div align="center">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <div style="color: black"><strong>Nama Fasilitas</strong></div>
                    <select name="nama_fasilitas">
                    @foreach($nama_fasilitas as $fasilitas)
                     <option value="{{$fasilitas->fasilitas}}">{{$fasilitas->fasilitas}}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                <div style="color: black"><strong>Keterangan</strong></div>
                <div style="width:200px"><input type="text" name="keterangan" class="form-control" placeholder="Keterangan" value="{{$tipe_kamar->keterangan}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <div style="color: black"><strong>Image</strong></div>
            <div style="width: 300px"><div><input type="file" name="image" class="form-control" placeholder="" value="{{$tipe_kamar->image}}"></div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
</div>
        
    </form>
@endsection