<?php

namespace classes;

class Hero extends BasicCreature implements CreatureFactory, AttackTwiceTrait, DefendTwiceTrait
{	
	public function __construct(CreatureStats $stats)
	{
		parent::__construct($stats);
		$this->_typeC  = CreatureType::Hero;
	}
	
	public function attack(&$defender)
	{
		parent::attack($defender);
		
		$this->tryAttackTwice($defender);
	}
	
	public function tryAttackTwice(&$defender)
	{
		$chanceToAttackTwice = rand(1,10);
		
		if($chanceToAttackTwice == 1 && $defender->getStats()->getHealth() > 0)
		{
			parent::attack($defender);
		}
	}
	
	public function getDefendValue($attackValue)
	{		
		$totalDefence = parent::getDefendValue($attackValue);
		
		$totalDefence += $this->tryDefendTwice($attackValue);
		
		return min($totalDefence, $attackValue);
	}

	public function tryDefendTwice($attackValue)
	{
		$chanceToDefendTwice = rand(1,5);
		
		if($chanceToDefendTwice == 1)
		{
			return $attackValue/2;
		}
	}
}