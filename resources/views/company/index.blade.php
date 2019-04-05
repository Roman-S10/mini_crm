@extends('layouts.app')

@section('content')
    <a href="{{route('company.create')}}" class="btn btn-success">Create new company</a>
    <h1>Companies list</h1>

    <table class="table">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Logo</th>
            <th>Website</th>
            <th></th>
        </tr>
        @if(count($companies))
            @foreach($companies as $company)
                <tr>
                    <td>{{$company->name}}</td>
                    <td>{{$company->email}}</td>
                    <td><img src="{{asset('storage/'.$company->logo)}}"></td>
                    <td>{{$company->website}}</td>
                    <td>
                        <a href="{{route('company.edit', $company->id)}}" class="btn btn-info">Edit</a>
                        <form action="{{route('company.destroy', $company->id)}}" method="POST">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </td>
                </tr>

            @endforeach
        @else
            <tr>
                <td colspan="6">
                    No Companies
                </td>
            </tr>
        @endif
    </table>
    {{ $companies->links() }}

@endsection