@extends('layout')

@section('content')
<div class="max-w-3xl mx-auto p-6">
    <h1 class="text-2xl font-bold">{{ $video->title }}</h1>

    <div class="my-4 aspect-video">
        @php
            function getYoutubeEmbedUrl($url) {
                if (preg_match("/(?:https?:\/\/)?(?:www\.)?youtube\.com\/(?:[^\/\n\s]+\/\S+\/|(?:v|e(?:mbed)?)\/|\S*?[?&]v=)([a-zA-Z0-9_-]{11})/", $url, $matches)) {
                    return 'https://www.youtube.com/embed/' . $matches[1];
                }
                if (preg_match("/(?:https?:\/\/)?(?:www\.)?youtu\.be\/([a-zA-Z0-9_-]{11})/", $url, $matches)) {
                    return 'https://www.youtube.com/embed/' . $matches[1];
                }
                return null;
            }

            $embedUrl = getYoutubeEmbedUrl($video->url);
        @endphp

        @if ($embedUrl)
            <iframe class="w-full h-full rounded" src="{{ $embedUrl }}" frameborder="0"
                    allowfullscreen></iframe>
        @else
            <p class="text-red-500">URL video tidak valid atau belum didukung.</p>
        @endif
    </div>

    <hr class="my-6">

    <h2 class="text-xl font-semibold mb-2">Komentar ({{ $video->comments()->whereNull('parent_id')->count() }})</h2>

    @foreach ($comments as $comment)
    <x-comment :comment="$comment" :video="$video" />
    @endforeach

    <form method="POST" action="{{ route('comments.store', ['type' => 'videos', 'id' => $video->id]) }}">
        @csrf
        <textarea name="body" rows="3" placeholder="Tulis komentar..." class="w-full border rounded px-3 py-2 mb-2" required></textarea>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Kirim Komentar
        </button>
    </form>
</div>
@endsection
