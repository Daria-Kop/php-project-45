<?php

namespace App\Games\Prime;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\MIN_RANDOM_NUMBER;
use const BrainGames\Engine\MAX_RANDOM_NUMBER;

const RULES = 'Answer "yes" if given number is prime. Otherwise answer "no".';

function runPrime(): void
{
    $getQuestion = function () {
        $question = mt_rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);
        $correctAnswer = isPrime($question) ? 'yes' : 'no';

        return [$question, $correctAnswer];
    };

    runGame(RULES, $getQuestion);
}

function isPrime(int $number): bool
{
    if ($number < 2) {
        return false;
    }

    for ($i = 2; $i <= $number / 2; $i++) {
        if ($number % $i === 0) {
            return false;
        }
    }

    return true;
}
