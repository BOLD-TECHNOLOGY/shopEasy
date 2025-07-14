<x-modal id="addPostModal" title="Create Post" size="modal-lg">

    <form action="{{ route('admin.posts.store') }}" method="POST">
        @csrf
        <input name="title" class="form-control mb-2" placeholder="Post Title" required>
        <textarea name="content" class="form-control mb-2" rows="4" placeholder="Content..." required></textarea>
        <button type="submit" class="btn btn-success">Create</button>
    </form>

</x-modal>

<script src="{{ asset('assets/js/modals.js') }}"></script>