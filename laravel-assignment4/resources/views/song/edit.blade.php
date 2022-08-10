@extends('layout.layout')
@section('title')Song Edit page @endsection
@section('content')
<div class="upper">
<h1>Edit Song Info</h1>
<a class="page-link" href="{{ route('song.index'); }}">Home</a>
<form action="{{ route('song.update',$data->id) }}"  method="post">
    @csrf
    @method('put')
    <div class="name-div">
        <label for="name">Song Name </label><br>
        <input type="text" name="name" value="{{$data->name}}">
    </div>
    <div class="name-div">
        <label for="w-name">Writer Name </label><br>
        <input type="text" name="writer_name" value="{{$data->writer_name}}">
    </div>
    <div class="type-div">
        <label for="type">Song Type </label><br>
        <select class="" name="type"> 
        @if($data->type == "Pop")
            <option value="Hip Hop">Hip Hop</option>
            <option value="Pop" selected="">Pop</option>
        @else
            <option value="Hip Hop" selected="">Hip Hop</option>
            <option value="Pop">Pop</option>
        @endif                      
                                           
        </select>
    </div>
    <div class="s-name">
        <label for="singer_name"> Choose Singer Name </label><br>
        <select class="form-control" name="singer_id">
            @foreach($singers as $singer)
                <option value="{{$singer->singer_id}}"> {{$singer->singer_name}} </option>
            @endforeach
        </select>
    </div>
    <div class="btn-div">
        <button class="add-btn" name="add">Update</button>
    </div>
</form>
</div>

@endsection