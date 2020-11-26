<?php
include("clase2.php");

function fight($erou, $badAss,$x,$y) {
  //echo $x."</br>";
  //echo $y."</br>";
  for($tura = 1; $tura <= 20; $tura++){
    echo "Tura: {$tura}</br>";
    echo "Viata Carl: ".$erou->getViata()."</br>";
    echo "Putere Carl:".$erou->getPutere()."</br>";
    echo "Viata Villain: ".$badAss->getViata()."</br>";
    if($erou->getViata() > 0 && $badAss->getViata() > 0){
      //the fight begins
      //check the luck
      //if()
      //check the usage of superpowers
      if($x > 10){
        $erou->forta_dragonului();
      }
      if($y < 20){
        $atac = $badAss->getPutere();
        $erou->scutul_fermecat($atac);
      }
    //  echo "Tura: {$tura}</br>";
      if($erou->getViteza() > $badAss->getViteza()){
        //hero attacks first
        $damage = $erou->getPutere() - $badAss->getAparare();
        $new_life = $badAss->getViata() - $damage;
        
        $badAss->setViata($new_life);
      //  $erou = new SuperHero()
      //  echo $damage."</br>";
      }else if($erou->getViteza() < $badAss->getViteza()){
        //villain attacks first
        $damage = $badAss->getPutere() - $erou->getAparare();
        $new_life = $erou->getViata() - $damage;
        $erou->setViata($new_life);
      }else{
        //check the highest luck
      }
    }
  }
}

fight($Carl, $Villain,$Carl_forta_dragonului, $Carl_scutul_fermecat);
?>
