<?php

declare( strict_types=1 );

namespace WazFactor\CPT\Vendor\League\Container\Argument\Literal;

use WazFactor\CPT\Vendor\League\Container\Argument\LiteralArgument;

class StringArgument extends LiteralArgument
{
	public function __construct( string $value )
	{
		parent::__construct( $value, LiteralArgument::TYPE_STRING );
	}
}
