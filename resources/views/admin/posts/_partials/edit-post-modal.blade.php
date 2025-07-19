<x-modal id="editPostModal{{ $post->id }}" title="Edit Post" size="modal-lg">
    <form action="{{ route('admin.posts.update', $post) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="modal-body">
            <div class="mb-3">
                <label for="title{{ $post->id }}" class="form-label">Post Title</label>
                <input 
                    type="text" 
                    name="title" 
                    id="title{{ $post->id }}" 
                    class="form-control" 
                    value="{{ $post->title }}" 
                    required>
            </div>

            <div class="mb-3">
                <label for="content{{ $post->id }}" class="form-label">Content</label>
                <textarea 
                    name="content" 
                    id="content{{ $post->id }}" 
                    class="form-control" 
                    rows="5" 
                    required>{{ $post->content }}</textarea>
            </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Update Post</button>
        </div>
    </form>
</x-modal>

<script src="{{ asset('assets/js/modals.js') }}"></script>
