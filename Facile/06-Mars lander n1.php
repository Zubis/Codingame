<?php

fscanf(STDIN, "%d",
    $N // the number of points used to draw the surface of Mars.
);
for ($i = 0; $i < $N; $i++) {
  fscanf(STDIN, "%d %d",
      $LAND_X, // X coordinate of a surface point. (0 to 6999)
      $LAND_Y // Y coordinate of a surface point. By linking all the points together in a sequential fashion, you form the surface of Mars.
  );
}

while (true) {
  fscanf(STDIN, "%d %d %d %d %d %d %d",
      $X,
      $Y,
      $HS, // the horizontal speed (in m/s), can be negative.
      $VS, // the vertical speed (in m/s), can be negative.
      $F, // the quantity of remaining fuel in liters.
      $R, // the rotation angle in degrees (-90 to 90).
      $P // the thrust power (0 to 4).
  );

  // c'est plus que simple, mais ça passe le test avec plus de 300 de fuel !
  if ($VS > -40) {
    $P = 0;
  } else {
    $P = 4;
  }

  echo("0 " . $P . "\n");
}
?>