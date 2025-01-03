<?php

namespace BrainGames\Games;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\greeting;
use function BrainGames\Engine\task;
use function BrainGames\Engine\gameProcess;

function progressionIteration()
{
    $progFirstValue = rand(0, 20);
    $progIncrement = rand(1, 30);
    $progArray = array_slice((range($progFirstValue, 1000, $progIncrement)), 0, 10);
    $progHiddenElementIndex = rand(0, 9);
    $rightAnswer = $progArray[$progHiddenElementIndex];
    $progArray[$progHiddenElementIndex] = '..';
    line("Question: %s %s %s %s %s %s %s %s %s %s", ...$progArray);
    $answer = prompt("Your answer");
    if ($answer == $rightAnswer) {
        return "Right!";
    } else {
        line("'%s' is wrong answer ;(. Correct answer was '%d'.", $answer, $rightAnswer);
        return "Mistake";
    }
}

function progression()
{
    greeting();
    task('What number is missing in the progression?');
    gameProcess('progressionIteration');
}
