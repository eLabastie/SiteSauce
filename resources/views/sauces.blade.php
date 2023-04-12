@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="row">
                    @foreach ($sauces as $sauce)
                        <div class="col-md-3 mb-3">
                            <a href="{{ route('sauces.show', ['id' => $sauce->id]) }}" style="text-decoration:none;">
                                <div class="card text-center" style="width: 100%;">
                                <img class="card-img-top" src="{{ asset($sauce->imageUrl) }}" alt="Card image cap" width="400px" height="250px">


                                    <div class="card-body">
                                        <h5 class="card-title">{{ $sauce->name }}</h5>
                                        <p class="card-text">Heat: {{ $sauce->heat }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
