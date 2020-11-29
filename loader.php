<?php

spl_autoload_register();

$heroStatsBuilder = new classes\CreatureStatsBuilderHero();

$heroStatsDirector = new classes\CreatureStatsBuildDirector($heroStatsBuilder);
$heroStatsDirector->construct();

$HeroStats = $heroStatsBuilder->getResult();


$beastStatsBuilder = new classes\CreatureStatsBuilderBeast();

$beastStatsDirector = new classes\CreatureStatsBuildDirector($beastStatsBuilder);
$beastStatsDirector->construct();

$BeastStats = $beastStatsBuilder->getResult();

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);





