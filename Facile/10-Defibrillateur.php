<?php

// etonnament le 3eme test échoue, mais lorsque l'on valide ils réussissent ...


fscanf(STDIN, "%s",
    $LON
);
fscanf(STDIN, "%s",
    $LAT
);
fscanf(STDIN, "%d",
    $N
);

$minDep   = null;
$curDefib = null;
$rep      = false;

$user = new User($LON, $LAT);

for ($i = 0; $i < $N; $i++) {

  $defib = new Defib(
      stream_get_line(STDIN, 256, "\n")
  );

  $x = ($user->getLon() - $defib->getLon()) * (cos(($defib->getLat() + $user->getLat()) / 2));
  $y = ($user->getLat() - $defib->getLat());
  $d = sqrt(pow($x, 2) + pow($y, 2)) * 6371;

  if ($d < $minDep || $minDep === null) {
    $minDep   = $d;
    $curDefib = $defib;
  }
}

echo($curDefib);

// L'utilisation de class est un peu useless mais je trouve ça plus propre et donc plus facile à lire que des array.

class User
{
  private $lat;

  private $lon;

  public function __construct ($lat, $lon)
  {
    $this->lat = $lat;
    $this->lon = $lon;
  }

  public function getLat ()
  {
    return str_replace(',', '.', $this->lat);
  }

  public function getLon ()
  {
    return str_replace(',', '.', $this->lon);
  }
}

class Defib
{

  private $id;

  private $name;

  private $address;

  private $phone;

  private $lat;

  private $lon;

  public function __construct ($string)
  {
    list($this->id, $this->name, $this->address, $this->phone, $this->lat, $this->lon) = explode(';', $string);
  }

  public function __toString ()
  {
    return $this->name . "\n";
  }

  public function getId ()
  {
    return $this->id;
  }

  public function getName ()
  {
    return $this->name;
  }

  public function getAddress ()
  {
    return $this->address;
  }

  public function getPhone ()
  {
    return $this->phone;
  }

  public function getLat ()
  {
    return str_replace(',', '.', $this->lat);
  }

  public function getLon ()
  {
    return str_replace(',', '.', $this->lon);
  }

}

?>