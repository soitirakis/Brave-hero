<?php
//include("classes.php");
include("variables.php");

function attackFirst($erou, $badass){
  echo "Eroul ataca!";
  //check for the oponent luck
  if($badass->checkTodaysLuck()){
    echo "Sorry. Oponentul a castigat runda asta! A fost norocos de data asta!";
    $tura++;
    //break;
  //else check the usage of super powers
  }elseif ($erou->checkForDragon()) {
    $erou_putere = $erou->forta_dragonului();
    $damage = $erou_putere - $badass->aparare;
    echo "Runda asta ai folosit forta dragonului! Felicitari!";
    //check the damage;
    $damage = checkDamage($damage);
    echo "Damage: ".$damage;
  }else{
    $damage = $erou->putere - $badass->aparare;
    $damage = checkDamage($damage);
    echo "Damage: ".$damage;
  }
  //update life level
  $erou_life = $erou->viata;
  $badass_life = $badass->viata - $damage;
  $erou = new SuperErou($erou_life, $erou_powers, $erou_super_powers);
  $badass = new Erou($badass_life, $badass_powers);
  $tura++;
}

 ?>
