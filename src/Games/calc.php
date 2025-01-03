<?php

namespace BrainGames\Games;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\greeting;
use function BrainGames\Engine\task;
use function BrainGames\Engine\gameProcess;

function calcIteration()
{
    $randNumber1 = rand(0, 10);
    $randNumber2 = rand(0, 10);
    $randSignIndex = rand(1, 3);
    $randSign = '';
    $rightAnswer = '';
    switch ($randSignIndex) {
        case 1:
            $randSign = '+';
            $rightAnswer = $randNumber1 + $randNumber2;
            break;
        case 2:
            $randSign = '-';
            $rightAnswer = $randNumber1 - $randNumber2;
            break;
        case 3:
            $randSign = '*';
            $rightAnswer = $randNumber1 * $randNumber2;
            break;
    }
    line("Question: %d %s %d", $randNumber1, $randSign, $randNumber2);
    $answer = prompt("Your answer");
    if ($answer == $rightAnswer) {
        return "Right!";
    } else {
        line("'%d' is wrong answer ;(. Correct answer was '%d'.", $answer, $rightAnswer);
        return "Mistake";
    }
}

function calc()
{
    greeting();
    task('What is the result of the expression?');
    gameProcess('calcIteration');
}
