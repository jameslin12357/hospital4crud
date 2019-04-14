@extends('layouts.app')

@section('content')

    <div class="container pt-100">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <h3 class="login-heading mb-4 text-center">Create Visit</h3>
                <form action="/visits" method="post">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Patient Id" value="{{ old('patient_id') }}" name="patient_id" required>
                    </div>
                    @if ($errors->has('patient_id'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('patient_id') }}</strong>
                                    </span>
                    @endif
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Doctor Id" value="{{ old('doctor_id') }}" name="doctor_id" required>
                    </div>
                    @if ($errors->has('doctor_id'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('doctor_id') }}</strong>
                                    </span>
                    @endif




                    <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>

                </form>
            </div>
        </div>
    </div>

@endsection