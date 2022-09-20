<?php

declare( strict_types=1 );

namespace WazFactor\CPT\Vendor\League\Container\Argument;

interface ResolvableArgumentInterface extends ArgumentInterface
{
	public function getValue(): string;
}
