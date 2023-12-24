<?php
namespace Tjx\IpLoc;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Request;

interface IpLocInterface
{
    public function getClient(): PendingRequest;

    public function getIpAddress(Request $request): string;

    public function getIpLocation();
}
