<div class="post-grid d-flex flex-wrap">
    @forelse($posts as $post)
        @include('partials.post_card')
    @empty
        <div class="d-flex justify-content-center col-12"><p>Not Posts Found</p></div>
    @endforelse
</div>
<div class="d-flex justify-content-center col-12">
    {{ $posts->links() }}
</div>
