<x-layouts.app :title="__('eliteShop | Posts')">
    @include ('shop-easy.includes.dashboard-head')

    <div class="container">
        <h2>Promotion Posts</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addPostModal">
            Create New Post
        </button>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S/N</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $index => $post)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->user->name }}</td>
                        <td>{{ $post->created_at->format('Y-m-d') }}</td>
                        <td>
                            <button class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#editPostModal{{ $post->id }}">
                                View
                            </button>

                            <form action="{{ route('admin.posts.destroy', $post) }}" method="POST" style="display:inline;">
                                @csrf @method('DELETE')
                                <button type="submit" onclick="return confirm('Delete this post?')" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>

                    @include('admin.posts._partials.edit-post-modal', ['post' => $post])
                @empty
                    <tr><td colspan="5">No posts yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    @include('admin.posts._partials.add-post-modal')

</x-layouts.app>
