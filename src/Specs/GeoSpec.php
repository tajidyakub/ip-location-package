<?php

namespace Tjx\IpLoc\Specs;

class GeoSpec extends SpecBase implements SpecInterface
{
    public function __construct(
        public float $longitude,
        public float $latitude
    ) {
    }
}
