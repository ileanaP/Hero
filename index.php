<?php
require_once('loader.php');

/*$home = new classes\hero();
print_r($home->write());
echo '<br/><br/><br/>';*/

$hero = new classes\Hero($HeroStats);
//$hero->write();
echo '<br/><br/><br/><br/>';
$beast = new classes\Beast($BeastStats);
//$beast->write();

$battle = new classes\Battle($hero, $beast);

$battle->startBattle();