@extends('layout')

@section('content')
<div class="max-w-3xl mx-auto p-6">
    <h1 class="text-2xl font-bold">{{ $post->title }}</h1>
    <p class="mt-4 text-gray-700">{{ $post->content }}</p>

    <hr class="my-6">

    <h2 class="text-xl font-semibold mb-2">Komentar</h2>
    <div class="space-y-3 mb-6">
        @forelse ($post->comments as $comment)
            <div class="bg-gray-100 p-3 rounded">
                {{ $comment->body }}
            </div>
        @empty
            <p class="text-gray-500">Belum ada komentar.</p>
        @endforelse
    </div>

    <form method="POST" action="{{ route('comments.store', ['type' => 'posts', 'id' => $post->id]) }}">
        @csrf
        <textarea name="body" rows="3" placeholder="Tulis komentar..." class="w-full border rounded px-3 py-2 mb-2" required></textarea>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Kirim Komentar
        </button>
    </form>
</div>
@endsection
