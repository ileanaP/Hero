<?php

namespace classes;

class Battle
{
	private $_attacker;
	private $_round;
	
	public function __construct(CombatFactory $attacker, CombatFactory $defender)
	{
		$attackerSpeed = $attacker->getStats()->getSpeed();
		$defenderSpeed = $defender->getStats()->getSpeed();
		
		$defaultOrder = true;

		if(!($attackerSpeed > $defenderSpeed))
		{
			$defaultOrder = false;
		}
		else if($attackerSpeed == $defenderSpeed)
		{
			$attackerLuck  = $attacker->getStats()->getLuck();
			$defenderLuck  = $defender->getStats()->getLuck();
			
			if(!($attackerLuck >= $defenderLuck))
			{
				$defaultOrder = false;
			}
		}

		$this->_attacker = $defaultOrder ? $attacker : $defender;
		$this->_defender = $defaultOrder ? $defender : $attacker;
		
		$this->_round = 0;
	}
	
	public function startBattle()
	{
		$this->battleRound();
	}
	
	public function battleRound()
	{
		if($this->_round % 2 == 0)
		{
			$this->_attacker->attack($this->_defender);
		}
		else
		{
			$this->_defender->attack($this->_attacker);
		}
		
		$this->_round++;
		
		$attackerHealth = $this->_attacker->getStats()->getHealth();
		$defenderHealth = $this->_defender->getStats()->getHealth();
		
		echo 'Round ' . $this->_round . ':'.'<br/>';
		echo '___'.'<br/>';		
		echo 'attackerHealth: ' . $attackerHealth . '( ' . ($this->_attacker->getTypeC() == CreatureType::Hero ? 'hero' : 'beast') . ' )'.'<br/>';
		echo 'defenderHealth: ' . $defenderHealth . '( ' . ($this->_defender->getTypeC() == CreatureType::Hero ? 'beast' : 'hero') . ' )'.'<br/><br/>';
		
		if(!($attackerHealth == 0 || $defenderHealth == 0 || $this->_round == 20))
		{
			$this->battleRound();
		}
	}
}