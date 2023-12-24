<?php
namespace Tjx\IpLoc\Specs;

class ConnectionSpec extends SpecBase implements SpecInterface
{

    public function __construct(
        public string $asn,
        public string $as,
        public string $isp,
        public string $netSpeed
    ) {}
}
