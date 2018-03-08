<?php

require './vendor/autoload.php';

use CS\Application\Mower;
use CS\Domain\Model\Lawn;
use CS\Domain\Model\Position;

if (count($argv) < 3) {
    echo "You've to provide and existing input file and an output file to show the final positions of the mowers\n";
    echo "Example: php application.php input.txt output_1.txt\n";
    exit(-1);
};

$inputFileName = $argv[1];
$outputFileName = $argv[2];

$file_input_handle = fopen($inputFileName, "r");

if (!$file_input_handle) {
    echo sprintf("Unknow %s file\n", $argv[1]);
    echo "Please provide another valid input file\n";
    exit(-1);
}

$file_output_handle = fopen($outputFileName, "w");
$lawnSize = fgets($file_input_handle);
$size = explode(' ', $lawnSize);
$lawn = new Lawn(new Position((int)$size[0], (int)$size[1]));

while (!feof($file_input_handle)) {
    $initialPositionString = fgets($file_input_handle);
    $instructionsString = fgets($file_input_handle);

    if (false !== $initialPositionString && false !== $instructionsString) {
        $initialPosition = explode(' ', trim($initialPositionString));
        $instructions = str_split(trim($instructionsString));

        $mower = new Mower($initialPosition[0], $initialPosition[1], $initialPosition[2], $lawn);
        $finalePosition = $mower->applyInstructions($instructions);
        fwrite($file_output_handle, $finalePosition . "\n");
    }
}

fclose($file_input_handle);
fclose($file_output_handle);
