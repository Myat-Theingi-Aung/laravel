@extends('layout.layout')
@section('title')Singer Index page @endsection
@section('content')
<center>
<h1>Singer Information</h1>
<a class="page-link" href="{{ route('singer.create'); }}">Create</a>
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
            <td>{{ $singer->singer_id }}</td>
            <td>{{ $singer->singer_name }}</td>
            <td>{{ $singer->age }}</td>
            <td>{{ $singer->type }}</td>
            <td>{{ $singer->gender }}</td>
            <td>{{ $singer->created_at }}</td>
            <td>{{ $singer->updated_at }}</td>
            <td>
                <div class="btn-div clearfix">
                    <form class="col1" action="{{ route('singer.destroy',$singer->singer_id) }}"  method="post">
                        @csrf
                        @method('delete')
                        <button class="btn">Delete</button>
                    </form>
                    <div class="col2">
                        <a href="{{ route('singer.edit',$singer->singer_id) }}">Edit</a>
                    </div>
                </div>
            </td>
        </tr>
    @endforeach  
    </tbody>
</table>
</center>

@endsection