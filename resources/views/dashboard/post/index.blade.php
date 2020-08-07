@extends('layouts.app')

@section('content')
<div class="post-full container">
    <div class="row">
        
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                  Filters
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item"><a href="">Posts</a></li>
                  <li class="list-group-item"><a href="">Your Posts</a></li>
                </ul>
              </div>
        </div>

        <div class="col-md-8">
            @include('partials.post_grid')
        </div>
        <a href="{{ route('post.create') }}" class="new-record"><i class="fas fa-plus"></i></a>
    </div>
</div>
@endsection
