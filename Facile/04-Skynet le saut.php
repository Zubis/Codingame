<?php

fscanf(STDIN, "%d",
    $R // the length of the road before the gap.
);
fscanf(STDIN, "%d",
    $G // the length of the gap.
);
fscanf(STDIN, "%d",
    $L // the length of the landing platform.
);

// game loop
while (true) {
  fscanf(STDIN, "%d",
      $S // the motorbike's speed.
  );
  fscanf(STDIN, "%d",
      $X // the position on the road of the motorbike.
  );


  if ($X + 1 === $R) {
    echo("JUMP\n");
  } elseif ($X >= ($R + $G) || $G < $S - 1) {
    echo("SLOW\n");
  } elseif ($G == $S - 1) {
    echo("WAIT\n");
  } else {
    echo("SPEED\n");
  }

}
?>