<?php

namespace classes;

class CreatureStats
{
	private $_health;
	private $_strength;
	private $_defence;
	private $_speed;
	private $_luck;
	
	public function setHealth($health)     { $this->_health   = max(intval($health),0);   }
	public function setStrength($strength) { $this->_strength = intval($strength); }
	public function setDefence($defence)   { $this->_defence  = intval($defence);  }
	public function setSpeed($speed)       { $this->_speed    = intval($speed);    }
	public function setLuck($luck)         { $this->_luck     = intval($luck);     }
	
	public function getHealth()   { return $this->_health;   }
	public function getStrength() { return $this->_strength; }
	public function getDefence()  { return $this->_defence;  }
	public function getSpeed()    { return $this->_speed;    }
	public function getLuck()     { return $this->_luck;     }
}