@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">
                  Filters
                </div>
                <ul class="list-group list-group-flush">
                  <li class="list-group-item">
                    <form method="GET" action="{{ route('post.search') }}">
                      <div class="form-group">
                        <label>From</label>
                        <input type="text" class="form-control datepicker" placeholder="Search By Date" name="start_date"  autocomplete="off">
                      </div>
                      <div class="form-group">
                        <label>To</label>
                        <input type="text" class="form-control datepicker" placeholder="Search By Date" name="end_date"  autocomplete="off">
                      </div>
                      <button type="submit" class="btn btn-primary">Search</button>
                    </form>
                  </li>
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
