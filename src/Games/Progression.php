<?php

namespace App\Games\Progression;

use function BrainGames\Engine\runGame;

use const BrainGames\Engine\MIN_RANDOM_NUMBER;
use const BrainGames\Engine\MAX_RANDOM_NUMBER;

const MIN_PROGRESSION_STEP = 2;
const MAX_PROGRESSION_STEP = 10;
const PROGRESSION_SIZE = 10;
const PROGRESSION_END = 150;
const ARRAY_KEY = 0;

const RULES = 'What number is missing in the progression?';

function runProgression(): void
{
    $getQuestion = function () {
        $array = getProgression();
        $randIndex = array_rand($array);
        $correctAnswer = (string) $array[$randIndex];
        $array[$randIndex] = '..';
        $question = implode(' ', $array);

        return [$question, $correctAnswer];
    };

    runGame(RULES, $getQuestion);
}

function getProgression(): array
{
    $progressionStart = mt_rand(MIN_RANDOM_NUMBER, MAX_RANDOM_NUMBER);
    $progressionStep = mt_rand(MIN_PROGRESSION_STEP, MAX_PROGRESSION_STEP);
    $progressionFull = range($progressionStart, PROGRESSION_END, $progressionStep);
    $progression = array_slice($progressionFull, ARRAY_KEY, PROGRESSION_SIZE);

    return $progression;
}
