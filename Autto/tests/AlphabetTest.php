<?php

//require 'src/Automatons/Set.php';

use Autto\Components\Alphabet\Symbol;
use Autto\Components\Alphabet\Alphabet;

class AlphabetTest
{

	function testDuplication()
	{
		$a = new Symbol('a');
		$b = new Symbol('a');

		$alphabet = new Alphabet;

		try {
			$alphabet->add($a);
			$alphabet->add($a);
			$this->fail();

		} catch (Autto\Exceptions\DuplicateItemException $e) {}


		try {
			$alphabet->add($a);
			$alphabet->add($b);
			$this->fail();

		} catch (Autto\Exceptions\DuplicateItemException $e) {}
	}

}
