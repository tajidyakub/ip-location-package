<?php

namespace Tests;

use Illuminate\Support\Facades\File;
use Orchestra\Testbench\TestCase as BaseTestCase;
use Tjx\IpLoc\IpLocPackServiceProvider;

class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        if (file_exists(config_path('iploc.php'))) {
            File::delete(config_path('iploc.php'));
        }
    }

    protected function getPackageProviders($app)
    {
        return [
            IpLocPackServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        // perform environment setup
        if (! file_exists(base_path('.env'))) {
            shell_exec('touch '.base_path('.env'));
        }

        $app['config']->set('iploc.service.base_url', 'https://api.ip2location.io');
        $app['config']->set('iploc.service.api_key', 'GETAPIKEY--');
    }
}
