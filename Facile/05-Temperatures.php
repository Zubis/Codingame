<?php

fscanf(STDIN, "%d", $N); // the number of temperatures to analyse
$TEMPS = stream_get_line(STDIN, 256, "\n"); // the N temperatures expressed as integers ranging from -273 to 5526
$TEMPS = explode(' ', $TEMPS);

$minTemp = -273;
$maxTemp = 5526;

$minVal    = null;
$minValAbs = null;

foreach ($TEMPS as $temp) {
  if ($temp >= $minTemp && $temp <= $maxTemp) {

    $valAbs = abs($temp);

    if ($valAbs == $minValAbs) {

      $minVal = ($temp < 0 && $minVal < 0) ? $temp : $valAbs; // pour le cas ou deux valeur négatives ce compares. si on à [-10, -10] on retourne -10
      $minValAbs = $valAbs;

    } elseif ($valAbs < $minValAbs || is_null($minValAbs)) {
      $minVal    = $temp;
      $minValAbs = $valAbs;
    }
  }
}

echo($minVal . "\n");
?>