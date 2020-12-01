<?php

namespace classes;

class BasicCreature implements CreatureFactory
{
	private $_stats;
	private $_typeC;
	private $_attackValue;
	
	public function __construct(CreatureStats $stats)
	{
		$this->_stats = $stats;
	}
	
	public function setAttackValue($defender)
	{
		$attackValue = $this->getStrength() - $defender->getDefence();
		$this->_attackValue = $attackValue > 0 ? $attackValue : 0;
	}
	
	public function getStats()
	{
		return $this->_stats;
	}
	
	public function getTypeC()
	{
		return $this->_typeC;
	}
	
	public function getHealth()
	{
		return $this->getStats()->getHealth();
	}
	
	public function getStrength()
	{
		return $this->getStats()->getStrength();
	}
	
	public function getDefence()
	{
		return $this->getStats()->getDefence();
	}
	
	public function getDefendValue($attackValue)
	{
		return 0;
	}
	
	public function lowerHealth($attackValue)
	{
		$currHealth = $this->getHealth();
		$attackValue = max(0, $attackValue - $this->getDefendValue($attackValue));
		$this->getStats()->setHealth($currHealth - $attackValue);
	}
	
	public function attack(&$defender)
	{		
		$defender->lowerHealth($this->_attackValue);
	}
	
	public function damageTaken($damage)
	{		
		$damage = intval($damage);
		$damage = $damage > 0 ? $damage : 0; 
		
		return $damage;
	}
}