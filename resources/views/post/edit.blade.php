@extends('layout')

@section('content')
<div class="max-w-xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">{{ isset($post) ? 'Edit Post' : 'Buat Post' }}</h1>

    <form method="POST" action="{{ isset($post) ? route('posts.update', $post) : route('posts.store') }}">
        @csrf
        @if(isset($post)) @method('PUT') @endif

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Judul</label>
            <input type="text" name="title" value="{{ old('title', $post->title ?? '') }}"
                   class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Konten</label>
            <textarea name="content" rows="5" class="w-full border rounded px-3 py-2"
                      required>{{ old('content', $post->content ?? '') }}</textarea>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Simpan
        </button>
        <a href="{{ route('posts.index') }}" class="text-gray-600 ml-4 hover:underline">Batal</a>
    </form>
</div>
@endsection
