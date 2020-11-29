<?php

namespace classes;

abstract class CombatFactory
{
	
	public function attack(&$defender)
	{
		$damage = $this->stats->getStrength - $defender->stats->getDefence();
		
		if($damage > 0)
		{
			$currDefenderHealth = $defender->stats->getHealth();
			
			if($defender->type == CreatureType::Hero)
			{
				$damage = $damage/2;
			}
			
			$defender->stats->setHealth($currDefenderHealth - $damage);
		}

	}
}