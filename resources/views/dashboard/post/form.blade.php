@extends('layouts.app')

@section('content')

@php

    $action =   'New';
    $route  =   route('post.store');
    if(isset($post)){
        $action =   'Edit';
        $route  =   route('post.update', $post->id);
    }
@endphp

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 ">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                  {{ $action }} Post
                  <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ $route }}">
                        @csrf
                        @if(isset($post->id))
                            @method('PUT')
                        @endif
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="Title" value="{{ old('title', $servicio->title ?? '') }}" maxlength="100">
                                <span class="not-valid">
                                    {{ $errors->first('title') }}
                                <span>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="description" rows="3" maxlength="255">{{ old('description', $servicio->description ?? '') }}</textarea>
                                <span class="not-valid">
                                    {{ $errors->first('description') }}
                                <span>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
              </div>
        </div>
    </div>
</div>
@endsection
