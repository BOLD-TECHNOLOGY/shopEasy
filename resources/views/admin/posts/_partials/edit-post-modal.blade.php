<x-modal id="editPostModal{{ $post->id }}" title="Edit Post" size="modal-lg">

    <form action="{{ route('admin.posts.update', $post) }}" method="POST">
        @csrf @method('PUT')
        <input name="title" class="form-control mb-2" value="{{ $post->title }}" required>
        <textarea name="content" class="form-control mb-2" rows="4" required>{{ $post->content }}</textarea>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>

</x-modal>

<script src="{{ asset('assets/js/modals.js') }}"></script>