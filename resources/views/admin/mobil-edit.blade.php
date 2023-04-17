@extends('admin.layouts.layout')

@section('content')
    <section id="editMobil">
        <div class="container">
            <div class="row mt-5">
                <div class="col">
                    <a href="{{ route('adminMobil') }}" class="btn btn-primary  btn-sm rounded-3 fw-bold">Back</a>
                </div>
            </div>
            <div class="row align-items-centers">
                <div class="col-6">
                    <form action="{{ route('adminMobilEdit', $car->id) }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Mobil :</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name') ? old('name') : $car->name }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <input type="hidden" class="form-control @error('description') is-invalid @enderror"
                                    id="description" name="description"
                                    value="{{ old('description') ? old('description') : $car->description }}"></input>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <trix-editor input="description"></trix-editor>
                            </div>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-6">
                                        <select class="form-select @error('category_id') is-invalid @enderror"
                                            aria-label="Default select example" name="category_id">
                                            @if ($car->category_id == 0)
                                                <option value="" selected>Pilih Kategori</option>
                                            @endif
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    @if ($category->id == $car->category_id) selected @endif>{{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-6">
                                        <select class="form-select @error('condition_id') is-invalid @enderror"
                                            aria-label="Default select example" name="condition_id">
                                            <option value="" selected>Pilih Kondisi</option>
                                            @foreach ($conditions as $condition)
                                                <option value="{{ $condition->id }}"
                                                    @if ($condition->id == $car->condition_id) selected @endif>
                                                    {{ $condition->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('condition_id')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Harga Mobil :</label>
                                <input type="number" class="form-control @error('price') is-invalid @enderror"
                                    id="price" name="price" value="{{ old('price') ? old('price') : $car->price }}">
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Foto Mobil :</label>
                                <input type="hidden" value="{{ $car->image }}" name="oldImage">
                                <input class="form-control @error('image') is-invalid @enderror" type="file"
                                    name="image" id="image" onchange="previewImage()">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
                <div class="col-6">
                    @if ($car->image)
                        <img class="img-fluid img-preview d-block " width="800%"
                            src="{{ asset('storage/' . $car->image) }}">
                    @else
                        <img class="img-preview img-fluid " width="800%">
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
