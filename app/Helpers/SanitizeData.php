<?php

namespace App\Helpers;

class SanitizeData{
    public static function currency($value)
    {
        $formatter = new \NumberFormatter('en_AU', \NumberFormatter::CURRENCY);
        $formatter->setTextAttribute(\NumberFormatter::CURRENCY_CODE, 'AUD');
        if(floor($value) == ceil($value)){
            $formatter->setAttribute(\NumberFormatter::MAX_FRACTION_DIGITS, 2);
        }
        $currency = $formatter->format($value);
        return $currency;
    }

    public static function removeCurrecnyAndComma($value){
        $data = substr($value, 1);
        return str_replace(',', '', $data);
    }
}
