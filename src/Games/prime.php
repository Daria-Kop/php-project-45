<?php

namespace BrainGames\Games;

use function cli\line;
use function cli\prompt;
use function BrainGames\Engine\greeting;
use function BrainGames\Engine\task;
use function BrainGames\Engine\gameProcess;

function isPrime(int $num)
{
    for ($i = 2; $i <= sqrt($num); $i++) {
        if (($num % $i) === 0) {
            return 'no';
        }
    }
    return 'yes';
}

function primeIteration()
{
    $randNumber = rand(2, 100);
    $rightAnswer = isPrime($randNumber);
    line("Question: %d", $randNumber);
    $answer = prompt("Your answer");
    if ($answer == $rightAnswer) {
        return "Right!";
    } else {
        line("'%s' is wrong answer ;(. Correct answer was '%s'.", $answer, $rightAnswer);
        return "Mistake";
    }
}

function prime()
{
    greeting();
    task('Answer "yes" if given number is prime. Otherwise answer "no".');
    gameProcess("primeIteration");
}
