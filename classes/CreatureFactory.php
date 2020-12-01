<?php

namespace classes;

interface CreatureFactory
{	
	public function setAttackValue($defender);
	
	public function getStats();

	public function getTypeC();
	
	public function getHealth();
	
	public function getStrength();
	
	public function getDefence();
	
	public function getDefendValue($attackValue);
	
	public function lowerHealth($attackValue);
	
	public function attack(&$defender);
	
	public function damageTaken($damage);
}