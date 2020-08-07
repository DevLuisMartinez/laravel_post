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