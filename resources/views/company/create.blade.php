@extends('layouts.app')

@section('content')
    <h1>Create new company</h1>
    <form action="{{route('company.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Name</label>
        <input type="text" name="name" class="form-control">
        <label>Email</label>
        <input type="email" name="email" class="form-control">
        <label>Logo</label>
        <input type="file" name="logo" class="form-control">
        <label>Website</label>
        <input type="text" name="website" class="form-control">
        <input type="submit" value="Save" class="btn btn-info">
    </form>
@endsection