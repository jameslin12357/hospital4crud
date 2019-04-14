@extends('layouts.app')

@section('content')

<div class="container pt-100">
    <div class="row">
        <div class="col-lg-6 offset-lg-3">
            <h3 class="login-heading mb-4 text-center">Create address</h3>
            <form action="/addresses" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Building number" value="{{ old('building_number') }}" name="building_number" required>
                </div>
                @if ($errors->has('building_number'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('building_number') }}</strong>
                                    </span>
                @endif
                <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Street" value="{{ old('street') }}" name="street" required>
                </div>
                @if ($errors->has('street'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('street') }}</strong>
                                    </span>
                @endif
                <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="City" value="{{ old('city') }}" name="city" required>
                </div>
                @if ($errors->has('city'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('city') }}</strong>
                                    </span>
                @endif
                <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="State" value="{{ old('state') }}" name="state" required>
                </div>
                @if ($errors->has('state'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('state') }}</strong>
                                    </span>
                @endif
                <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Country" value="{{ old('country') }}" name="country" required>
                </div>
                @if ($errors->has('country'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('country') }}</strong>
                                    </span>
                @endif
                <div class="form-group">
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Zip" value="{{ old('zip') }}" name="zip" required>
                </div>
                @if ($errors->has('zip'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('zip') }}</strong>
                                    </span>
                @endif

                <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>

</form>
</div>
</div>
</div>

@endsection