@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card text-center" >
                    <img class="card-img-top" src="{{ asset($sauce->imageUrl) }}" alt="Card image cap" width="300px" height="400px">
                    <div class="card-body">
                        <h5 class="card-title">{{ $sauce->name }}</h5> 
                        <h6 class="card-subtitle mb-2 text-muted">Heat: {{ $sauce->heat }} / 10</h6>
                        <p class="card-text">{{ $sauce->description }}</p>
                        <p class="card-text">Main Pepper : {{ $sauce->mainPepper }}</p>
                        <p class="card-text">Manufacturer : {{ $sauce->manufacturer }}</p>
                        @if(Auth::user()->id == $sauce->userId) 
                        <div class="d-flex justify-content-center">
                            <a href="{{ route('sauces.edit', ['id' => $sauce->id]) }}" class="btn btn-primary mr-2">Modifier</a>
                            <form action="{{ route('sauces.destroy', $sauce->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger ml-2">Supprimer</button>
                            </form>
                        </div>
                        @endif
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-center align-items-center">
                            <div>
                            <form action="{{ route('sauces.like', $sauce->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-success mr-1">Like</button>
                            </form>
                            <span class="ml-1">{{ $sauce->likes }}</span> </div>
                            <div>
                            <form action="{{ route('sauces.dislike', $sauce->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger mr-1">Dislike</button>
                            </form>
                            <span class="ml-1">{{ $sauce->dislikes }}</span> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
