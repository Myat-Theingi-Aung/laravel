@extends('layout.layout')
@section('title')Singer Index page @endsection
@section('content')
<center>
<h1>Singer Information</h1>
<a class="page-link" href="{{ route('singer.create'); }}">Create</a>
<a class="page-link" href="{{ route('song.index'); }}">Song Page</a>
@if(Session::get('status'))
    <p class="session-info">
        {{ Session::get('status')}}
    </p>
@endif
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Singer_Name</th>
            <th>Age</th>
            <th>Singer_Type</th>
            <th>Gender</th>
            <th>Created_at</th>
            <th>Updated_at</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($singers as $singer)
        <tr>
            <td>{{ $singer->id }}</td>
            <td>{{ $singer->name }}</td>
            <td>{{ $singer->age }}</td>
            <td>{{ $singer->type }}</td>
            <td>{{ $singer->gender }}</td>
            <td>{{ $singer->created_at }}</td>
            <td>{{ $singer->updated_at }}</td>
            <td>
                <div class="btn-div clearfix">
                    <form class="col1" action="{{ route('singer.destroy',$singer->id) }}"  method="post">
                        @csrf
                        @method('delete')
                        <button class="btn" onclick="return confirm('Are you sure you want to delete - {{$singer->name}}?');">Delete</button>
                    </form>
                    <div class="col2">
                        <a href="{{ route('singer.edit',$singer->id) }}">Edit</a>
                    </div>
                </div>
            </td>
        </tr>
    @endforeach  
    </tbody>
</table>
</center>

@endsection