<?php

fscanf(STDIN, "%d", $N);
fscanf(STDIN, "%d", $Q);

$Mimes = array();
for ($i = 0; $i < $N; $i++) {
  fscanf(STDIN, "%s %s", $EXT, $MT);
  $Mimes[strtolower($EXT)] = $MT;
}

$Files = array();
for ($i = 0; $i < $Q; $i++) {
  $FNAME = stream_get_line(STDIN, 500, "\n"); // One file name per line.

  $fnarray = explode('.', $FNAME);

  if (count($fnarray) > 1) {
    $ext = $fnarray[count($fnarray) - 1];
    $ext = strtolower($ext);

    if (array_key_exists($ext, $Mimes)) {
      echo($Mimes[$ext] . "\n");
    }
  }

  echo("UNKNOWN\n");

}
?>