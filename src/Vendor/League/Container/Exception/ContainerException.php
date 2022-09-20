<?php

declare( strict_types=1 );

namespace WazFactor\CPT\Vendor\League\Container\Exception;

use WazFactor\CPT\Vendor\Psr\Container\ContainerExceptionInterface;
use RuntimeException;

class ContainerException extends RuntimeException implements ContainerExceptionInterface
{
}
