<?php
require_once('loader.php');

$hero = new classes\Hero($HeroStats);

$beast = new classes\Beast($BeastStats);

$battle = new classes\Battle($hero, $beast);

$battle->startBattle();