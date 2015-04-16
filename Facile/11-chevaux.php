<?php
fscanf(STDIN, "%d",
    $N
);


$liste = array();
for ($i = 0; $i < $N; $i++) {
  fscanf(STDIN, "%d", $Pi );
  $liste[] = $Pi;
}

sort($liste);

$minPi = null;
foreach($liste as $key => $cheval){

  if(!array_key_exists($key+1, $liste)){
    break;
  }

  $puis = abs($cheval - $liste[$key+1]);
  if( $puis < $minPi || $minPi === null)
  {
    $minPi = $puis;
  }
}


echo($minPi."\n");