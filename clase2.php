<?php
include("variables2.php");

class Hero{
  protected $viata;
  protected $nume;
  protected $putere;
  protected $aparare;
  protected $viteza;
  protected $noroc;
  protected $noroc_range;
  protected $today_lucky;
  protected $x;

  function __construct($viata, $array_of_powers){
    $i = 1;
    foreach($array_of_powers as $value){
      $x = 'value'.$i;
      $this->{$x} = $value;
      $i++;
    }
      $this->viata = $viata;
      $this->nume = $this->value1;
      $this->putere = rand($this->value2,$this->value3);
      $this->aparare = rand($this->value4,$this->value5);
      $this->viteza = rand($this->value6,$this->value7);
    //  $this->noroc = rand($this->value8,$this->value9);
      $this->noroc_range = rand(0,100);
  }

  function getPowers(){
    return ["nume" => $this->nume, "viata" => $this->viata, "putere" => $this->putere, "aparare" => $this->aparare, "viteza" => $this->viteza, "noroc" => $this->noroc, $this->noroc_range];
  }

  function setViata($noua_viata){
     return $this->viata = $noua_viata;
  }

  function resetPowers(){
    $this->putere = rand($this->value2,$this->value3);
    $this->aparare = rand($this->value4,$this->value5);
    $this->viteza = rand($this->value6,$this->value7);
    $this->noroc = rand($this->value8,$this->value9);
    $this->noroc_range = rand(0,100);
  //  return ;
  }
  function checkTodaysLuck(){
    if(in_array($this->noroc_range, range($this->value8, $this->value9)) ){
      $this->today_lucky = true;
    }
    return $this->today_lucky;
  }
}

class SuperHero extends Hero {
  protected $forta_dragonului_usage;
  protected $scutul_fermecat_usage;
  protected $forta_dragonului_luck;
  protected $scutul_fermecat_luck;
  protected $use_dragon;
  protected $use_shield;
  function __construct($viata, $array_of_powers, $super_powers){
      parent::__construct($viata, $array_of_powers);

      $i = 1;
      foreach($super_powers as $value){
        $x = 'value'.$i;
        $$x = $value;
        $i++;
      }

      $this->forta_dragonului_usage = rand(0,100);
      $this->scutul_fermecat_usage = rand(0,100);
      $this->forta_dragonului_luck = $value1;
      $this->scutul_fermecat_luck = $value2;
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

  function resetSuperPowers(){
    $this->forta_dragonului_usage = rand(0,100);
    $this->scutul_fermecat_usage = rand(0,100);
  }
}

$Carl = new SuperHero($Carl_life, $Carl_power_array, $Carl_super_powers);
$Villain = new Hero($Villain_life, $Villain_power_array);

?>
