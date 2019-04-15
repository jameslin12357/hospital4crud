@extends('layouts.app')

@section('content')

    @include('success')
    <div class="container pt-100">
        <div class="card item bd-none mb-30">
            <div class="card-body">
                <div class="flex jc-center mb-15 text-center"><img id="avatar" src="{{ $user[0]->imageurl }}" alt="" /></div>
        <h5 class="card-title mb-15 text-center">{{ $user[0]->email }}</h5>
        <h5 class="card-title mb-15 text-center">{{ $user[0]->name }}</h5>
        <p class="card-text mb-15 text-center">Joined {{ $user[0]->created_at }}</p>
        <p class="card-text mb-15 text-center">{{ $user[0]->description }}</p>
        @if (Auth::user()->id === $user[0]->id)
                    <div class="flex jc-center">
                        <a class="btn btn-outline-primary mr-15" href="/users/{{ $user[0]->id }}/edit">Edit</a>
            <form action="/users/{{ $user[0]->id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-outline-primary">Delete</button>
            </form>
        </div>
        @endif


    </div>
</div>
    </div>



@endsection
