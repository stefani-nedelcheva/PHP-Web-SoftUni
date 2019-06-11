<?php

function isPalindrome($str) {
    for ($i = 0; $i < strlen($str) / 2; $i++) {
        $current = $str[$i];
        $last = $str[strlen($str) - 1 - $i];
        if ($current != $last) {
            return var_export(false);
        }
    }
    return var_export(true);
}

echo boolval(isPalindrome('abba'));
