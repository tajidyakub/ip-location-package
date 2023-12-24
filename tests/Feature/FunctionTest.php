<?php

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Tjx\IpLoc\IpLocApi;
use Tjx\IpLoc\Specs\IpLocSpec;

it('Provides `IpLocApi` facade to be accessible constructing `IpLoc` class.', function () {
    $c = IpLocApi::getClient();

    expect($c)->toBeInstanceOf(PendingRequest::class);
});

it('Has `getIpAddress` method accepting Request class and get ip address from x-forwarded-for or request()->ip()', function () {

    $request = new Request();
    $request->headers->set('x-forwarded-for', '1.1.1.1,2.2.2.2');

    $userIp = IpLocApi::getIpAddress($request);
    expect($userIp)->toBe('1.1.1.1');
});

it('Can get location from ip2location API through `getIpLocation` method by providing Ip Address.', function () {
    Http::fake([
        'api.ip2location.io' => Http::response([
            'ip' => '1.1.1.1',
            'country_code' => 'US',
            'country_name' => 'United States of America',
            'region_name' => 'California',
            'city_name' => 'San Jose',
            'latitude' => 37.33939,
            'longitude' => -121.89496,
            'zip_code' => '95101',
            'time_zone' => '-08:00',
            'asn' => '13335',
            'as' => 'CloudFlare Inc.',
            'isp' => 'APNIC and CloudFlare DNS Resolver Project',
        ], 200),
    ]);

    $ipAddress = '1.1.1.1';

    $ipLoc = IpLocApi::getIpLocation($ipAddress);

    expect($ipLoc)->toBeInstanceOf(IpLocSpec::class);
    expect($ipLoc->ip)->toBe($ipAddress);
    expect($ipLoc->timeZone)->toBe('-08:00');
    expect($ipLoc->country->code)->toBe('US');
});

//it("", function () {});
