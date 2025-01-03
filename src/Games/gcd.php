<?php

namespace BrainGames\Games;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\greeting;
use function BrainGames\Engine\task;
use function BrainGames\Engine\gameProcess;

function gcdCalculating(int $num1, int $num2)
{
    $smallerValue = min($num1, $num2);
    while (true) {
        if ((($num1 % $smallerValue) === 0) and (($num2 % $smallerValue) === 0)) {
            return $smallerValue;
        }
        $smallerValue--;
    }
}

function gcdIteration()
{
    $randNumber1 = rand(1, 100);
    $randNumber2 = rand(1, 100);
    $rightAnswer = gcdCalculating($randNumber1, $randNumber2);
    line("Question: %d %d", $randNumber1, $randNumber2);
    $answer = prompt("Your answer");
    if ($answer == $rightAnswer) {
        return "Right!";
    } else {
        line("'%d' is wrong answer ;(. Correct answer was '%d'.", $answer, $rightAnswer);
        return "Mistake";
    }
}

function gcd()
{
    greeting();
    task('Find the greatest common divisor of given numbers.');
    gameProcess('gcdIteration');
}
