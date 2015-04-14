<?php

$MESSAGE = stream_get_line(STDIN, 100, "\n");
$chars = str_split($MESSAGE, 1);

$result = "";
$prev = null;

foreach($chars as $char){


    $bin = decbin(ord ($char)); // ord() = ASCII to dec
    $bin = sprintf("%'.07d", $bin); // Merci Far !
    $bits = str_split($bin, 1);
    
    foreach($bits as $bit){
        
        if ( $prev == $bit) {
            $result .= "0";
        } else {
            if($bit == 0) {
                $result .= " 00 0";
            } else {
                $result .= " 0 0";
            }
        }
        
        $prev = $bit;
    }
}

// supprime le premier espace de la chaine
$result = substr($result, 1);
echo($result."\n");

?>