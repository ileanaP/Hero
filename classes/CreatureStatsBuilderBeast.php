<?php

namespace classes;

class CreatureStatsBuilderBeast implements CreatureStatsBuilder
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
		$health   = rand(60, 90);
		$strength = rand(60, 90);
		$defence  = rand(40, 60);
		$speed    = rand(40, 60);
		$luck     = rand(25, 40);
		
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