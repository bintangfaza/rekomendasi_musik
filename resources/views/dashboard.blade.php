@extends('layouts.app')

@section('content')


<div class="text-center mb-6">
    <h2 class="text-2xl font-bold">Musik Untuk Kamu</h2>
    <p class="text-sm opacity-70">Rekomendasi lagu berdasarkan artis, genre & lirik</p>
</div>

<form method="GET" action="/" class="mb-6">
    <input
        type="text"
        name="q"
        value="{{ request('q') }}"
        placeholder="Cari lagu atau artis..."
        class="w-full p-3 rounded-xl bg-white bg-opacity-20 text-white placeholder-gray-300 focus:outline-none"
    >
</form>
@if ($songs->count() == 0)
    <p class="text-center text-gray-300">Tidak ada lagu ditemukan.</p>
@endif


<div class="space-y-4">
    @foreach ($songs as $song)

        <a href="{{ route('lagu.detail', $song->id) }}">
            <div class="flex items-center justify-between bg-white bg-opacity-10 backdrop-blur-xl p-4 rounded-xl hover:bg-opacity-20 mb-px transition">
                <div>
                    <p class="text-lg font-semibold">{{ $song->judul }}</p>
                    <p class="text-sm text-gray-300">{{ $song->artis }}</p>
                </div>
            </div>
        </a>
    @endforeach
</div>

@endsection