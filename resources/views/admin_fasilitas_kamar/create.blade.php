@extends('layout.admin')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add new</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('fasilitas_kamar.index') }}"> Back</a>
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
     
<form action="{{ route('fasilitas_kamar.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div align="center">
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <div style="color: black"><strong>Tipe Kamar</strong></div>
            <select name="tipe_kamar">
                    @foreach($fasilitas_kamars as $fasilitas)
                    <div style="width: 200px; color:black"><option value="{{$fasilitas->tipe_kamar}}">{{$fasilitas->tipe_kamar}}</option></div>
                    @endforeach
            </select>
            </div>
            <div class="form-group">
                <div style="color: black"><strong>Nama Fasilitas</strong></div>
                <div style="width: 200px"><input type="text" name="fasilitas" class="form-control" placeholder="Nama Fasilitas"></div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</div>
     
</form>
@endsection
