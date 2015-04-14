<?php

fscanf(STDIN, "%d", $L);
fscanf(STDIN, "%d", $H);
$T = stream_get_line(STDIN, 256, "\n");

$T           = preg_replace('/\W/', '?', $T);
$lines       = [];
$outputLines = [];

for ($i = 0; $i < $H; $i++) {
  $lines[]       = stream_get_line(STDIN, 1024, "\n");
  $outputLines[] = '';
}

$letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ?';

for ($u = 0; $u < strlen($T); $u++) {
  $position   = strpos($letters, strtoupper($T[$u]));
  $offsetLeft = $position * $L;

  foreach ($lines as $k => $line) {
    $outputLines[$k] .= substr($lines[$k], $offsetLeft, $L);
  }
}
echo implode("\n", $outputLines), "\n";

?>