@extends('layouts.main')

@section('title', 'Register users')

@section('content')
    <div class="container">
        <header class="container">
            <h1>Create employees</h1>
        </header>
        <section class="container">
            <br>
            <form action="{{route('employees.store')}}" method="POST" class="row g-3" enctype="multipart/form-data">
                @csrf
                <br>
                <div class="col-md-9">
                    <div class="input-group">
                        <span class="input-group-text">
                            <label for="username" title="Username">First and last name</label>
                        </span>
                        <input type="text" aria-label="First name" name="name" id="username" class="form-control" placeholder="Name" maxlength="100" title="Name">
                        <input type="text" aria-label="Last name" name="surname" class="form-control" placeholder="Surname" maxlength="150" title="Surname">
                    </div>
                    @error('name')
                        <br>
                        <div class="container">
                            <div class="alert alert-danger" role="alert">{{$message}}</div>
                        </div>
                    @enderror
                    @error('surname')
                        <br>
                        <div class="container">
                            <div class="alert alert-danger" role="alert">{{$message}}</div>
                        </div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="inputGroup-sizing-default">
                            <label for="default" title="CPF">CPF</label>
                        </span>
                        <input type="text" class="form-control" name="cpf" id="default" placeholder="___ . ___ . ___ - __" maxlength="11" title="CPF" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </div>
                    @error('cpf')
                        <br>
                        <div class="container">
                            <div class="alert alert-danger" role="alert">{{$message}}</div>
                        </div>
                    @enderror
                </div>
                <br>
                <div class="col-md-4">
                    <label for="gender1" class="form-label" title="Gender">Gender</label>
                    <div class="md-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender1" value="female" title="Female">
                            <label class="form-check-label" for="gender1">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender2" value="male" title="male">
                            <label class="form-check-label" for="gender2">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="gender" id="gender3" value="transgener" title="Transgener">
                            <label class="form-check-label" for="gender3">Transgener</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <label for="ethnicity1" class="form-label" title="Ethnicity">Ethnicity</label>
                    <div class="md-3">
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ethnicity" id="ethnicity1" value="amerindian" title="Amerindian">
                            <label class="form-check-label" for="ethnicity1">Amerindian</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ethnicity" id="ethnicity2" value="asian" title="Asian">
                            <label class="form-check-label" for="ethnicity2">Asian</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ethnicity" id="ethnicity3" value="black" title="Black">
                            <label class="form-check-label" for="ethnicity3">Black</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ethnicity" id="ethnicity4" value="caboclo" title="Caboclo">
                            <label class="form-check-label" for="ethnicity4">Caboclo</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ethnicity" id="ethnicity5" value="cafuzo" title="Cafuzo">
                            <label class="form-check-label" for="ethnicity5">Cafuzo</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ethnicity" id="ethnicity6" value="caucasian" title="Caucasian">
                            <label class="form-check-label" for="ethnicity6">Caucasian</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="ethnicity" id="ethnicity7" value="mulato" title="Mulato">
                            <label class="form-check-label" for="ethnicity7">Mulato</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-text">
                            <label for="dt_birth" title="Birthday">Date of birth</label>
                        </span>
                        <input type="date" name="date_of_birth" id="dt_birth" class="form-control" title="Date of birth">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupFile01" title="Image upload">Upload</label>
                        <input type="file" class="form-control" name="photos[]" id="inputGroupFile01" title="Image upload" multiple>
                    </div>
                    @error('photos')
                        <br>
                        <div class="container">
                            <div class="alert alert-danger" role="alert">{{$message}}</div>
                        </div>
                    @enderror
                </div>
                <br>
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect" title="Birthplace">Birthplace</label>
                        <select class="form-select" name="id_birthplace" id="inputGroupSelect" title="Birthplace">
                            <option value="" selected>Choose...</option>
                            @foreach ($locations as $location)
                                <option value="{{$location->id}}">{{$location->city}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('id_birthplace')
                        <br>
                        <div class="container">
                            <div class="alert alert-danger" role="alert">{{$message}}</div>
                        </div>
                    @enderror
                </div>
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect01" title="Workplace">Workplace</label>
                        <select class="form-select" name="id_workplace" id="inputGroupSelect01" title="Workplace">
                            <option value="" selected>Choose...</option>
                            @foreach ($locations as $location)
                                <option value="{{$location->id}}">{{$location->city}}</option>
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
                <div class="col-md-4">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect1" title="Professions">Profession</label>
                        <select class="form-select" name="id_profession" id="inputGroupSelect1" title="Professions">
                            <option value="" selected>Choose...</option>
                            @foreach ($professions as $profession)
                                <option value="{{$profession->id}}">{{$profession->profession_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('id_profession')
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
                            <label for="description" title="About me">Abou me</label>
                        </span>
                        <textarea class="form-control" aria-label="With textarea" name="about_me" id="description" cols="30" rows="10" placeholder="About me ..."></textarea>
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" name="btn_enter" id="btn_enter" title="Register employee">Register employee</button>
                </div>
            </form>
        </section>
    </div>
    <br>
@endsection
