<?php
namespace Tjx\IpLoc;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Request;
use Tjx\IpLoc\Specs\IpLocSpec;

class IpLoc implements IpLocInterface
{
    public function getClient(): PendingRequest
    {}

    public function getIpAddress(Request $request): string
    {
        
    }

    public function getIpLocation(): IpLocSpec
    {
        $c = $this->getClient();
    }
}