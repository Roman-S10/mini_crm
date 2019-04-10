@extends('layouts.app')

@section('content')
    <a href="{{route('employee.create')}}" class="btn btn-success">Create new employee</a>
    <h1>Employees list</h1>

    <table class="table">
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Company</th>
            <th></th>
        </tr>
        @if(count($employees))
            @foreach($employees as $employee)
                <tr>
                    <td>{{$employee->first_name}}</td>
                    <td>{{$employee->last_name}}</td>
                    <td>{{$employee->email}}</td>
                    <td>{{$employee->phone}}</td>
                    <td>{{$employee->company->name}}</td>
                    <td>
                        <a href="{{route('employee.edit', $employee->id)}}" class="btn btn-info">Edit</a>
                        <form action="{{route('employee.destroy', $employee->id)}}" method="POST">
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
                    No Employee
                </td>
            </tr>
        @endif
    </table>
    {{ $employees->links() }}
@endsection