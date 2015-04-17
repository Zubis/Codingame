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

$links = array();
for ($i = 0; $i < $L; $i++) {
  fscanf(STDIN, "%d %d",
      $N1, // N1 and N2 defines a link between these nodes
      $N2
  );

  $links[] = array($N1 => $N2, $N2 => $N1);
}

$gateways = array();
for ($i = 0; $i < $E; $i++) {
  fscanf(STDIN, "%d",
      $EI // the index of a gateway node
  );
  $gateways[] = $EI;
}

// game loop
while (true) {
  fscanf(STDIN, "%d",
      $SI // The index of the node on which the Skynet agent is positioned this turn
  );

  $return = null;

  foreach ($gateways as $gateway) {
    foreach ($links as $key => $link) {
      // Si Agent devant une gateway, on supprime cette gateway
      // sinon on en supprime une au pif
      if (array_key_exists($gateway, $link) && $link[$gateway] === $SI) {
        $return = $gateway . ' ' . $link[$gateway];
      } elseif (array_key_exists($gateway, $link) && is_null($return)) {
        $return = $gateway . ' ' . $link[$gateway];
      }
    }
  }

  echo($return . "\n");
}
?>