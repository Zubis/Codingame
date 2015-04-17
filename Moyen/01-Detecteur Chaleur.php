<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

fscanf(STDIN, "%d %d",
    $W, // width of the building.
    $H // height of the building.
);
fscanf(STDIN, "%d",
    $N // maximum number of turns before game over.
);
fscanf(STDIN, "%d %d",
    $x,
    $y
);

$maxX = $W;
$maxY = $H;

$minX = -1;
$minY = -1;

// game loop
while (true) {
  fscanf(STDIN, "%s",
      $BOMB_DIR
  );

  $dirs = str_split($BOMB_DIR, 1);

  foreach ($dirs as $dir) {
    if ($dir == "U") {
      $maxY = $y;
      $y -= jump($y, $minY);
    } elseif ($dir == "D") {
      $minY = $y;
      $y += jump($y, $maxY);
    }

    if ($dir == "L") {
      $maxX = $x;
      $x -= jump($x, $minX);
    } elseif ($dir == "R") {
      $minX = $x;
      $x += jump($x, $maxX);
    }
  }

  echo("$x $y \n");
}

function jump ($val, $val2)
{
  return abs(ceil(($val2 - $val) / 2));
}
