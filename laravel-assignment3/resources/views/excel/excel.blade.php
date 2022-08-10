@extends('layout.layout')
@section('title') Import & Export @endsection
@section('content')
<center>
<section>
    <h1>Import & Export</h1>
    <form action="{{ route('excel.import') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="excel">
            <label for="file">Choose Import File</label><br>
            <input type="file" name="file">
        </div>
        <div class="excel-btn">
            <button>Import</button>
            <a href="{{ route('excel.export') }}">Export</a>
        </div>
    </form>
</section>
</center>
@endsection