<?php
while (true) {
  fscanf(STDIN, "%d %d",
      $SX,
      $SY
  );

  $MHs = array();

  $highest = null;
  $key     = null;

  for ($i = 0; $i < 8; $i++) {
    fscanf(STDIN, "%d", $MH);

    if ($MH > $highest || $highest === null) {
      $key     = $i;
      $highest = $MH;
    }
  }

  if ($SX === $key) {
    echo "FIRE\n";
  } else {
    echo "HOLD\n";
  }
}
?>