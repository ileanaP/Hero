<?php

namespace classes;

class CreatureStatsBuilderHero implements CreatureStatsBuilder
{
	private $creatureStats;
	
	public function __construct()
    {
        $this->reset();
    }

    public function reset(): void
    {
        $this->creatureStats = new CreatureStats();
    }
	
	public function setStats()
	{
		$health   = rand(70, 100);
		$strength = rand(70, 80);
		$defence  = rand(45, 55);
		$speed    = rand(40, 50);
		$luck     = rand(10, 30);
		
		$this->creatureStats->setHealth($health);
		$this->creatureStats->setStrength($strength);
		$this->creatureStats->setDefence($defence);
		$this->creatureStats->setSpeed($speed);
		$this->creatureStats->setLuck($luck);
	}
	
	public function getResult()
	{
		return $this->creatureStats;
	}
}