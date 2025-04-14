@extends('layouts.main')

@section('title', 'Create course')

@section('content')
    <div class="container">
        <header class="container">
            <h1>Create course</h1>
        </header>
        <section class="container">
            <br>
            <form action="{{route('courses.store')}}" method="POST" class="row g-3">
                @csrf
                <div class="col-md-6">
                    <div class="input-group">
                        <label for="c_name" class="input-group-text" title="Course">Course</label>
                        <select name="course_name" id="c_name" class="form-select" title="Course">
                            <option value="" selected>Courses...</option>
                            @foreach ($courses as $course)
                                <option value="{{$course}}">{{$course}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('course_name')
                        <div class="container">
                            <br>
                            <div class="alert alert-danger" role="alert">{{$message}}</div>
                        </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary" name="btn_course" id="idcourse" title="Register course">Register course</button>
                </div>
            </form>
        </section>
    </div>
@endsection
