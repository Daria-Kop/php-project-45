<?php

namespace App\Games\Calc;

use function BrainGames\Engine\runGame;
use const BrainGames\Engine\MIN_RANDOM_NUMBER;
use const BrainGames\Engine\MAX_RANDOM_NUMBER;

function runCalc()
{
    $rules = 'What is the result of the expression?';
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

    runGame($rules, $getQuestion);
}

function calculate(int $num1, int $num2, string $operator)
{
    switch ($operator) {
        case '+':
            return $num1 + $num2;
        case '-':
            return $num1 - $num2;
        case '*':
            return $num1 * $num2;
        default:
            break;
    }
}
