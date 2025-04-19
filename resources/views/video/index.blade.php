@extends('layout')

@section('content')
<div class="max-w-4xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Daftar Video</h1>

    <a href="{{ route('videos.create') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mb-4">
        + Tambah Video
    </a>

    <table class="w-full border border-gray-300 text-left">
        <thead class="bg-gray-100">
            <tr>
                <th class="border px-4 py-2">Judul</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($videos as $video)
            <tr class="hover:bg-gray-50">
                <td class="border px-4 py-2">{{ $video->title }}</td>
                <td class="border px-4 py-2 space-x-2">
                    <a href="{{ route('videos.show', $video) }}" class="text-blue-600 hover:underline">Lihat</a>
                    <a href="{{ route('videos.edit', $video) }}" class="text-yellow-500 hover:underline">Edit</a>
                    <form action="{{ route('videos.destroy', $video) }}" method="POST" class="inline-block"
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
