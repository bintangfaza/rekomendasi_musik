@extends('layouts.app')

@section('content')

<div class="mb-6">
    <h1 class="text-3xl font-bold mb-2">{{ $song->judul }}</h1>
    <p class="text-lg text-gray-200">{{ $song->artis }}</p>
    <span class="px-3 py-1 text-sm bg-white bg-opacity-20 rounded-lg mt-2 inline-block">
        Genre: {{ $song->genre }}
    </span>
</div>

<div class="bg-white bg-opacity-10 backdrop-blur p-4 rounded-xl max-h-64 overflow-y-auto mb-8">
    <h3 class="text-xl font-semibold mb-2">Lirik Lagu</h3>
    <p class="whitespace-pre-line text-gray-200 text-sm">
        {{ $song->lirik }}
    </p>
</div>

<!-- Rekomendasi -->
<div>
    <h3 class="text-2xl font-semibold mb-4">Rekomendasi Lagu</h3>

    <div class="space-y-3">
        @foreach ($recommendations as $rec)
        <div class="flex items-center justify-between bg-white bg-opacity-10 p-4 rounded-xl hover:bg-opacity-20 transition">
            <a href="{{ route('lagu.detail', $rec['song']->id) }}">
                <div>
                    <p class="text-lg font-bold">{{ $rec['song']->judul }}</p>
                    <p class="text-sm text-gray-300">{{ $rec['song']->artis }}</p>
                </div>
            </a>
            <p class="text-sm text-green-300">
                Score: {{ number_format($rec['score'], 3) }}
            </p>
        </div>
        @endforeach
    </div>
</div>

@endsection