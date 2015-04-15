<?php

fscanf(STDIN, "%s",
    $LON
);
fscanf(STDIN, "%s",
    $LAT
);
fscanf(STDIN, "%d",
    $N
);

$minDist  = null;
$curDefib = null;
$rep      = false;

$user = new User($LAT, $LON);

for ($i = 0; $i < $N; $i++) {

  $defib_String = stream_get_line(STDIN, 256, "\n");
  $defib        = new Defib($defib_String);

  $d = $defib->getRange($user);

  if ($d < $minDist || $minDist === null) {

    $minDist  = $d;
    $curDefib = $defib;
  }
}

echo($curDefib);

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
    return num($this->lat);
  }

  public function getLon ()
  {
    return num($this->lon);
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
    list($this->id, $this->name, $this->address, $this->phone, $this->lon, $this->lat) = explode(';', $string);
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
    return num($this->lat);
  }

  public function getLon ()
  {
    return num($this->lon);

  }

  public function getRange (User $user)
  {

    $x = ($this->getLon() - $user->getLon()) * cos(($user->getLat() + $this->getLat()) / 2);
    $y = ($this->getLat() - $user->getLat());
    $d = (sqrt(pow($x, 2) + pow($y, 2))) * 6371;

    return $d;
  }

}

function num ($num)
{
  return str_replace(',', '.', $num);
}

?>