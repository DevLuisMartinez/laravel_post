<div class="post-card col-sm-6 col-md-4 col-lg-4 mb-5">
    <div class="post card">
        <h5 class="card-header">{{ $post->title }}</h5>
        <div class="card-body">
            <p class="card-text">{{ $post->description }}</p>
        </div>
        <div class="card-footer">
            <label class="d-flex justify-content-end">Author: {{ $post->user->name }}</label>
            <label class="d-flex justify-content-end">{{ $post->published_date }}</label>
        </div>

        <div class="btn-action">
            @can('post.edit')
                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-warning col-12">Edit</a>
            @endcan
            @can('post.delete')
            <a href="{{ route('post.destroy', $post->id) }}" class="btn btn-danger col-12">Delete</a>
            @endcan
        </div>
    </div>
</div>