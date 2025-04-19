@extends('layouts.main')

@section('title', 'Home')

@section('content')
    <div class="container">
        <header id="search-container" class="col-md-12">
            <h1>Search for an employee</h1>
            <div class="col-md-9">
                <form action="{{route('home')}}" method="GET" class="d-flex" role="search">
                    <input class="form-control me-2" type="search" name="search" placeholder="Search" title="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </header>
        <section id="events-container" class="col-md-12">
            @if ($search)
                <h2>Search by CPF: <i>{{strlen($search) < 11 ? "{$search} ..." : $search}}</i></h2>
            @else
                <h2>Next Employees</h2>
                <p class="subtitle">See the staff for the next few days:</p>
            @endif
            @if (count($employees) > 0)
                <div id="cards-container" class="row row-cols-1 row-cols-md-4 g-4">
                    @foreach ($employees as $employee)
                        <div class="col">
                            <div class="card bg-dark text-white">
                                <img src="/employees/img/{{$employee->photos->first() ? $employee->photos->first()->file_path : 'No_Image.png'}}" class="card-img-top" alt="{{$employee->name}} {{$employee->surname}}" title="{{$employee->name}} {{$employee->surname}}">
                                <div class="card-body">
                                    @if ($employee->date_of_birth)
                                        <p class="card-date">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-date" viewBox="0 0 16 16">
                                                <path d="M6.445 11.688V6.354h-.633A13 13 0 0 0 4.5 7.16v.695c.375-.257.969-.62 1.258-.777h.012v4.61zm1.188-1.305c.047.64.594 1.406 1.703 1.406 1.258 0 2-1.066 2-2.871 0-1.934-.781-2.668-1.953-2.668-.926 0-1.797.672-1.797 1.809 0 1.16.824 1.77 1.676 1.77.746 0 1.23-.376 1.383-.79h.027c-.004 1.316-.461 2.164-1.305 2.164-.664 0-1.008-.45-1.05-.82zm2.953-2.317c0 .696-.559 1.18-1.184 1.18-.601 0-1.144-.383-1.144-1.2 0-.823.582-1.21 1.168-1.21.633 0 1.16.398 1.16 1.23"/>
                                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                                            </svg>
                                            <i>{{date("M d, Y", strtotime($employee->date_of_birth))}}</i>
                                            {{date_diff(date_create($employee->date_of_birth), date_create(date('Y-m-d')))->format('(%Y years)')}}
                                        </p>
                                    @endif
                                    <h5 class="card-title">{{$employee->name}} {{$employee->surname}}</h5>
                                    <p class="card-text">{{!is_null($employee->about_me) ? $employee->about_me : '...'}}</p>
                                    <a href="{{route('employees.show', $employee->slug)}}" class="btn btn-info">Show more</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @elseif (count($employees) == 0 && $search)
                <p>Unable to find any employee with CPF: <i>{{strlen($search) < 11 ? "{$search} ..." : $search}}</i> <a href="{{route('home')}}">See all</a></p>
            @else
                <p>No employees registered in the system. ... <a href="{{route('employees.create')}}" class="btn btn-link" title="Create employee">Create employee</a></p>
            @endif
        </section>
    </div>
@endsection
