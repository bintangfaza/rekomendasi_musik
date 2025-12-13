<?php

namespace App\Http\Controllers;

use App\Helpers\Tfidf;
use App\Helpers\TextPreprocessing;
use App\Models\Lagu;
use Illuminate\Http\Request;

class LaguController extends Controller
{
    public function detail($id)
    {
        $song = Lagu::findOrFail($id);
        $recommendations = $this->getRecommendations($song);

        return view('detail', compact('song', 'recommendations'));
    }

    private function getRecommendations($song)
    {
        $allSongs = Lagu::where('id', '!=', $song->id)->get();

        // preprocessing dokumen utama
        $mainTokens = TextPreprocessing::process(
            $song->genre . ' ' . $song->artis . ' ' . $song->lirik
        );

        $docs = [];
        foreach ($allSongs as $item) {
            $docs[] = TextPreprocessing::process(
                $item->genre . ' ' . $item->artis . ' ' . $item->lirik
            );
        }

        [$mainVector, $docVectors] = Tfidf::tfidf($mainTokens, $docs);

    
        $results = [];
        foreach ($docVectors as $i => $vec) {
            $results[] = [
                'song'  => $allSongs[$i],
                'score' => Tfidf::cosine($mainVector, $vec)
            ];
        }

        usort($results, fn($a, $b) => $b['score'] <=> $a['score']);
        return array_slice($results, 0, 5);
    }
}
