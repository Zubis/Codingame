<?php

fscanf(STDIN, "%d %d %d %d",
    $LX, // the X position of the light of power
    $LY, // the Y position of the light of power
    $TX, // Thor's starting X position
    $TY // Thor's starting Y position
);

// game loop
while (true) {
  fscanf(STDIN, "%d",
      $E // The level of Thor's remaining energy, representing the number of moves he can still make.
  );

  $depX = "";
  $depY = "";

  if ($TX < $LX) {
    $TX++;
    $depX = "E";
  }
  if ($TX > $LX) {
    $TX--;
    $depX = "W";
  }
  if ($TY > $LY) {
    $depY = "N";
    $TY--;
  }
  if ($TY < $LY) {
    $depY = "S";
    $TY++;
  }


  echo $depY . $depX . "\n";

}
?>