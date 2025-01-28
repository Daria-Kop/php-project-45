<?php

namespace App\Games\Gcd;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\MIN_RANDOM_NUMBER;
use const BrainGames\Engine\MAX_RANDOM_NUMBER;

const RULES = 'Find the greatest common divisor of given numbers.';

function runGcd(): void
{
    $getQuestion = function () {
        $randOne = mt_rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);
        $randTwo = mt_rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);
        $question = "$randOne $randTwo";
        $correctAnswer = (string) getGcd($randOne, $randTwo);

        return [$question, $correctAnswer];
    };

    runGame(RULES, $getQuestion);
}

function getGcd(int $num1, int $num2): int
{
    while ($num2 !== 0) {
        $temp = $num1 % $num2;
        $num1 = $num2;
        $num2 = $temp;
    }

    return $num1;
}
