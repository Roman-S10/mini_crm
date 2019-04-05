@extends('layouts.app')

@section('content')
    <h1>Create new employee</h1>
    <form action="{{route('employee.store')}}" method="POST">
        @csrf
        <label>First name</label>
        <input type="text" name="first_name" class="form-control">
        <label>Last name</label>
        <input type="text" name="last_name" class="form-control">
        <label>Email</label>
        <input type="email" name="email" class="form-control">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control">
        <label>Company</label>
        <select name="company_id" id="company_id" class="form-control">
            @foreach($companies as $company)
                <option value="{{ $company->id }}">{{ $company->name }}</option>
            @endforeach
        </select>
        <input type="submit" value="Save" class="btn btn-info">
    </form>
@endsection