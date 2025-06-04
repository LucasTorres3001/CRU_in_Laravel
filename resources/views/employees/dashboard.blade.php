@extends('layouts.main')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <header class="container">
            <h1>Dashboard</h1>
        </header>
        <section class="container">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Username</th>
                        <th scope="col">Salaries</th>
                        <th scope="col">Birthplace</th>
                        <th scope="col">Options</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @forelse ($employees as $employee)
                        <tr>
                            <th scope="row">{{$loop->index + 1}}</th>
                            <td>{{$employee->name}} {{$employee->surname ?? ''}}</td>
                            <td>{{$employee->profession?->salary ? 'R$ '.number_format($employee->profession->salary, 2, ',', '.') : '-'}}</td>
                            <td>{{$employee->birthplace->city ?? '-'}} - {{$employee->birthplace->state ?? '-'}}</td>
                            <td>
                                <a href="{{route('employees.edit', $employee->slug)}}" class="d-inline-block btn btn-primary" title="Update">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                                    </svg> Update
                                </a>
                                <form action="{{route('employees.delete', $employee->slug)}}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" title="Delete">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                                        </svg> Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">
                                There are no employees in our system. ... <a href="{{route('employees.create')}}" class="btn btn-link" id="create_employees" title="Register employees">Register employees</a>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </section>
    </div>
@endsection
