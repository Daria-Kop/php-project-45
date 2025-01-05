<?php

namespace BrainGames\Engine;

use function cli\line;
use function cli\prompt;

function greeting(): string
{
    line('Welcome to the Brain Games!');
    $name = prompt('May I have your name?');
    line("Hello, %s!", $name);
    
    return $name;
}

function task(string $text)
{
    line($text);
}

function gameProcess(string $gameName, string $name) 
{
    $result = '';
    for ($rightAnswerCount = 1; $rightAnswerCount < 4; $rightAnswerCount++) {
        if (is_callable('BrainGames\Games\\' . $gameName)) {
            $result = call_user_func('BrainGames\Games\\' . $gameName);
        }
        if ($result === "Mistake") {
            line('Let\'s try again, %s!', $name);
            break;
        }
        line('Correct!');
        if ($rightAnswerCount === 3) {
            line('Congratulations, %s!', $name);
        }
    }
}
