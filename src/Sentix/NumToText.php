<?php


namespace Sentix;


class NumToText
{
    /**
     * Convert a number to words.
     *
     * @param int $number
     * @return string
     */
    public static function convertNumberToWords($number)
    {
        $words = [
            0 => 'Zero',
            1 => 'One',
            2 => 'Two',
            3 => 'Three',
            4 => 'Four',
            5 => 'Five',
            6 => 'Six',
            7 => 'Seven',
            8 => 'Eight',
            9 => 'Nine',
            10 => 'Ten',
            11 => 'Eleven',
            12 => 'Twelve',
            13 => 'Thirteen',
            14 => 'Fourteen',
            15 => 'Fifteen',
            16 => 'Sixteen',
            17 => 'Seventeen',
            18 => 'Eighteen',
            19 => 'Nineteen',
            20 => 'Twenty',
            30 => 'Thirty',
            40 => 'Forty',
            50 => 'Fifty',
            60 => 'Sixty',
            70 => 'Seventy',
            80 => 'Eighty',
            90 => 'Ninety'
        ];
    
        // Handle numbers from 0-19
        if ($number < 20) {
            return $words[$number];
        }
    
        // Handle numbers from 20-99
        if ($number < 100) {
            return $words[intval($number / 10) * 10] . ($number % 10 ? ' ' . $words[$number % 10] : '');
        }
    
        // Handle numbers from 100-999
        if ($number < 1000) {
            return $words[intval($number / 100)] . ' Hundred' . ($number % 100 ? ' and ' . self::convertNumberToWords($number % 100) : '');
        }
    
        // Handle numbers from 1000-999999 (thousands)
        if ($number < 1000000) {
            return self::convertNumberToWords(intval($number / 1000)) . ' Thousand' . ($number % 1000 ? ' ' . self::convertNumberToWords($number % 1000) : '');
        }
    
        // Handle numbers from 1000000-999999999 (millions)
        if ($number < 1000000000) {
            return self::convertNumberToWords(intval($number / 1000000)) . ' Million' . ($number % 1000000 ? ' ' . self::convertNumberToWords($number % 1000000) : '');
        }
    
        // Handle numbers from 1000000000-999999999999 (billions)
        if ($number < 1000000000000) {
            return self::convertNumberToWords(intval($number / 1000000000)) . ' Billion' . ($number % 1000000000 ? ' ' . self::convertNumberToWords($number % 1000000000) : '');
        }
    
        // Handle larger numbers (trillions, quadrillions, etc.)
        if ($number < 1000000000000000) {
            return self::convertNumberToWords(intval($number / 1000000000000)) . ' Trillion' . ($number % 1000000000000 ? ' ' . self::convertNumberToWords($number % 1000000000000) : '');
        }
    
        // Default fallback if needed
        return $number; // Can be extended for even larger numbers.
    }
    

    /**
     * Convert words to number (for simple cases like "One", "Twenty", etc.)
     *
     * @param string $words
     * @return int
     */
    public static function convertWordsToNumber($words)
    {
        // Define words-to-numbers mapping
        $wordsToNumbers = [
            'zero' => 0,
            'one' => 1,
            'two' => 2,
            'three' => 3,
            'four' => 4,
            'five' => 5,
            'six' => 6,
            'seven' => 7,
            'eight' => 8,
            'nine' => 9,
            'ten' => 10,
            'eleven' => 11,
            'twelve' => 12,
            'thirteen' => 13,
            'fourteen' => 14,
            'fifteen' => 15,
            'sixteen' => 16,
            'seventeen' => 17,
            'eighteen' => 18,
            'nineteen' => 19,
            'twenty' => 20,
            'thirty' => 30,
            'forty' => 40,
            'fifty' => 50,
            'sixty' => 60,
            'seventy' => 70,
            'eighty' => 80,
            'ninety' => 90,
            'hundred' => 100,
            'thousand' => 1000,
            'million' => 1000000,
            'billion' => 1000000000,
            'trillion' => 1000000000000,
        ];
    
        $words = strtolower($words); // Make case-insensitive
        $number = 0;
        $temp = 0;
        $multiplier = 1;
    
        // Split the words into parts
        $parts = explode(' ', $words);
    
        foreach ($parts as $part) {
            // If the part is a number word
            if (isset($wordsToNumbers[$part])) {
                // If the part is "hundred", multiply the previous number
                if ($part == 'hundred') {
                    $temp *= $wordsToNumbers[$part];
                } elseif ($part == 'thousand' || $part == 'million' || $part == 'billion' || $part == 'trillion') {
                    // If the part is a large number (thousand, million, billion, trillion)
                    $temp *= $wordsToNumbers[$part];
                    $number += $temp; // Add the current value to the total number
                    $temp = 0; // Reset temp for the next part
                } else {
                    // If it's a regular number word, add its value
                    $temp += $wordsToNumbers[$part];
                }
            }
        }
    
        // Add the remaining value of temp to the total number
        $number += $temp;
    
        return $number;
    }
    
    
}
