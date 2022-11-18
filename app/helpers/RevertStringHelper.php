<?php

namespace helpers;

use web\helpers\AbstractHelper;

class RevertStringHelper extends AbstractHelper {

    public function revert($text) {
        $textArray = preg_split('/[^?,!;.\-\w]+/u', $text, -1, PREG_SPLIT_NO_EMPTY);
        $resultArray = [];
        foreach ($textArray as $index => $word) {
            $wordArray = preg_split('/([?,!;.\s:])/', $word, -1, PREG_SPLIT_DELIM_CAPTURE);
            if (!empty($wordArray[0])) {
                $hasUpperCase = preg_match('/[А-Я]/u', $wordArray[0]);
                $resultWord = mb_str_split($wordArray[0]);
                $resultWord = array_reverse($resultWord);
                $resultWord = implode($resultWord);
                $resultWord = ($hasUpperCase) ? $this->ucWord(mb_strtolower($resultWord)) : $resultWord;
                $resultWord = (!empty($wordArray[1])) ? $resultWord . $wordArray[1] : $resultWord;
                $resultArray[$index] = $resultWord;
            }
        }

        return implode(" ", $resultArray);
    }

    public function ucWord($text) {
        $text = mb_convert_case($text, MB_CASE_TITLE);
        return $text;
    }

}