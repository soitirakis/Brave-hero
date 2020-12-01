<?php
include("clase2.php");


function fight($erou, $badass){

  $erou_powers = $erou->getPowers();
  $badass_powers = $badass->getPowers();
  $tura = 1;
  //check for someone to be alive and round not 20
  while($erou_powers["viata"] > 0 && $badass_powers["viata"] > 0 && $tura < 20) {
    $erou_powers = $erou->getPowers();
    $badass_powers = $badass->getPowers();
    ?>
    <div class="col-sm-4">
     <div class='card' style="width: 18rem;">
       <div class="card-body">
    <?php
    echo $tura;
    var_dump($erou_powers);
    var_dump($badass_powers);

    //check for speed
    if($erou_powers["viteza"] > $badass_powers["viteza"]){
      HeroAttack($erou, $badass);
    }elseif($erou_powers["viteza"] < $badass_powers["viteza"]){
      VillainAttack($erou, $badass);
    }else {
      echo "UUU. Viteze egale! Sa vedem cine e mai bun!</br>";
      //check the level of luck
      if($erou_powers[0] > $badass_powers[0]){
        echo "Buna treaba! Azi esti mai norocos, ataci primul</br>";
        HeroAttack($erou, $badass);
        //
      }else{
        echo "Cel rau ataca! </br>";
        VillainAttack($erou, $badass);
      }
    }
    $tura++;
    ?>
  </div>
     </div>
   </div>
     <?php
  }
  if($tura == 20){
    echo "<h5 class='col-12 text-center p-2'><strong>Game over! Limita de {$tura} de runde a fost atinsa!</strong></h5>";
  }
  if($erou_powers["viata"] <= 0 ){
    echo "<h5 class='col-12 text-center p-2'><strong>Game over! Oponentul a castigat!</strong></h5>";
  }
  if($badass_powers["viata"] <= 0){
    echo "<h5 class='col-12 text-center p-2'><strong>Game over! Ai castigat!</strong></h5>";
  }
}

fight($Carl, $Villain);

function HeroAttack($erou, $badass){
  $erou_powers = $erou->getPowers();
  $badass_powers = $badass->getPowers();
  echo "Eroul ataca!</br>";
  $damage = null;
  //check for the oponent luck
  if($badass->checkTodaysLuck()){
    echo "Sorry. Oponentul a castigat runda asta! A fost norocos de data asta!</br>";
  //else check the usage of super powers
  }elseif ($erou->checkForDragon()) {
    $erou_putere = $erou->forta_dragonului();
    $damage = $erou_putere - $badass_powers["aparare"];
    echo "Runda asta ai folosit forta dragonului! Felicitari!</br>";
    //check the damage;
    $damage = checkDamage($damage);
    echo "Damage: ".$damage."</br>";
  }else{
    $damage = $erou_powers["putere"] - $badass_powers["aparare"];
    $damage = checkDamage($damage);
    echo "Damage: ".$damage."</br>";
  }
  //update life level
  $erou_life = $erou_powers["viata"];
  $badass_life = $badass_powers["viata"] - $damage;
  if($badass_life <= 0){
    $badass_life = 0;
  }
  $erou->setViata($erou_life);
  $badass->setViata($badass_life);
  $erou->resetPowers();
  $badass->resetPowers();
}

function VillainAttack($erou, $badass){
  $erou_powers = $erou->getPowers();
  $badass_powers = $badass->getPowers();
  $damage = null;
  echo "Cel rau ataca! </br>";
  //check the oponent for luck
  if($erou->checkTodaysLuck()){
    echo "Uhuu. Ai castigat runda asta! Norocul a fost de partea ta </br>";
    //cheack the usage of super powers
  }elseif ($erou->checkForShield()) {
    //echo "da, shield";
    $putere_adversa = $erou->scutul_fermecat($badass_powers["putere"]);
    $damage = $putere_adversa - $erou_powers["aparare"];
    echo "Runda asta ai folosit scutul ! Felicitari! </br>";
    $damage = checkDamage($damage);
    echo "Damage: ".$damage."</br>";
  }else{
    $damage = $badass_powers["putere"] - $erou_powers["aparare"];
    $damage = checkDamage($damage);
    echo "Damage: ".$damage."</br>";
  }
  $erou_life = $erou_powers["viata"] - $damage;
  $badass_life = $badass_powers["viata"];
  if($erou_life <= 0){
    $erou_life = 0;
  }
  $erou->setViata($erou_life);
  $badass->setViata($badass_life);
  $erou->resetPowers();
  $badass->resetPowers();
}

function checkDamage($damage){
  if($damage < 0){
    $result = 0;
  }elseif ($damage > 100) {
    $result = 100;
  }else{
    $result = $damage;
  }
  return $result;
}
?>
