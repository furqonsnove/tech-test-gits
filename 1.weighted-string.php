<?php

// Fungsi untuk menghitung bobot sebuah karakter berdasarkan posisi alfabet
function calculateWeight($char)
{
    // String alfabe
    $alphabet = 'abcdefghijklmnopqrstuvwxyz';
    return strpos($alphabet, $char) + 1;
}

// Fungsi bobot dan karakter dalam string
function getWeights($string)
{
    $weights = [];
    $length = strlen($string);
    $i = 0;

    // Iterasi semnua karakter dalam string
    while ($i < $length) {
        $currentChar = $string[$i];
        $weight = calculateWeight($currentChar);
        $j = $i;
        $count = 1;

        // Loop untuk menemukan semua karakter berurutan yang sama
        while ($j + 1 < $length && $string[$j + 1] == $currentChar) {
            $j++;  // Pindah ke next karakter sama
            $count++;
            $weights[$weight * $count] = true;
        }

        $i = $j + 1;
        $weights[$weight] = true;
    }

    // Return array bobot
    return $weights;
}

// Function is exist queris within string
function weightedStrings($string, $queries)
{
    $weights = getWeights($string);
    $results = [];

    foreach ($queries as $query) {
        if (isset($weights[$query])) {
            $results[] = 'Yes';  // Jika ada, tambahkan 'Yes' ke hasil
        } else {
            $results[] = 'No';  // Jika tidak ada, tambahkan 'No' ke hasil
        }
    }

    return $results;
}

// Contoh
$string = "abbcccd"; 
$queries = [1, 3, 9, 8]; 
$output = weightedStrings($string, $queries); 
print_r($output); 
