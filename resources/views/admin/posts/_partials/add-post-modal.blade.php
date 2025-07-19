<x-modal id="addPostModal" title="Create Post" size="modal-lg">
    <form action="{{ route('admin.posts.store') }}" method="POST">
        @csrf

        <div class="modal-body">
            <div class="mb-3">
                <label for="title" class="form-label">Post Title</label>
                <input name="title" id="title" class="form-control" placeholder="Enter post title" required>
                <small class="form-text text-muted">Slug will be generated automatically.</small>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" id="content" class="form-control" rows="5" placeholder="Write the post content..." required></textarea>
            </div>

            {{-- Optional published toggle --}}
            <div class="form-check form-switch mb-3">
                <input class="form-check-input" type="checkbox" name="published" id="published" checked>
                <label class="form-check-label" for="published">Publish Now</label>
            </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-success">Create Post</button>
        </div>
    </form>
</x-modal>

<script src="{{ asset('assets/js/modals.js') }}"></script>
