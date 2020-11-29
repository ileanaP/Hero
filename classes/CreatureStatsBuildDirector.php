<?php

namespace classes;

class CreatureStatsBuildDirector
{
	private $_builder;
	
	public function __construct(&$builder)
	{
		$this->_builder = $builder;
	}
	
	public function construct()
	{
		$this->_builder->setStats();
	}
}