<?php

namespace classes;

class Beast extends BasicCreature implements CreatureFactory
{
	private $type;
	
	public function __construct(CreatureStats $stats)
	{
		parent::__construct($stats);
		$this->_typeC  = CreatureType::Beast;
	}
}