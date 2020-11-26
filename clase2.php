<?php
include("variables.php");

class Hero{
  protected $viata;
  protected $putere;
  protected $aparare;
  protected $viteza;
  protected $noroc;
  protected $noroc_range;

  function __construct($viata, $array_of_powers){
    $this->viata = $viata;
      $this->putere = $array_of_powers[0];
      $this->aparare = $array_of_powers[1];
      $this->viteza = $array_of_powers[2];
      $this->noroc = $array_of_powers[3];
      $this->noroc_range = $array_of_powers[4];
  }

  function getViata(){
    return $this->viata;
  }

  function getPutere(){
    return $this->putere;
  }


  function getAparare(){
    return $this->aparare;
  }


  function getViteza(){
    return $this->viteza;
  }

  function getNoroc(){
    return $this->noroc;
  }

  function getNorocRange(){
    return $this->noroc_range;
  }

  function setViata($noua_viata){
    $viata = $noua_viata;
  }
}

class SuperHero extends Hero {
  function __construct($viata, $array_of_powers){
      parent::__construct($viata, $array_of_powers);

  }
  function forta_dragonului(){
    return $this->putere * 2;
  }

  function scutul_fermecat($adversary_power){
    return $adversary_power / 2;
  }
}

$Carl = new SuperHero($Carl_life, $Carl_powers);
$Villain = new Hero($Villain_life, $Villain_powers);
//echo $Carl->getViteza();



?>
