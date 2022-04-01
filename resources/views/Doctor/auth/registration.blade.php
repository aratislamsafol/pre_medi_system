@extends('layouts.registration_master')
@section('reg_content')
<form method="POST" action="{{route('doctor.store')}}" enctype="multipart/form-data">
    @csrf
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="form-floating mb-3 mb-md-0">
                <input value="{{ old('f_name') }}" class="form-control @error('f_name') is-invalid @enderror" name="f_name" id="f_name" type="text" placeholder="Enter your first name" />
                @error('f_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="inputFirstName">First name</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating">
                <input class="form-control @error('l_name') is-invalid @enderror" id="l_name" name="l_name" type="text" placeholder="Enter your last name" />
                @error('l_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="inputLastName">Last name</label>
            </div>
        </div>
    </div>

    <div class="form-floating mb-3">
        <input  id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" />
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <label for="inputEmail">Email address</label>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <div class="form-floating mb-3 mb-md-0">
                <input value="{{ old('age') }}" id="age" type="number" class="form-control @error('age') is-invalid @enderror" name="age" placeholder="Enter your Age" />
                @error('age')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="inputFirstName">Age</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating">
                <input value="{{ old('phone') }}" id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Enter your Phone Number" />
                @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="inputLastName">Phone Number</label>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <div class="form-floating mb-3 mb-md-0">
                <input id="street_address" type="text" class="form-control @error('street_address') is-invalid @enderror" name="street_address" value="{{ old('street_address') }}" placeholder="Enter your Street Number" />
                @error('street_address')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
                <label for="inputFirstName">Street Address</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating">
                <select id="blood_group  @error('blood_group') is-invalid @enderror" class="form-select" name="blood_group" aria-label="Default select example">
                    <option selected>Choose Blood Group</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="0+">0+</option>
                    <option value="0-">0-</option>
                </select>
                <label for="inputLastName">Blood Group</label>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        @php
            $divisions = App\Models\Division::orderBy('prioroty', 'asc')->get();
        @endphp
        <div class="col-md-6">
            <div class="form-floating mb-3 mb-md-0">
                <select class="form-select"  name="division_id" id="division_id" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    @foreach ($divisions as $division)
                    <option value="{{$division->id}}">{{$division->division_name}}</option>
                    @endforeach
                </select>
                <label for="inputFirstName">Division</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating">
                @php
                    $districts = App\Models\District::orderBy('district_name', 'asc')->get();
                @endphp
                <select class="form-control" name="distric_id" id="district-area">

                </select>
                <label for="inputLastName">Choose District</label>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <div class="form-floating mb-3 mb-md-0">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" />
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="inputPassword">Password</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating mb-3 mb-md-0">

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" />
                <label for="inputPasswordConfirm">Confirm Password</label>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <div class="form-floating mb-3 mb-md-0">
                <input value="{{ old('doc_image') }}" class="form-control @error('doc_image') is-invalid @enderror" name="doc_image" id="doc_image" type="file" />
                @error('doc_image')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="inputFirstName">Doctor Image</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating">
                <input class="form-control @error('specialist') is-invalid @enderror" id="specialist" name="specialist" type="text" placeholder="Enter your Speacility" />
                @error('specialist')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="inputLastName">Specialisty</label>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <div class="form-floating mb-3 mb-md-0">
                <input value="{{ old('experience') }}" class="form-control @error('experience') is-invalid @enderror" name="experience" id="experience" type="text" />
                @error('experience')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="inputFirstName">Experience</label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-floating">
                <input class="form-control @error('Degree') is-invalid @enderror" id="Degree" name="Degree" type="text" placeholder="Enter your Degree" />
                @error('Degree')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="inputLastName">Degree</label>
            </div>
        </div>
    </div>


    <div class="mt-4 mb-0">
        <div class="d-grid"> <button type="submit" class="btn btn-primary">
            {{ __('Create Account') }}
        </button>

        </div>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function()
   {
       $("#division_id").change(function(){
           var division = $("#division_id").val();
           // Send an ajax request to server with this division
           $("#district-area").html("");
           var option = "";

           $.get( "http://127.0.0.1:8000/get-districts/"+division, function( data ) {

               data = JSON.parse(data);
               data.forEach( function(element) {
                 option += "<option value='"+ element.id +"'>"+ element.district_name +"</option>";
               });

             $("#district-area").html(option);

           });
       })
   })
   </script>
@endsection
