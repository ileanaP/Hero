<?php

namespace classes;

class Hero extends CombatFactory implements AttackTwiceTrait
{	
	public function __construct(CreatureStats $stats)
	{
		parent::__construct($stats);
		$this->_typeC  = CreatureType::Hero;
	}
	
	public function write()
	{
		echo $this->stats->getHealth();
	}
	
	public function attack(&$defender)
	{
		parent::attack($defender);
		
		$this->tryAttackTwice($defender);
	}
	
	public function tryAttackTwice(&$defender)
	{
		$chanceToAttackTwice = rand(1,10);
			
		$chanceToAttackTwice=1;
		
		if($chanceToAttackTwice == 1 && $defender->getStats()->getHealth() > 0)
		{
			parent::attack($defender);
		}
	}
	
	public function defendFrom(&$attacker)
	{
		echo 'I defend';
	}
}