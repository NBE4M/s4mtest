<?php
namespace Madewithlove\IlluminatePsrCacheBridge\Exceptions;

use InvalidArgumentException as BaseInvalidArgumentException;
use Psr\Cache\InvalidArgumentException as InvalidArgumentExceptionContract;

class InvalidArgumentException extends BaseInvalidArgumentException implements InvalidArgumentExceptionContract
{
}
