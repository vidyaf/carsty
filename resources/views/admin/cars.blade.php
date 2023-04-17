@extends('admin.layouts.layout')

@section('content')
    <section id="cars">
        <div class="container py-5 mt-4">
            <div class="row mb-3">
                <div class="col">
                    <h3>List Mobil :</h3>
                </div>
            </div>
            <div class="row">
                @livewire('cars')
            </div>
            <div class="row">
                <div class="col">
                    <button class="btn btn-success rounded-4 fw-bold" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                        Tambah Data
                    </button>
                </div>
            </div>
        </div>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Data Mobil</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('adminMobilCreate') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Mobil :</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name" name="name" value="{{ old('name') }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <input type="hidden" class="form-control @error('description') is-invalid @enderror"
                                    id="description" name="description" value="{{ old('description') }}"></input>
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
                                            <option value="" selected>Pilih Kategori</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                                <option value="{{ $condition->id }}">{{ $condition->name }}</option>
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
                                    id="price" name="price" value="{{ old('price') }}">
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="formFile" class="form-label">Foto Mobil :</label>
                                <input class="form-control @error('image') is-invalid @enderror" type="file"
                                    name="image" id="formFile">
                                @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
