<?php

namespace App\Games\Gcd;

use function App\Engine\runGame;

use const App\Engine\MIN_RANDOM_NUMBER;
use const App\Engine\MAX_RANDOM_NUMBER;

function getGcd(int $num1, int $num2): int
{
    while ($num2 !== 0) {
        $temp = $num1 % $num2;
        $num1 = $num2;
        $num2 = $temp;
    }

    return $num1;
}

function runGcd()
{
    $rules = 'Find the greatest common divisor of given numbers.';
    $getQuestion = function () {
        $randOne = mt_rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);
        $randTwo = mt_rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);
        $question = "$randOne $randTwo";
        $correctAnswer = (string) getGcd($randOne, $randTwo);

        return [$question, $correctAnswer];
    };

    runGame($rules, $getQuestion);
}
