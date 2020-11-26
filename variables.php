<?php
//Carl
$Carl_name = "Carl";
$Carl_life = rand(65,95);
$Carl_power = rand(60,70);
$Carl_defence = rand(40,50);
$Carl_speed = rand(40,50);
$Carl_luck = [10,30];
$Carl_luck_range = rand(0,100);

$Carl_powers = [$Carl_power, $Carl_defence, $Carl_speed, $Carl_luck, $Carl_luck_range];
$Carl_power_array = [60,70,40,50,40,50,10,30];

//Carl extra powers
$Carl_forta_dragonului = rand(0,100);
$Carl_forta_dragonului_luck = 10; //set the probaility to use this power 10%
$Carl_scutul_fermecat = rand(0,100);
$Carl_scutul_fermecat_luck = 20; //set the probability to use this power 20%
$Carl_super_powers = [$Carl_forta_dragonului, $Carl_scutul_fermecat,$Carl_forta_dragonului_luck, $Carl_scutul_fermecat_luck ];

//Villain
$Villain_name = "Villain";
$Villain_life = rand(55,80);
$Villain_power = rand(50,80);
$Villain_defence = rand(35,55);
$Villain_speed = rand(40,60);
$Villain_luck = [25,40];
$Villain_luck_range = rand(0,100);

$Villain_powers = [$Villain_power, $Villain_defence, $Villain_speed, $Villain_luck, $Villain_luck_range];
$Villain_power_array = [50,80,35,55,40,60,25,40];


?>
