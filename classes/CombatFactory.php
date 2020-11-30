<?php

namespace classes;

abstract class CombatFactory
{
	private $_stats;
	private $_typeC;
	
	public function __construct(CreatureStats $stats)
	{
		$this->_stats = $stats;
	}
	
	public function getStats()
	{
		return $this->_stats;
	}
	
	public function getTypeC()
	{
		return $this->_typeC;
	}
	
	public function attack(&$defender)
	{
		$damage = $this->getStats()->getStrength() - $defender->getStats()->getDefence();
		
		if($damage > 0)
		{
			$currDefenderHealth = $defender->getStats()->getHealth();
			
			if($defender->_typeC == CreatureType::Hero)
			{
				$damage = $damage/2;
			}
			
			$defender->getStats()->setHealth($currDefenderHealth - $damage);
		}

	}
}