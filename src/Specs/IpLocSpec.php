<?php
namespace Tjx\IpLoc\Specs;

class IpLocSpec extends SpecBase implements SpecInterface
{
    public string $ip;

    public string $timeZone;

    public CountrySpec $country;

    public GeoSpec $geo;

    public ConnectionSpec $connection;

    public function __construct(array $payload)
    {
        $this->ip = $payload['ip'] ?? '';
        $this->timeZone = $payload['time_zone'] ?? '';
        
        $this->country = new CountrySpec(
            $payload['country_name'] ?? '',
            $payload['country_code'] ?? '',
            $payload['region_name'] ?? '',
            $payload['city_name'] ?? '',
        );

        $this->geo = new GeoSpec($payload['longitude'] ?? '', $payload['latitude'] ?? '');
        
        $this->connection = new ConnectionSpec(
            $payload['asn'] ?? '',
            $payload['as'] ?? '',
            $payload['isp'] ?? '',
            $payload['net_speed'] ?? '',
        );
    }
    
}
