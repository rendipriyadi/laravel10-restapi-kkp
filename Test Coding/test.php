<?php

function is_prime($num)
{
    if ($num < 2) {
        return false;
    }
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}

function is_odd($num)
{
    return $num % 2 != 0;
}

function fizz_buzz($num)
{
    if (is_prime($num)) {
        return "fizzbuzz";
    } elseif (is_odd($num)) {
        return "fizz";
    } else {
        return "buzz";
    }
}

echo fizz_buzz(3);   // output: fizz
echo fizz_buzz(4);   // output: buzz
echo fizz_buzz(7);   // output: fizzbuzz