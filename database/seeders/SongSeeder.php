<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SongSeeder extends Seeder
{
    public function run()
    {
        $json = file_get_contents(storage_path('app/katalagu.json'));
        $data = json_decode($json, true);

        foreach ($data['lyrics'] as $song) {
            DB::table('lagu')->insert([
                'judul'      => $song['title'],   
                'artis'      => $song['artist'],
                'lirik'      => $song['lyric'],
                'genre'      => $song['genre'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
