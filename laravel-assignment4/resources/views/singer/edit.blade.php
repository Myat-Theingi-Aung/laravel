@extends('layout.layout')
@section('title')Singer Edit page @endsection
@section('content')
<div class="upper">
<h1>Edit Singer Info</h1>
<a class="page-link" href="{{ route('singer.index'); }}">Home</a>
<form action="{{ route('singer.update',$singer->singer_id)}}" method="post">
    @csrf
    @method('put')
    <div class="name-div">
        <label for="name">Singer Name </label><br>
        <input type="text" name="singer_name" value="{{$singer->singer_name}}">
    </div>
    <div class="age-div">
        <label for="age">Age</label><br>
        <input type="text" name="age" value="{{$singer->age}}">
    </div>
    <div class="type-div">
        <label for="type">Singer Type</label><br>
        <select class="" name="type">                       
        @if($singer->type == "Local")
            <option value="Lcal" selected=""> Local </option>
            <option value="Internation"> Internation</option>
            <option value="Kpop"> Kpop</option>
        @elseif($singer->type == "Internation")
            <option value="Local" > Local </option>
            <option value="Internation" selected=""> Internation</option>
            <option value="Kpop"> Kpop</option>
        @else
            <option value="Local" > Local </option>
            <option value="Internation" > Internation</option>
            <option value="Kpop" selected=""> Kpop</option>
        @endif                                   
        </select>
    </div>
    <div class="gender-div">
        <label for="gender">Gender </label>
        <input type="radio" id="male" name="gender" value="Male" {{ ($singer->gender == 'Male')?  "checked" : "" ; }}>
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="Female" {{ ($singer->gender == 'Female')?  "checked" : "" ; }}>
        <label for="female">Female</label>
    </div>
    <div class="btn-div">
        <button class="add-btn" name="insertData">Update</button>
    </div>
</form>
</div>

@endsection