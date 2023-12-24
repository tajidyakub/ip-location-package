<?php

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Request;
use Tjx\IpLoc\IpLocApi;

it("Provides `IpLocApi` facade to be accessible constructing `IpLoc` class.", function () {
    $c = IpLocApi::getClient();

    expect($c)->toBeInstanceOf(PendingRequest::class);
});

it("Has `getIpAddress` method accepting Request class and get ip address from x-forwarded-for or request()->ip()", function () {

    $this->withHeaders(['x-forwarded-for' => '1.1.1.1,2.2.22']);
    
    dump($this->headers);

});

//it("", function () {});
