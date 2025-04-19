@extends('layout')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Daftar Post</h1>

    <a href="{{ route('posts.create') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4">
        + Tambah Post
    </a>

    <table class="w-full border border-gray-300 text-left">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">Judul</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr class="hover:bg-gray-50">
                <td class="border px-4 py-2">{{ $post->title }}</td>
                <td class="border px-4 py-2 space-x-2">
                    <a href="{{ route('posts.show', $post) }}" class="text-blue-600 hover:underline">Lihat</a>
                    <a href="{{ route('posts.edit', $post) }}" class="text-yellow-500 hover:underline">Edit</a>
                    <form action="{{ route('posts.destroy', $post) }}" method="POST" class="inline-block"
                          onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:underline">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
