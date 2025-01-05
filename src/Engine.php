<?php

namespace BrainGames;

use function cli\line;
use function cli\prompt;

const ITERATIONS_COUNT = 3;

function runEngine($getRightAnswerForRound, $question)
{
    line('Welcome to the Brain Game!');
    line($question);
    $name = prompt('May I have your name?');
    line('Hello, %s!', $name);

    for ($i = 0; $i < ITERATIONS_COUNT; $i++) {
        ['roundQuestion' => $roundQuestion, 'rightAnswer' => $rightAnswer] = $getRightAnswerForRound();
        
        line("Question: {$roundQuestion}");
        $answerUser = prompt('Your answer');
        
        if ($answerUser == $rightAnswer) {
            line('Correct!');
        } else {
            line("{$answerUser}  is wrong answer ;(. Correct answer was {$rightAnswer}");
            line("Let's try again, {$name}!");
            return;
        }
    }
    
    line("Congratulations, {$name}!");
    return;
}
