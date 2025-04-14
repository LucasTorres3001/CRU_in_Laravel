@extends('layouts.main')

@section('title', 'Create profession')

@section('content')
    <div class="container">
        <header class="container">
            <h1>Register profession</h1>
        </header>
        <section class="container">
            <br>
            <form action="{{route('professions.store')}}" method="POST" class="row g-3">
                @csrf
                <div class="col-md-8">
                    <div class="input-group">
                        <label class="input-group-text"for="professionid" title="Profession">Profession</label>
                        <select name="profession_name" id="professionid" class="form-select" title="Profession name">
                            <option value="" selected>Choose...</option>
                            @foreach ($professions as $profession)
                                <option value="{{$profession}}">{{$profession}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('profession_name')
                        <div class="container">
                            <br>
                            <div class="alert alert-danger" role="alert">{{$message}}</div>
                        </div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text">
                            <label for="salaryid" title="Salary">Salary R$</label>
                        </span>
                        <input type="text" name="salary" id="salaryid" class="form-control" placeholder="12345.67" title="Salary">
                    </div>
                    @error('salary')
                        <div class="container">
                            <br>
                            <div class="alert alert-danger" role="alert">{{$message}}</div>
                        </div>
                    @enderror
                </div>
                <br>
                <div class="col-md-9">
                    <div class="input-group mb-3">
                        <label for="cursoid" class="input-group-text" title="Course">Course</label>
                        <select name="id_course" id="cursoid" class="form-select" title="Course">
                            <option value="" selected>Course ...</option>
                            @foreach ($courses as $course)
                                <option value="{{$course->id}}">{{$course->course_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('id_course')
                        <div class="container">
                            <br>
                            <div class="alert alert-danger" role="alert">{{$message}}</div>
                        </div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <button type="submit" class="btn btn-primary" name="btn_profession" id="btn_prof" title="Register profession">Register profession</button>
                </div>
            </form>
        </section>
    </div>
@endsection
