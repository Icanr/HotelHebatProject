@extends('layout.master')
     
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
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admins.create') }}"> Create</a>
            </div>
        </div>
    </div>
    <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
     
    <table class="table table-bordered">
        <tr class="ica">
            <th>No</th>
            <th>Username</th>
            <th>Password</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($admins as $admin)
        <tr>
            <td class="ica">{{ ++$i }}</td>

            <td>{{ $admin->username }}</td>
            <td>{{ $admin->password }}</td>
            <td>
                <form action="{{ route('admins.destroy',$admin->id) }}" method="POST">
                
                    <a class="btn btn-primary" href="{{ route('admin.edit',$admin->id) }}">Edit</a>
     
                    @csrf
                    @method('DELETE')
        
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    
    {!! $admins->links() !!}
        
@endsection