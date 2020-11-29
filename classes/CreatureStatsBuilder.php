<?php

namespace classes;

interface CreatureStatsBuilder
{	
	public function setStats();

	public function getResult();

	/*public function setHealth($health)   { $_health = intval($health);   }
	public function setHealth($strength) { $_health = intval($strength); }
	public function setHealth($defence)  { $_health = intval($defence);  }
	public function setHealth($speed)    { $_health = intval($speed);    }
	public function setHealth($luck)     { $_health = intval($luck);     }*/
}