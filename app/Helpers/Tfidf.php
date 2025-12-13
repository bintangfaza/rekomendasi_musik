<?php

namespace App\Helpers;

class Tfidf
{
    public static function tfidf($queries, $docs)
    {
        $terms = array_unique(array_merge($queries, ...$docs));

        $tfDocs = [];
        foreach ($docs as $doc) {
            $tfDocs[] = array_map(function($term) use ($doc) {
                return count(array_keys($doc, $term));
            }, $terms);
        }

        $tfQuery = array_map(function($term) use ($queries) {
            return count(array_keys($queries, $term));
        }, $terms);

        
        $N = count($docs);
        $idf = array_map(function($term) use ($docs, $N) {
            $count = 0;
            foreach ($docs as $d) {
                if (in_array($term, $d)) $count++;
            }
            return log(($N+1)/($count+1)) + 1;
        }, $terms);

        
        $tfidfDocs = [];
        foreach ($tfDocs as $tf) {
            $tfidfDocs[] = array_map(fn($w, $i) => $w * $idf[$i], $tf, array_keys($tf));
        }

        $tfidfQuery = array_map(fn($w, $i) => $w * $idf[$i], $tfQuery, array_keys($tfQuery));

        return [$tfidfQuery, $tfidfDocs];
    }

    public static function cosine($a, $b)
    {
        $dot = array_sum(array_map(fn($x, $y) => $x * $y, $a, $b));
        $magA = sqrt(array_sum(array_map(fn($x) => $x*$x, $a)));
        $magB = sqrt(array_sum(array_map(fn($x) => $x*$x, $b)));

        if ($magA * $magB == 0) return 0;
        return $dot / ($magA * $magB);
    }
}
