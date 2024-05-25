<?php

function createHighestPalindrome($str, $k)
{
    // Helper membuat palindrome
    function makePalindrome(&$str, &$left, &$right, &$k)
    {
        // jika left >= right, end
        if ($left >= $right) {
            return;
        }

        // cek posisi kiri dan kanan
        if ($str[$left] != $str[$right]) {
            // set palindrome
            $maxChar = max($str[$left], $str[$right]);
            $str[$left] = $maxChar;
            $str[$right] = $maxChar;
            // decrement k
            $k--;
        }

        // cek posisi selanjutnya
        makePalindrome($str, ++$left, --$right, $k);
    }

    // Helper maksimal palindrome
    function maximizePalindrome(&$str, &$left, &$right, &$k)
    {
        // jika left >= right, end
        if ($left >= $right) {
            return;
        }

        // Jika karakter di posisi kiri dan kanan sudah sama
        if ($str[$left] == $str[$right]) {
            // sampai maksimal & belum 9
            if ($k > 0 && $str[$left] != '9') {
                $str[$left] = '9';
                $str[$right] = '9';
                $k -= 2; // karena mengubah dua karakter
            }
        } else {
            // cek apakah ada 9
            if ($k > 0 && ($str[$left] != '9' || $str[$right] != '9')) {
                $str[$left] = '9';
                $str[$right] = '9';
                $k--; // karena hanya mengganti satu karakter
            }
        }

        // cek posisi selanjutnya
        maximizePalindrome($str, ++$left, --$right, $k);
    }

    // convert string ke array
    $chars = str_split($str);
    $left = 0;
    $right = count($chars) - 1;

    // call helper palindrome
    makePalindrome($chars, $left, $right, $k);

    // cek all is checked
    if ($k < 0) {
        return -1;
    }

    // reset index
    $left = 0;
    $right = count($chars) - 1;

    // compare dan ambile maksimal palindrome
    maximizePalindrome($chars, $left, $right, $k);

    // implode dan return hasilnya
    return implode('', $chars);
}

// Example
echo createHighestPalindrome("3943", 1) . "\n"; 
echo createHighestPalindrome("932239", 2) . "\n";
