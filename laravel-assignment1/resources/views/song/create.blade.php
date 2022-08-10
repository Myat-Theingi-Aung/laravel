@extends('layout.layout')
@section('title')Song Create page @endsection
@section('content')
<div class="upper">
<h1>Add Song Info</h1>
<a class="page-link" href="{{ route('song.index'); }}">Home</a>
<form action="{{ route('song.store') }}" method="post">
    @csrf
    <div class="name-div">
        <label for="name">Song Name </label><br>
        <input type="text" name="name"><br>
        <p class="msg">@error('name') {{$message}} @enderror</p>
    </div>
    <div class="name-div">
        <label for="w-name">Writer Name </label><br>
        <input type="text" name="writer_name"><br>
        <p class="msg">@error('writer_name') {{$message}} @enderror</p>
    </div>
    <div class="type-div">
        <label for="type">Song Type </label><br>
        <select class="" name="type">                       
            <option value="Hip Hop">Hip Hop </option>
            <option value="Pop">Pop</option>                               
        </select>
    </div>
    <div class="s-name">
        <label for="singer_name"> Choose Singer Name </label><br>
        <select class="form-control" name="singer_id">
            @foreach($singers as $singer)
                <option value="{{$singer->id}}"> {{$singer->name}} </option>
            @endforeach
        </select>
    </div>
    <div class="btn-div">
        <button class="add-btn" name="add">Add</button>
    </div>
</form>
</div>
@endsection