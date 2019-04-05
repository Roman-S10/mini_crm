@extends('layouts.app')

@section('content')
    <h1>Edit company</h1>
    <form action="{{route('company.update', $company->id)}}" method="POST" enctype="multipart/form-data">
        {{ method_field('PUT') }}
        @csrf
        <label>Name</label>
        <input type="text" name="name" value="{{$company->name}}" class="form-control">
        <label>Email</label>
        <input type="email" name="email" value="{{$company->email}}" class="form-control">
        <label>Logo</label>
        <input type="file" name="logo" value="{{$company->logo}}" class="form-control">
        <label>Website</label>
        <input type="text" name="website" value="{{$company->website}}" class="form-control">
        <input type="submit" value="Save" class="btn btn-info">
    </form>
@endsection