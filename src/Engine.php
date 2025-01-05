<?php

namespace BrainGames\Engine;

function welcome()
{
    print_r("Welcome to the Brain Games!\n");
}

function userCanQuestAns(string $userName, string $trueAns)
{
    $userAns = readline("Your answer: ");
    if ($userAns === $trueAns) {
        print_r("Correct!\n");
        return true;
    } else {
        print_r("'{$userAns}' is wrong answer ;(. Correct answer was '{$trueAns}'.\n");
        print_r("Let's try again, {$userName}!\n");
        return false;
    }
}

function congratulations(string $userName)
{
    echo "Congratulations, {$userName}!\n";
}

function roundQuest(string $str)
{
    echo "Question: {$str}\n";
}

function printQuestList(array $list)
{
    echo "Question:";
    foreach ($list as $i) {
        echo " {$i}";
    }
    echo "\n";
}

function calcQuest()
{
    echo "What is the result of the expression?\n";
}

function evenQuest()
{
    echo 'Answer "yes" if the number is even, otherwise answer "no".';
    echo "\n";
}

function gcdQuest()
{
    echo "Find the greatest common divisor of given numbers.\n";
}

function progressionQuest()
{
    echo "What number is missing in the progression?\n";
}
