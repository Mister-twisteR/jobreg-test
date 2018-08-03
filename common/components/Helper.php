<?php

namespace common\components;


class Helper
{
    public static function isset_func(&$var, $return_value = false, $var_in_arr = null) {

        if (isset($var)) {
            if (is_array($var)) {
                if ($return_value) {
                    return (count($var) && in_array($var_in_arr, $var)) ? $return_value : null;
                } else {
                    return count($var) ? $var : null;
                }
            } else {
                if ($return_value) {
                    return $var ? $return_value : null;
                } else {
                    return $var ?: null;
                }
            }
        }

        return null;
    }

    public static function check_active(&$var, $return_value = 'active', $var_in_arr = null) {
        if (isset($var)) {
            if (is_array($var)) {
                    return (count($var) && in_array($var_in_arr, $var)) ? $return_value : null;
            } else {
                return $var == $var_in_arr ? $return_value : null;
            }
        }

        return null;
    }

    public static function numbers_decline($num, $titles) {
        $cases = array(2, 0, 1, 1, 1, 2);

        return $num . " " . $titles[($num % 100 > 4 && $num % 100 < 20) ? 2 : $cases[min($num % 10, 5)]];
    }

    public static function excerpt($text, $max_length = 140, $cut_off = '...', $keep_word = true)
    {
        if (strlen($text) <= $max_length) {
            return strip_tags($text);
        }

        if (strlen($text) > $max_length) {
            if ($keep_word) {
                $text = substr($text, 0, $max_length + 1);

                if ($last_space = strrpos($text, ' ')) {
                    $text = substr($text, 0, $last_space);
                    $text = rtrim($text);
                    $text .= $cut_off;
                }
            } else {
                $text = substr($text, 0, $max_length);
                $text = rtrim($text);
                $text .= $cut_off;
            }
        }

        return strip_tags($text);
    }

    public static function rus2translit($string)
    {
        $converter = array(
            'а' => 'a', 'б' => 'b', 'в' => 'v',
            'г' => 'g', 'д' => 'd', 'е' => 'e',
            'ё' => 'e', 'ж' => 'zh', 'з' => 'z',
            'и' => 'i', 'й' => 'y', 'к' => 'k',
            'л' => 'l', 'м' => 'm', 'н' => 'n',
            'о' => 'o', 'п' => 'p', 'р' => 'r',
            'с' => 's', 'т' => 't', 'у' => 'u',
            'ф' => 'f', 'х' => 'h', 'ц' => 'c',
            'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sch',
            'ь' => '\'', 'ы' => 'y', 'ъ' => '\'',
            'э' => 'e', 'ю' => 'yu', 'я' => 'ya', 'і' => 'i',

            'А' => 'A', 'Б' => 'B', 'В' => 'V',
            'Г' => 'G', 'Д' => 'D', 'Е' => 'E',
            'Ё' => 'E', 'Ж' => 'Zh', 'З' => 'Z',
            'И' => 'I', 'Й' => 'Y', 'К' => 'K',
            'Л' => 'L', 'М' => 'M', 'Н' => 'N',
            'О' => 'O', 'П' => 'P', 'Р' => 'R',
            'С' => 'S', 'Т' => 'T', 'У' => 'U',
            'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
            'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sch',
            'Ь' => '\'', 'Ы' => 'Y', 'Ъ' => '\'',
            'Э' => 'E', 'Ю' => 'Yu', 'Я' => 'Ya', 'І' => 'i',
        );
        return strtr($string, $converter);
    }

    public static function str2url($str)
    {
        // переводим в транслит
        $str = self::rus2translit($str);
        // в нижний регистр
        $str = strtolower($str);
        // заменям все ненужное нам на "-"
        $str = preg_replace('~[^-a-z0-9_]+~u', '-', $str);
        // удаляем начальные и конечные '-'
        $str = trim($str, "-");
        return $str;
    }
}