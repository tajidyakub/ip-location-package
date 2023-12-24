<?php

use Illuminate\Http\Client\PendingRequest;
use Tjx\IpLoc\IpLoc;
use Tjx\IpLoc\IpLocApi;

it("Provides `IpLocApi` facade to be accessible constructing `IpLoc` class.", function () {
    $c = IpLocApi::getClient();

    expect($c)->toBeInstanceOf(PendingRequest::class);
});

//it("", function () {});
