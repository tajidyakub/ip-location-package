<?php

use Tjx\IpLoc\Specs\ConnectionSpec;
use Tjx\IpLoc\Specs\CountrySpec;
use Tjx\IpLoc\Specs\GeoSpec;
use Tjx\IpLoc\Specs\IpLocSpec;

it("Constructed class will has `ip`, `timeZone`, `country`, `geo` and `connection` property", function () {
    $d = [];
    $s = new IpLocSpec($d);

    $r = new ReflectionClass($s);
    $propNames = collect($r->getProperties())->pluck('name')->all();
    
    expect(in_array('ip', $propNames))->toBeTrue();
    expect(in_array('timeZone', $propNames))->toBeTrue();
    expect(in_array('country', $propNames))->toBeTrue();
    expect(in_array('geo', $propNames))->toBeTrue();
    expect(in_array('connection', $propNames))->toBeTrue();
});

it("Will not throw error if the provided data doesn't contain the property it requires, instead put empty string as value", function () {
    $d = [];
    $s = new IpLocSpec($d);

    expect($s->ip)->toBeEmpty();
    expect($s->country->name)->toBeEmpty();
    expect($s->geo->longitude)->toBeEmpty();
    expect($s->connection->isp)->toBeEmpty();
});

it("Uses other schema class for `country`, `connection` and `geo` property.", function () {
    $d = [];
    $s = new IpLocSpec($d);

    expect($s->country)->toBeInstanceOf(CountrySpec::class);
    expect($s->geo)->toBeInstanceOf(GeoSpec::class);
    expect($s->connection)->toBeInstanceOf(ConnectionSpec::class);
});

it("Has `inArray` method providing array representation of the value its holds. This includes properties using other schema class.", function () {
    $d = [
        "ip" => "175.100.46.253",
        "country_code" => "KH",
        "country_name" => "Cambodia",
        "region_name" => "Siem Reab",
        "city_name" => "Siem Reap",
        "latitude" => 13.36667,
        "longitude" => 103.85,
        "zip_code" => "-",
        "time_zone" => "+07:00",
        "asn" => "38623",
        "as" => "ISPIXP In Cambodia With The Best Vervi",
        "isp" => "Viettel (Cambodia) Pte. Ltd.",
        "domain" => "metfone.com.kh",
        "net_speed" => "DSL",
      ];
    $s = new IpLocSpec($d);
    $arr = $s->inArray();
    $methods = get_class_methods($s);
    
    expect(in_array('inArray', $methods))->toBeTrue();
    expect($s->inArray())->toBeArray();
    expect($arr['country'])->toBeArray()->and($arr['country'])->toHaveKeys(['name', 'code', 'region', 'city']);

});

// it("", function () {});
