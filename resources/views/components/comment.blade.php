<div class="bg-gray-100 p-3 rounded mb-2">
    <p>{{ $comment->body }}</p>

    <a href="javascript:void(0)" class="text-blue-600 text-sm"
       onclick="document.getElementById('reply-form-{{ $comment->id }}').classList.toggle('hidden')">
        Balas
    </a>

    <div id="reply-form-{{ $comment->id }}" class="hidden mt-2">
        <form method="POST" action="{{ route('comments.store', ['type' => 'videos', 'id' => $video->id]) }}">
            @csrf
            <input type="hidden" name="parent_id" value="{{ $comment->id }}">
            <textarea name="body" rows="2" placeholder="Tulis balasan..." class="w-full border rounded px-3 py-2 my-2" required></textarea>
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Kirim Balasan</button>
        </form>
    </div>

    @if ($comment->replies_count > 0)
        <button onclick="document.getElementById('replies-{{ $comment->id }}').classList.toggle('hidden')"
                class="text-sm text-gray-600 mt-2">
            Lihat {{ $comment->replies_count }} balasan
        </button>

        <div id="replies-{{ $comment->id }}" class="hidden ml-6 mt-3 border-l border-gray-300 pl-4">
            @foreach ($comment->replies as $reply)
                <x-comment :comment="$reply" :video="$video" />
            @endforeach
        </div>
    @endif
</div>
