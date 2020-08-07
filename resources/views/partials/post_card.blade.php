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
        @if(Route::current()->getName() !== 'home')
            <div class="btn-action">
                @can('posts.edit')
                    <a href="{{ route('post.edit', $post->id) }}" class="btn btn-warning col-12">Edit</a>
                @endcan
                @can('posts.delete')
                <button 
                class="btn btn-danger delete col-12"
                data-id="{{ $post->id }}"
                data-original-title="Delete"
                data-delete_route="{{ route('post.destroy', $post->id) }}">Delete</button>
                @endcan
            </div>
        @endif
    </div>
</div>