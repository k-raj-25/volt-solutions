@extends('admin.layout')
@section('title', $post->exists ? 'Edit post' : 'New post')

@push('head')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css">
@endpush

@section('content')
<header>
    <h1>{{ $post->exists ? 'Edit post' : 'New post' }}</h1>
    <a class="btn btn-outline btn-sm" href="{{ route('admin.posts.index') }}">Back to posts</a>
</header>

<form method="POST" enctype="multipart/form-data" id="post-form"
      action="{{ $post->exists ? route('admin.posts.update', $post) : route('admin.posts.store') }}">
    @csrf
    @if ($post->exists) @method('PUT') @endif

    <div class="form-grid">
        <div class="box">
            <div class="field">
                <label for="title">Title</label>
                <input type="text" id="title" name="title" value="{{ old('title', $post->title) }}" required>
                @error('title')<div class="error">{{ $message }}</div>@enderror
            </div>
            <div class="field">
                <label for="excerpt">Short summary (shown on cards)</label>
                <textarea id="excerpt" name="excerpt" style="min-height:80px" maxlength="400">{{ old('excerpt', $post->excerpt) }}</textarea>
                @error('excerpt')<div class="error">{{ $message }}</div>@enderror
            </div>
            <div class="field">
                <label>Content</label>
                <div id="editor">{!! old('body', $post->body) !!}</div>
                <input type="hidden" name="body" id="body">
                @error('body')<div class="error">{{ $message }}</div>@enderror
            </div>
            <div class="field">
                <label for="meta_description">SEO description (max 200 characters)</label>
                <input type="text" id="meta_description" name="meta_description" maxlength="200" value="{{ old('meta_description', $post->meta_description) }}">
            </div>
        </div>

        <div class="box">
            <div class="field">
                <label for="status">Status</label>
                <select id="status" name="status">
                    <option value="draft" @selected(old('status', $post->status) === 'draft')>Draft</option>
                    <option value="published" @selected(old('status', $post->status) === 'published')>Published</option>
                </select>
            </div>
            <div class="field">
                <label for="published_at">Publish date &amp; time</label>
                <input type="datetime-local" id="published_at" name="published_at" value="{{ old('published_at', $post->published_at?->format('Y-m-d\TH:i')) }}">
                <small style="color:var(--muted)">Leave blank to publish now. A future date schedules the post.</small>
                @error('published_at')<div class="error">{{ $message }}</div>@enderror
            </div>
            <div class="field">
                <label for="author_name">Author name</label>
                <input type="text" id="author_name" name="author_name" value="{{ old('author_name', $post->author_name) }}" required>
                @error('author_name')<div class="error">{{ $message }}</div>@enderror
            </div>
            <div class="field">
                <label for="category">Category</label>
                <select id="category" name="category">
                    @foreach (\App\Models\Post::CATEGORIES as $slug => $label)
                        <option value="{{ $slug }}" @selected(old('category', $post->category ?? 'finance-tips') === $slug)>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <div class="field">
                <label for="tags">Tags (comma separated)</label>
                <input type="text" id="tags" name="tags" value="{{ old('tags', $post->tags) }}">
            </div>
            <div class="field">
                <label for="cover_image">Cover image (JPG, PNG, WebP, max 4 MB)</label>
                @if ($post->cover_url)
                    <img class="thumb" src="{{ $post->cover_url }}" alt="Current cover">
                    <label style="font-weight:400"><input type="checkbox" name="remove_cover" value="1"> Remove current image</label>
                @endif
                <input type="file" id="cover_image" name="cover_image" accept="image/png,image/jpeg,image/webp">
                @error('cover_image')<div class="error">{{ $message }}</div>@enderror
            </div>
            <button class="btn btn-primary" type="submit" style="width:100%;justify-content:center">{{ $post->exists ? 'Save changes' : 'Create post' }}</button>
        </div>
    </div>
</form>
@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
<script>
    var quill = new Quill('#editor', {
        theme: 'snow',
        modules: { toolbar: [[{ header: [2, 3, false] }], ['bold', 'italic', 'underline'], [{ list: 'ordered' }, { list: 'bullet' }], ['blockquote', 'link'], ['clean']] }
    });
    document.getElementById('post-form').addEventListener('submit', function () {
        document.getElementById('body').value = quill.root.innerHTML === '<p><br></p>' ? '' : quill.root.innerHTML;
    });
</script>
@endpush
