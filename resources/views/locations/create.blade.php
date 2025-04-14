@extends('layouts.main')

@section('title', 'Create location')

@section('content')
    <div class="container">
        <header class="container">
            <h1>Create location</h1>
        </header>
        <section class="container">
            <br>
            <form action="{{route('locations.store')}}" method="POST" class="row g-3">
                @csrf
                <div class="col-md-9">
                    <div class="input-group">
                        <label class="input-group-text" for="inputGroupSelectCity" title="City name">City</label>
                        <select name="city" id="inputGroupSelectCity" class="form-select" title="City name">
                            <option value="" selected>City name ...</option>
                            @foreach ($locations['cities'] as $city)
                                <option value="{{$city}}">{{$city}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('city')
                        <div class="container">
                            <br>
                            <div class="alert alert-danger" role="alert">{{$message}}</div>
                        </div>
                    @enderror
                </div>
                <div class="col-md-3">
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupSelect" title="State">State</label>
                        <select name="state" class="form-select" id="inputGroupSelect" title="State name">
                            <option value="" selected>State name...</option>
                            @foreach ($locations['states'] as $index => $state)
                                <option value="{{$index}}">{{$state}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('state')
                        <div class="container">
                            <br>
                            <div class="alert alert-danger" role="alert">{{$message}}</div>
                        </div>
                    @enderror
                </div>
                <br>
                <div class="col-md-2">
                    <div class="input-group mb-3">
                        <label for="dddid" class="input-group-text" title="DDD">DDD</label>
                        <select name="ddd" id="dddid" class="form-select" title="DDD">
                            <option value="" selected>DDD</option>
                            @for ($i = 11; $i < 99; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="input-group mb-3">
                        <label for="regionid" class="input-group-text" title="Region">Region</label>
                        <select name="region" id="regionid" class="form-control" title="Region name">
                            <option value="" selected>Region name ...</option>
                            @foreach ($locations['regions'] as $region)
                                <option value="{{$region}}">{{$region}}</option>
                            @endforeach
                        </select>
                    </div>
                    @error('region')
                        <div class="container">
                            <br>
                            <div class="alert alert-danger" role="alert">{{$message}}</div>
                        </div>
                    @enderror
                </div>
                <div class="col-md-5">
                    <button type="submit" class="btn btn-primary" name="btn_location" id="idlocation" title="Register location">Register location</button>
                </div>
            </form>
        </section>
    </div>
@endsection
