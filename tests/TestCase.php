<?php

namespace Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;
use Tjx\IpLoc\IpLocPackServiceProvider;

class TestCase extends BaseTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
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
        if (!file_exists(base_path('.env'))) {
            shell_exec("touch " . base_path('.env'));
        }

        $app['config']->set('iploc.service.base_url', 'https://api.ip2location.io');
        $app['config']->set('iploc.service.api_key', 'BA708D085ADED5B513AD5B3A84F50C36');
    }
}
