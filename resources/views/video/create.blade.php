@extends('layout')

@section('content')
<div class="max-w-xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">{{ isset($video) ? 'Edit Video' : 'Tambah Video' }}</h1>

    <form method="POST" action="{{ isset($video) ? route('videos.update', $video) : route('videos.store') }}">
        @csrf
        @if(isset($video)) @method('PUT') @endif

        <div class="mb-4">
            <label class="block mb-1 font-semibold">Judul</label>
            <input type="text" name="title" value="{{ old('title', $video->title ?? '') }}"
                   class="w-full border rounded px-3 py-2" required>
        </div>

        <div class="mb-4">
            <label class="block mb-1 font-semibold">URL Video</label>
            <input type="url" name="url" value="{{ old('url', $video->url ?? '') }}"
                   class="w-full border rounded px-3 py-2" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Simpan
        </button>
        <a href="{{ route('videos.index') }}" class="text-gray-600 ml-4 hover:underline">Batal</a>
    </form>
</div>
@endsection
