<?php

namespace ElmarHinz;

class ScalarTypeHints
{

	public function setString(string $input)
	{
		1;
	}

	public function returnString($input) : string
	{
		return $input;
	}

}


