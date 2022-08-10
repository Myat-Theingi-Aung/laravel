@extends('layout.layout')
@section('title')Singer Create page @endsection
@section('content')
<div class="upper">
    <h1>Add Singer Info</h1>
    <a class="page-link" href="{{ route('singer.index'); }}">Home</a>
    <form action="{{ route('singer.store')}}" method="post">
        @csrf
        <div class="name-div">
            <label for="name">Singer Name</label><br>
            <input type="text" name="singer_name">
        </div>
        <div class="age-div">
            <label for="age">Age </label><br>
            <input type="text" name="age">
        </div>
        <div class="type-div">
            <label for="type">Singer Type </label><br>
            <select class="" name="type">                       
                <option value="Local">Local </option>
                <option value="Internation">Internation</option>
                <option value="Kpop">Kpop</option>                                     
            </select>
        </div>
        <div class="gender-div">
            <label for="gender">Gender : </label>
            <input type="radio" id="male" name="gender" value="Male">
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="Female">
            <label for="female">Female</label>
        </div>
        <div class="btn-div">
            <button class="add-btn" name="insertData">Add</button>
        </div>
    </form>
</div>
@endsection