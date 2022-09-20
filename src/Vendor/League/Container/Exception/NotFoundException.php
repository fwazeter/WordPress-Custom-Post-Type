<?php

declare( strict_types=1 );

namespace WazFactor\CPT\Vendor\League\Container\Exception;

use WazFactor\CPT\Vendor\Psr\Container\NotFoundExceptionInterface;
use InvalidArgumentException;

class NotFoundException extends InvalidArgumentException implements NotFoundExceptionInterface
{
}
