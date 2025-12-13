<?php

namespace App\Helpers;

use Sastrawi\Stemmer\StemmerFactory;
use Sastrawi\StopWordRemover\StopWordRemoverFactory;

class TextPreprocessing
{
    static function process($text)
    {
        
        $text = strtolower($text);

        // stemmer
        $stemmerFactory = new StemmerFactory();
        $stemmer = $stemmerFactory->createStemmer();
        $text = $stemmer->stem($text);

        // stopword removal
        $stopwordFactory = new StopWordRemoverFactory();
        $stopword = $stopwordFactory->createStopWordRemover();
        $text = $stopword->remove($text);

        
        $tokens = preg_split('/\s+/', $text);

        
        $tokens = array_map(function ($t) {
            return preg_replace('/[^a-z]/', '', $t);
        }, $tokens);
  
        $tokens = array_filter($tokens);

        return array_values($tokens);
    }
}
