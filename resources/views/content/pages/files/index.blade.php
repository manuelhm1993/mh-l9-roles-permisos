@php
$configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Page 2')

@section('content')
    <h4>Formulario de ficheros</h4>

    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('files.store') }}" method="POST" enctype="multipart/form-data" id="upload-file">
                @csrf

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="file" name="file" placeholder="Choose file" id="file">

                            @error('file')
                                <div class="alert alert-danger mt-1 mb-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary" id="submit">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
