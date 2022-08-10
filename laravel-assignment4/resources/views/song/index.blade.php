@extends('layout.layout')
@section('title')Song Index page @endsection
@section('content')
<center>
    <h1>Song Information</h1>
    <a class="page-link" href="{{ route('song.create'); }}">Create</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Song_Name</th>
                <th>Writer_Name</th>
                <th>Song_Type</th>
                <th>Singer_Name</th>
                <th>Created_at</th>
                <th>Updated_at</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($data as $d)
            <tr>
                <td>{{ $d->id }}</td>
                <td>{{ $d->name }}</td>
                <td>{{ $d->writer_name }}</td>
                <td>{{ $d->type }}</td>
                <td>{{$d->singer_name}}</td>
                <td>{{ $d->created_at }}</td>
                <td>{{ $d->updated_at }}</td>
                <td>
                    <div class="btn-div clearfix">
                        <form class="col1" action="{{ route('song.destroy',$d->id) }}"  method="post">
                            @csrf
                            @method('delete')
                            <button class="btn">Delete</button>
                        </form>
                        <div class="col2">
                            <a href="{{ route('song.edit',$d->id) }}">Edit</a>
                        </div>
                    </div>
                </td>
            </tr>
        @endforeach  
        </tbody>
    </table>
</center>

@endsection