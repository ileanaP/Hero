<?php

namespace classes;

class Battle
{
	private $_attacker;
	private $_round;
	
	public function __construct(CombatFactory $attacker, CombatFactory $defender)
	{
		$attackerSpeed = $attacker->stats->getSpeed();
		$defenderSpeed = $defender->stats->getSpeed();
		
		if($attackerSpeed == $defenderSpeed)
		{
			if($attacker->stats->getLuck() > $defender->stats->getLuck())
			{
				$this->_attacker   = $attacker;
				$this->_defender   = $defender;
			}
			else
			{
				$this->_defender   = $attacker;
				$this->_attacker   = $defender;
			}
		}
		else
		{
			if($attackerSpeed > $defenderSpeed)
			{
				$this->_attacker   = $attacker;
				$this->_defender   = $defender;
			}
			else
			{
				$this->_defender   = $attacker;
				$this->_attacker   = $defender;
			}			
		}
		
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
			$this->_attacker->attack($defender);
		}
		else
		{
			$this->_defender->attack($attacker);
		}
		
		$this->_round++;
		
		$attackerHealth = $this->_attacker->stats->getHealth();
		$defenderHealth = $this->_defender->stats->getHealth();
		
		echo 'Round ' . $this->_round . ':'.'<br/>';
		echo '___';		
		echo 'attackerHealth: ' . $attackerHealth . '( ' . CreatureType($this->_attacker->type) . ' )'.'<br/>';
		echo 'defenderHealth: ' . $defenderHealth . '( ' . CreatureType($this->_defender->type) . ' )'.'<br/><br/>';
		
		if(!($attackerHealth == 0 || $defenderHealth == 0 || $round == 20))
		{
			$this->battleRound();
		}
		else
		{
			
		}

	
		/*echo '<br/><br/>';
		echo $defender->getLuck();
		echo '<br/><br/>';*/
	}
}