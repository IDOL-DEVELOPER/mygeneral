<?php


namespace Kvbishnoi;


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

        if ($number < 20) {
            return $words[$number];
        } elseif ($number < 100) {
            return $words[intval($number / 10) * 10] . ($number % 10 ? ' ' . $words[$number % 10] : '');
        } elseif ($number < 1000) {
            return $words[intval($number / 100)] . ' Hundred' . ($number % 100 ? ' and ' . self::convertNumberToWords($number % 100) : '');
        } else {
            return $number; // Handle larger numbers as needed
        }
    }

    /**
     * Convert words to number (for simple cases like "One", "Twenty", etc.)
     *
     * @param string $words
     * @return int
     */
    public static function convertWordsToNumber($words)
    {
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
            'ninety' => 90
        ];

        $words = strtolower($words); // Case insensitive
        $number = 0;

        // Convert simple words directly
        if (isset($wordsToNumbers[$words])) {
            return $wordsToNumbers[$words];
        }

        // Handling compound numbers like "Twenty One"
        $parts = explode(' ', $words);
        foreach ($parts as $part) {
            if (isset($wordsToNumbers[$part])) {
                $number += $wordsToNumbers[$part];
            }
        }

        return $number;
    }
}
