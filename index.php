<?php

include("elevator.php");
include("human.php");


$newElevator = new elevator();

$newMan = new human(7, 1);
$oneWoman = new human(7, 8);
$twoWoman = new human(7, 3);
$threeWoman = new human(7, 9);

$newElevator->callElevator($newMan);

$newElevator->pushTheButton($newMan);
$newElevator->pushTheButton($oneWoman);
$newElevator->pushTheButton($twoWoman);
$newElevator->pushTheButton($threeWoman);

$newElevator->run();

//-----
echo "<hr>";
$newElevator = new elevator();

$secondMan = new human(1, 5);
$firstWoman = new human(1, 8);
$secondWoman = new human(1, 3);
$thirdWoman = new human(1, 9);

$newElevator->callElevator($secondMan);

$newElevator->pushTheButton($secondMan);
$newElevator->pushTheButton($firstWoman);
$newElevator->pushTheButton($secondWoman);
$newElevator->pushTheButton($thirdWoman);

$newElevator->run();


