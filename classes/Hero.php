<?php

namespace classes;

class Hero extends CombatFactory
{
	private $stats;
	
	public function __construct(CreatureStats $stats)
	{
		$this->stats = $stats;
		$this->type  = CreatureType::Hero;
	}
	
	public function write()
	{
		echo $this->stats->getHealth();
	}
	
	public function attack(&$defender, $firstTime = true)
	{
		parent::attack(&$defender);
		
		if($firstTime)
		{
			$chanceToAttackTwice = rand(1,10);
			
			if($chanceToAttackTwice == 1 && $defender->stats->getHealth > 0)
			{
				$this->attack($defender, false);
			}
		}
	}
	
	public function defendFrom(&$attacker)
	{
		echo 'I defend';
	}
}