@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Modifier une sauce</div>
                    <div class="card-body">
                        <form action="{{ route('sauces.update', $sauce->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="name">Nom</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{ $sauce->name }}">
                            </div>
                            <div class="form-group">
                                <label for="heat">Chaleur</label>
                                <input type="number" name="heat" id="heat" class="form-control" min="1" max="10" value="{{ $sauce->heat }}">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control">{{ $sauce->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="mainPepper">Principal ingrédient</label>
                                <input type="text" name="mainPepper" id="mainPepper" class="form-control" value="{{ $sauce->mainPepper }}">
                            </div>
                            <div class="form-group">
                                <label for="manufacturer">Fabricant</label>
                                <input type="text" name="manufacturer" id="manufacturer" class="form-control" value="{{ $sauce->manufacturer }}">
                            </div>
                            <div class="form-group">
                                <label for="imageUrl">Image</label>
                                <input type="file" name="imageUrl" id="imageUrl" class="form-control-file">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Modifier la sauce</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
