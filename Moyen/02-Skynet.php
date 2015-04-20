<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/

fscanf(STDIN, "%d %d %d",
    $N, // the total number of nodes in the level, including the gateways
    $L, // the number of links
    $E // the number of exit gateways
);

$nodes = array();
$gates = array();

for ($i = 0; $i < $L; $i++) {
  fscanf(STDIN, "%d %d",
      $N1, // N1 and N2 defines a link between these nodes
      $N2
  );

  $nodes[] = array($N2 => $N1, $N1 => $N2);
}

for ($i = 0; $i < $E; $i++) {
  fscanf(STDIN, "%d",
      $EI // the index of a gateway node
  );
  $gates[] = $EI;
}

// game loop
while (true) {
  fscanf(STDIN, "%d",
      $SI // The index of the node on which the Skynet agent is positioned this turn
  );

  $return = null;

  foreach ($nodes as $key => $link) {

    foreach ($gates as $gate) {
      if (array_key_exists($gate, $link) && $link[$gate] === $SI) {
        $return = $SI . ' ' . $link[$SI];
        unset($nodes[$key]);
        break 3;
      }
    }

    if (array_key_exists($SI, $link) && is_null($return)) {
      $return = $SI . ' ' . $link[$SI];
      unset($nodes[$key]);
      break 2;
    }
  }

  echo($return . "\n");
}
?>