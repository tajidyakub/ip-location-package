<?php

it('Will merge `iploc` package configuration with `app` config once installed through service provider.', function () {
    $iploc = config('iploc', null);

    expect($iploc)->toBeArray()
        ->and($iploc)->toHaveKeys(['service', 'cache', 'cf']);
});

it('Has Service base url and api key value from `env` variables.', function () {
    $service = config('iploc.service', null);

    expect($service)->toBeArray()
        ->and($service)->toHaveKeys(['base_url', 'api_key'])
        ->and($service['base_url'])->not->toBe('')
        ->and($service['api_key'])->not->toBe('');
});

it("It will append package's `env` variables to the main `.env` file once installed.", function () {

    $envContent = file_get_contents(base_path('.env'));

    expect(str($envContent)->contains('IPLOC_SERVICE_BASE'))->toBeTrue();
    expect(str($envContent)->contains('IPLOC_API_KEY'))->toBeTrue();

});

it('Can publish config file to config/iploc.php through `vendor:publish` artisan command.', function () {

    $path = config_path('iploc.php');
    expect(file_exists($path))->toBeFalse();

    $this->artisan('vendor:publish', ['--provider' => \Tjx\IpLoc\IpLocPackServiceProvider::class, '--tag' => 'config']);
    expect(file_exists($path))->toBeTrue();

});

//it("", function () {});
