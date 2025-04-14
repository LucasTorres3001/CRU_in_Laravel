@extends('layouts.main')

@section('title', "{$employee->name} {$employee->surname}")

@section('content')
    <div class="container">
        <header class="container">
            <h1>{{$employee->name}} {{$employee->surname}}</h1>
        </header>
        <br>
        <section class="container">
            <form action="{{route('employees.update', $employee->slug)}}" method="POST" class="row g-3" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-6">
                    <div class="input-group">
                        <label for="new_workplace" class="input-group-text" title="New workplace">New workplace</label>
                        <select name="id_workplace" id="new_workplace" class="form-select" title="New workplace">
                            @foreach ($locations as $location)
                                <option value="{{$location->id}}" {{in_array($employee->workplace->city, explode(',', $location->city)) ? 'selected' : '' }}>{{$location->city}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('id_workplace')
                        <br>
                        <div class="container">
                            <div class="alert alert-danger" role="alert">{{$message}}</div>
                        </div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <label for="new_photo" class="input-group-text" title="New photo upload">New photos</label>
                        <input type="file" name="new_photos[]" id="new_photo" class="form-control" title="New photo upload" multiple>
                    </div>
                    @error('new_photos')
                        <br>
                        <div class="container">
                            <div class="alert alert-danger" role="alert">{{$message}}</div>
                        </div>
                    @enderror
                </div>
                <br>
                <div class="col-md-12">
                    <div class="input-group">
                        <span class="input-group-text">
                            <label for="about_me" title="About me">About me</label>
                        </span>
                        <textarea name="about_me" id="about_me" aria-label="With textarea" cols="30" rows="10" class="form-control" title="About me">{{$employee->about_me}}</textarea>
                    </div>
                </div>
                <br>
                <div class="col-md-3">
                    <div class="input-group">
                        <input type="submit" value="Update" class="btn btn-dark" title="Update">
                    </div>
                </div>
            </form>
            <br>
            <a href="{{route('employees.dashboard')}}" class="btn btn-secondary" title="To back">To back</a>
        </section>
    </div>
@endsection
