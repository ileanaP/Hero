<?php

namespace classes;

class Beast extends CombatFactory
{
	private $type;
	
	public function __construct(CreatureStats $stats)
	{
		parent::__construct($stats);
		$this->_typeC  = CreatureType::Beast;
	}
	
	public function attack(&$defender)
	{
		parent::attack($defender);
	}
	
	public function write()
	{
		echo $this->stats->getLuck();
	}
}