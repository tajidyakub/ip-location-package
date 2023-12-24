<?php
namespace Tjx\IpLoc;

use Illuminate\Support\Facades\Facade;

class IpLocApi extends Facade
{
    protected static function getFacadeAccessor()
    {
        return IpLocInterface::class;
    }
}
