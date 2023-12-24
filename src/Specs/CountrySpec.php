<?php
namespace Tjx\IpLoc\Specs;

class CountrySpec extends SpecBase implements SpecInterface
{

    public function __construct(
        public string $name,
        public string $code,
        public string $region,
        public string $city
    )
    {}
}
