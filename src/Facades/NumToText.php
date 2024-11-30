<?php

namespace App\Trait;

class NumToText
{
    /**
     * Convert a number to words.
     *
     * @param int $number
     * @return string
     */
    public static function convert($number)
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
            return $words[intval($number / 100)] . ' Hundred' . ($number % 100 ? ' and ' . self::convert($number % 100) : '');
        } else {
            return $number; // handle larger numbers as needed
        }
    }
}
