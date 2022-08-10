@extends('layout.layout')
@section('title')Singer Info page @endsection
@section('content')
<center>
<h1>Singer & Song Information</h1>
<table>
    <thead>
        <tr>
            <th>Singer_Name</th>
            <th>Song_Name</th>
            <th>Writer_Name</th>
            <th>Song_Type</th>
        </tr>
    </thead>
    <tbody>
    @foreach($data as $d)
        <tr>
            <td>{{ $d->singer_name }}</td>
            <td>{{ $d->name }}</td>
            <td>{{ $d->writer_name }}</td>
            <td>{{ $d->type }}</td>
        </tr>
    @endforeach  
    </tbody>
</table>
</center>


@endsection