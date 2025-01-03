<?php

namespace BrainGames\Games;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\greeting;
use function BrainGames\Engine\task;
use function BrainGames\Engine\gameProcess;

function evenIteration()
{
    $randNumber = rand(0, 100);
    line("Question: %d", $randNumber);
    $answer = prompt("Your answer");
    if ((($randNumber % 2 === 0) and ($answer === "yes")) or (($randNumber % 2 !== 0) and ($answer === "no"))) {
        return "Right!";
    } else {
        line("'yes' is wrong answer ;(. Correct answer was 'no'.");
        return "Mistake";
    }
}

function even()
{
    greeting();
    task('Answer "yes" if the number is even, otherwise answer "no".');
    gameProcess('evenIteration');
}
