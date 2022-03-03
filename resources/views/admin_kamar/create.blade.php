@extends('layout.admin')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add new</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('admin_kamar.index') }}"> Back</a>
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
     
<form action="{{ route('admin_kamar.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
     <div align="center">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <div style="color: black"><strong>Tipe Kamar</strong></div>
                <select name="tipe_kamar">
                    <option value="">Pilih</option>
                    <option value="Standard Double Bed">Standard Double Bed</option>
                    <option value="Deluxe Queen Size">Deluxe Queen Size</option>
                    <option value="Luxury King Size">Luxury King Size</option>
                </select>
            </div>
        </div>
        <br>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <div style="color: black"><strong>Jumlah Kamar</strong></div>
                <div style="width: 200px"><input type="number" name="jumlah_kamar" class="form-control" placeholder="Jumlah Kamar"></div>
            </div>
        </div>
        <br>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
     
</form>
@endsection
