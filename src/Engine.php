<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

const COUNT_QUESTIONS = 3;
const MIN_RANDOM_NUMBER = 1;
const MAX_RANDOM_NUMBER = 15;

function runGame(string $rules, callable $getQuestion): void
{
    line('Welcome to the Brain Games!');
    $userName = prompt('May I have your name?');
    line("Hello, {$userName}!");
    line($rules);

    for ($i = 1; $i <= COUNT_QUESTIONS; $i++) {
        [$question, $correctAnswer] = $getQuestion();
        line("Question: {$question}");
        $answer = mb_strtolower(prompt('Your answer'));


        if ($correctAnswer === $answer) {
            line('Correct!');
            continue;
        }

        $isWrong = "'%s' is wrong answer ;(. Correct answer was '%s'.\n";
        $tryAgain = "Let's try again, %s!\n";
        line(sprintf($isWrong, $answer, $correctAnswer));
        line(sprintf($tryAgain, $userName));
        return;
    }

    line("Congratulations, {$userName}!");
}
