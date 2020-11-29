<?php

namespace classes;

class Beast extends CombatFactory
{
	private $stats;
	private $type;
	
	public function __construct(CreatureStats $stats)
	{
		$this->stats = $stats;
		$this->type  = CreatureType::Beast;
	}
	
	public function write()
	{
		echo $this->stats->getLuck();
	}
}