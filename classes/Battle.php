<?php

namespace classes;

class Battle
{
	private $_attacker;
	private $_round;
	
	public function __construct($attacker, $defender)
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
		
		$this->displayCurrStatus();
	}
	
	public function startBattle()
	{
		$this->_attacker->setAttackValue($this->_defender);
		$this->_defender->setAttackValue($this->_attacker);
		$this->battleRound();
	}
	
	public function displayCurrStatus()
	{
		$attackerHealth = $this->_attacker->getStats()->getHealth();
		$defenderHealth = $this->_defender->getStats()->getHealth();
		
		echo 'Round ' . $this->_round . ':'.'<br/>';
		echo '___'.'<br/>';		
		echo 'attackerHealth: ' . $attackerHealth . '( ' . ($this->_attacker->getTypeC() == CreatureType::Hero ? 'hero' : 'beast') . ' )'.'<br/>';
		echo 'defenderHealth: ' . $defenderHealth . '( ' . ($this->_defender->getTypeC() == CreatureType::Hero ? 'beast' : 'hero') . ' )'.'<br/><br/>';
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
		
		$this->displayCurrStatus();
		
		if(!($attackerHealth == 0 || $defenderHealth == 0 || $this->_round == 20))
		{
			$this->battleRound();
		}
		else
		{
			if(!($this->_round == 20))
			{
				if($attackerHealth == 0)
				{
					echo '<br/><br/> WINNER: '.($this->_defender->getTypeC() == CreatureType::Hero ? 'beast' : 'hero');
				}
				else
				{
					echo '<br/><br/> WINNER: '.($this->_attacker->getTypeC() == CreatureType::Hero ? 'hero' : 'beast');
				}
			}
		}
	}
}