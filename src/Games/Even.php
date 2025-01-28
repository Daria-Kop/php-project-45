<?php

namespace App\Games\Even;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\MIN_RANDOM_NUMBER;
use const BrainGames\Engine\MAX_RANDOM_NUMBER;

const RULES = 'Answer "yes" if the number is even, otherwise answer "no".';

function runEven(): void
{
    $getQuestion = function () {
        $question = mt_rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);
        $correctAnswer = isEven($question) ? 'yes' : 'no';

        return [$question, $correctAnswer];
    };

    runGame(RULES, $getQuestion);
}

function isEven(int $number): bool
{
    return $number % 2 === 0;
}
