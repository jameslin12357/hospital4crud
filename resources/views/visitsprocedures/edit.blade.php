@extends('layouts.app')

@section('content')

    <div class="container pt-100">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <h3 class="login-heading mb-4 text-center">Edit Visitprocedure</h3>
                <form action="/visitsprocedures/{{ $visitprocedure[0]->id }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Visit Id" value="{{ old( 'visit_id', $visitprocedure[0]->visit_id) }}" name="visit_id" required>
                    </div>
                    @if ($errors->has('visit_id'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('visit_id') }}</strong>
                                    </span>
                    @endif
                    <div class="form-group">
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Procedure Id" value="{{ old( 'procedure_id', $visitprocedure[0]->procedure_id) }}" name="procedure_id" required>
                    </div>
                    @if ($errors->has('procedure_id'))
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('procedure_id') }}</strong>
                                    </span>
                    @endif




                    <button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>

                </form>
            </div>
        </div>
    </div>

@endsection