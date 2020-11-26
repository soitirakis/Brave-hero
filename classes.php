<?php
//the easy way
include('variables.php');
//include("lupta.php");
//include("clase2.php");

class Erou{
  public $nume;
  public $viata;
  public $putere;
  public $aparare;
  public $viteza;
  public $noroc_range_min;
  public $noroc_range_max;
  public $today_lucky;

  function __construct( $viata, $array_of_powers){
    $this->nume = $nume;
    $this->viata = $viata;
    $this->putere = $array_of_powers[0]; //set the power according to the range
    $this->aparare = $array_of_powers[1]; //set the power according to the range
    $this->viteza = $array_of_powers[2]; //set the speed
    $this->noroc_range_min = $array_of_powers[3][0]; //set the interval of luck min value
    $this->noroc_range_max = $array_of_powers[3][1]; //set the interval of luck max value
    $this->noroc_range = $array_of_powers[4]; //set todays luck
    $this->today_lucky = false;
  }
  function checkTodaysLuck(){
    if(in_array($this->noroc_range, range($this->noroc_range_min, $this->noroc_range_max)) ){
      $this->today_lucky = true;
    }
    return $this->today_lucky;
  }

  function detalii(){
    echo "<strong>{$this->nume} </strong> "."</br>";
    echo "<strong>Viata:</strong> {$this->viata}"."</br>";
    echo "Putere: {$this->putere}"."</br>";
    echo "Aparare: {$this->aparare}"."</br>";
    echo "Viteza: {$this->viteza}"."</br>";
    echo "Noroc: {$this->noroc_range}"."</br></br>";
  }

  function resetPowers($array_of_powers){
    return $array_of_powers[0];
  }
}

class SuperErou extends Erou{
  public $forta_dragonului_usage;
  public $scutul_fermecat_usage;
  public $forta_dragonului_luck; //set the probability of usage of power (Carl: 10%)
  public $scutul_fermecat_luck; //set the probability of usage of power (Carl: 20%)
  public $use_dragon;
  public $use_shield;

  function __construct( $nume, $viata, $array_of_powers, $super_powers){
    parent::__construct($nume, $viata, $array_of_powers);
    $this->forta_dragonului_usage = $super_powers[0];
    $this->scutul_fermecat_usage = $super_powers[1];
    $this->forta_dragonului_luck = $super_powers[2];
    $this->scutul_fermecat_luck = $super_powers[3];
    $this->use_dragon = false;
    $this->use_shield = false;
  }

  //check probaility to use forta dragonului 10%
  function checkForDragon(){
    if($this->forta_dragonului_usage < $this->forta_dragonului_luck){
      $this->use_dragon = true;
    }
    return $this->use_dragon;
  }

  //use forta dragonului
  function forta_dragonului(){
    return $this->putere *= 2;
  }

  //check to use scutul fermecat 20%
  function checkForShield(){
    if($this->scutul_fermecat_usage < $this->scutul_fermecat_luck){
      $this->use_shield = true;
    }
    return $this->use_shield;
  }

  //use scutul fermecat
  function scutul_fermecat($adversary_power){
    return $adversary_power / 2;
  }
}

$Carl = new SuperErou($Carl_name, $Carl_life, $Carl_powers, $Carl_super_powers);
$Villain = new Erou($Villain_name, $Villain_life, $Villain_powers);


function lupta($erou, $badass, $array_erou, $array_badass, $array_superpowers){
  //generate the values for the erou rand() powers
  $i = 1;
  foreach($array_erou as $value){
    $x = 'value'.$i;
    $$x = $value;
    $i++;
  }
  //generate the values for the badass rand() powers
  $j = 1;
  foreach($array_badass as $val){
    $y = 'val'.$j;
    $$y = $val;
    $j++;
  }
  //generate super powers
  $k = 1;
  foreach($array_superpowers as $v){
    $z = 'v'.$k;
    $$z = $v;
    $k++;
  }
  
  $tura = 1;
  //check for someone to be alive and round not 20
  while($erou->viata > 0 && $badass->viata > 0 && $tura <= 20) {
    $erou_powers = [rand($value1,$value2), rand($value3,$value4),rand($value5,$value6), $value7,$value8,rand(0,100)];
    $badass_powers = [rand($val1,$val2), rand($val3,$val4),rand($val5,$val6), $val7,$val8,rand(0,100)];
    $erou_super_powers = [rand(0,100),rand(0,100), $v1,$v2];
    ?>
    <div class="col-sm-4">
     <div class='card' style="width: 18rem;">
       <div class="card-body">
    <?php
    echo "<h5 class='card-title'>Tura: {$tura}</h5>"."</br>";
    echo $erou->detalii();
    echo $badass->detalii();
    $damage = null;
    //check for speed
    if($erou->viteza > $badass->viteza){
    //  attackFirst($erou, $badass);
      echo "Eroul ataca!</br>";
      //check for the oponent luck
      if($badass->checkTodaysLuck()){
        echo "Sorry. Oponentul a castigat runda asta! A fost norocos de data asta!</br>";
        $tura++;
        //break;
      //else check the usage of super powers
      }elseif ($erou->checkForDragon()) {
        $erou_putere = $erou->forta_dragonului();
        $damage = $erou_putere - $badass->aparare;
        echo "Runda asta ai folosit forta dragonului! Felicitari!</br>";
        //check the damage;
        $damage = checkDamage($damage);
        echo "Damage: ".$damage."</br>";
      }else{
        $damage = $erou->putere - $badass->aparare;
        $damage = checkDamage($damage);
        echo "Damage: ".$damage."</br>";
      }
      //update life level
      $erou_life = $erou->viata;
      $badass_life = $badass->viata - $damage;

      $erou = new SuperErou($erou->nume, $erou_life, $erou_powers, $erou_super_powers);
      $badass = new Erou($badass->nume, $badass_life, $badass_powers);
      $tura++;
    }elseif ($erou->viteza < $badass->viteza) {
      echo "Cel rau ataca! </br>";
      //check the oponent for luck
      if($erou->checkTodaysLuck()){
        echo "Uhuu. Ai castigat runda asta! Norocul a fost de partea ta </br>";
        //cheack the usage of super powers
      }elseif ($erou->checkForShield()) {
        //echo "da, shield";
        $putere_adversa = $erou->scutul_fermecat($badass->putere);
        $damage = $putere_adversa - $erou->aparare;
        echo "Runda asta ai folosit scutul ! Felicitari! </br>";
        $damage = checkDamage($damage);
        echo "Damage: ".$damage."</br>";
      }else{
        $damage = $badass->putere - $erou->aparare;
        $damage = checkDamage($damage);
        echo "Damage: ".$damage."</br>";
      }
      $erou_life = $erou->viata - $damage;
      $badass_life = $badass->viata;
      $erou = new SuperErou($erou->nume, $erou_life, $erou_powers, $erou_super_powers);
      $badass = new Erou($badss->nume, $badass_life, $badass_powers);
      $tura++;
    }else {
      echo "UUU. Viteze egale! Sa vedem cine e mai bun!</br>";
      //check the level of luck
      if($erou->noroc_range > $badass->noroc_range) {
        echo "Buna treaba! Azi esti mai norocos, ataci primul</br>";
    //    attackFirst($erou, $badass);
        //check the oponent luck
        if($badass->checkTodaysLuck()){
          echo "Sorry. Oponentul a castigat runda asta! A fost norocos de data asta!</br>";
        //else check the usage of super powers
        }elseif ($erou->checkForDragon()) {
          $erou_putere = $erou->forta_dragonului();
          $damage = $erou_putere - $badass->aparare;
          echo "Runda asta ai folosit forta dragonului, ti-ai dublat puterea! Felicitari! </br>";
          //check the damage;
          $damage = checkDamage($damage);
          echo "Damage: ".$damage."</br>";
        }else{
          $damage = $erou->putere - $badass->aparare;
          $damage = checkDamage($damage);
          echo "Damage: ".$damage."</br>";
        }
        //update life level
        $erou_life = $erou->viata;
        $badass_life = $badass->viata - $damage;
        $erou = new SuperErou($erou->nume, $erou_life, $erou_powers, $erou_super_powers);
        $badass = new Erou($badass->nume, $badass_life, $badass_powers);
        $tura++;
      }else{
        echo "Cel rau ataca! </br>";
        //check the oponent for luck
        if($erou->checkTodaysLuck()){
          echo "Uhuu. Ai castigat runda asta! Norocul a fost de partea ta</br>";
          $tura++;
        //  break;
          //cheack the usage of super powers
        }elseif ($erou->checkForShield()) {
          //echo "da, shield";
          $putere_adversa = $erou->scutul_fermecat($badass->putere);
          $damage = $putere_adversa - $erou->aparare;
          echo "Runda asta ai folosit scutul ! Felicitari! </br>";
          $damage = checkDamage($damage);
          echo "Damage: ".$damage."</br>";
        }else{
          $damage = $badass->putere - $erou->aparare;
          $damage = checkDamage($damage);
          echo "Damage: ".$damage."</br>";
        }
        $erou_life = $erou->viata - $damage;
        $badass_life = $badass->viata;
        $erou = new SuperErou($erou->nume, $erou_life, $erou_powers, $erou_super_powers);
        $badass = new Erou($badass->nume, $badass_life, $badass_powers);
        $tura++;
      }
    }
    ?>
  </div>
     </div>
   </div>
     <?php
  }
  if($tura == 20){
    echo "<h5 class='col-12 text-center p-2'><strong>Game over! Limita de {$tura} de runde a fost atinsa!</strong></h5>";
  }
  if($erou->viata <= 0 ){
    echo "<h5 class='col-12 text-center p-2'><strong>Game over! Oponentul a castigat!</strong></h5>";
  }
  if($badass->viata <= 0){
    echo "<h5 class='col-12 text-center p-2'><strong>Game over! Ai castigat!</strong></h5>";
  }
}
lupta($Carl,$Villain, $Carl_power_array, $Villain_power_array, $Carl_super_powers);

function checkDamage($damage){
  if($damage < 0){
    $result = 0;
  }elseif ($damage > 100) {
    $result = 100;
  }else{
    $result = $damage;
  }
  //echo "result:".$result;
  return $result;
}

?>
