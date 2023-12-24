<?php
namespace Tjx\IpLoc;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Illuminate\Http\Client\PendingRequest getClient()
 * @method static string getIpAddress(\Illuminate\Http\Request $request)
 * @method static false|\Tjx\IpLoc\Specs\IpLocSpec getIpLocation(string $ipAddr)
 * @package Tjx\IpLoc
 */
class IpLocApi extends Facade
{
    protected static function getFacadeAccessor()
    {
        return IpLocInterface::class;
    }
}
