<?php

namespace App\Games\Calc;

use function BrainGames\Engine\runGame;
use const BrainGames\Engine\MIN_RANDOM_NUMBER;
use const BrainGames\Engine\MAX_RANDOM_NUMBER;

const RULES = 'What is the result of the expression?';

function runCalc(): void
{
    $getQuestion = function () {
        $operators = ['+', '-', '*'];
        $randOne = mt_rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);
        $randTwo = mt_rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);
        $key = array_rand($operators);
        $randOperator = $operators[$key];
        $question = "$randOne $randOperator $randTwo";
        $correctAnswer = (string) calculate($randOne, $randTwo, $randOperator);

        return [$question, $correctAnswer];
    };

    runGame(RULES, $getQuestion);
}

function calculate(int $num1, int $num2, string $operator): int
{
    switch ($operator) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
        default:
            return 0;
    }
}
