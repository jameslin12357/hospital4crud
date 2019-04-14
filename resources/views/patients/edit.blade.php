@extends('layouts.app')

@section('content')

    <div class="container pt-100">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <h3 class="login-heading mb-4 text-center">Edit patient</h3>
                <form action="/patients/{{ $patient[0]->id }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="First Name" value="{{ old( 'first_name', $patient[0]->first_name) }}" name="first_name" required>
                    </div>
                    @if ($errors->has('first_name'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                    @endif
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Last Name" value="{{ old( 'last_name', $patient[0]->last_name) }}" name="last_name" required>
                    </div>
                    @if ($errors->has('last_name'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                    @endif
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Age" value="{{ old( 'age', $patient[0]->age) }}" name="age" required>
                    </div>
                    @if ($errors->has('age'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('age') }}</strong>
                                    </span>
                    @endif
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="DOB" value="{{ old( 'dob', $patient[0]->dob) }}" name="dob" required>
                    </div>
                    @if ($errors->has('dob'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                    @endif
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" value="{{ old( 'email', $patient[0]->email) }}" name="email" required>
                    </div>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Phone Number" value="{{ old( 'phone_number', $patient[0]->phone_number) }}" name="phone_number" required>
                    </div>
                    @if ($errors->has('phone_number'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_number') }}</strong>
                                    </span>
                    @endif

                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Gender Id" value="{{ old( 'gender_id', $patient[0]->gender_id) }}" name="gender_id" required>
                    </div>
                    @if ($errors->has('gender_id'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender_id') }}</strong>
                                    </span>
                    @endif

                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Address Id" value="{{ old( 'address_id', $patient[0]->address_id) }}" name="address_id" required>
                    </div>
                    @if ($errors->has('address_id'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address_id') }}</strong>
                                    </span>
                    @endif

                    <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>

                </form>
            </div>
        </div>
    </div>

@endsection