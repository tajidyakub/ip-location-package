<?php

namespace Tjx\IpLoc;

use Illuminate\Support\ServiceProvider;

class IpLocPackServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        // Merge configuration.
        $this->mergeConfigFrom(__DIR__.'/../config/iploc.php', 'iploc');

        // Bind interface.
        $this->app->singleton(
            abstract: IpLocInterface::class,
            concrete: fn ($app) => $app->make(IpLoc::class, ['app' => $app])
        );
    }

    public function boot(): void
    {
        // Append env vars;
        $this->appendEnvVars();

        // Publish config file.
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/iploc.php' => config_path('iploc.php'),
            ], 'config');
        }
    }

    protected $appendEnv = [
        'iploc_service_base' => '',
        'iploc_api_key' => '',
        'iploc_cache_enabled' => 0,
        'iploc_cache_ttl' => 86400,
        'iploc_cache_store' => 'default',
    ];

    protected function appendEnvVars(): void
    {
        $appEnvPath = base_path('.env');

        $appEnvContent = file_get_contents($appEnvPath);

        $appends = [];

        foreach ($this->appendEnv as $key => $value) {
            $key = strtoupper($key);
            if (! str($appEnvContent)->contains($key)) {
                $appends[$key] = $value;
            }
        }

        if (count($appends)) {
            $appendStr = '';
            foreach ($appends as $k => $v) {
                $appendStr .= "{$k}={$v}".PHP_EOL;
            }
            $fh = fopen($appEnvPath, 'a');
            fwrite($fh, $appendStr);
            fclose($fh);
        }
    }
}
