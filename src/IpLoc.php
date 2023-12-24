<?php
namespace Tjx\IpLoc;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;
use Tjx\IpLoc\Specs\IpLocSpec;

class IpLoc implements IpLocInterface
{
    protected array $config;

    public function __construct(Application $app)
    {
        $this->config = Arr::dot($app->make('config')->get('iploc'));
    }

    public function getClient(): PendingRequest
    {
        $base = $this->config['service.base_url'];

        $headers = [
            'Accept' => 'application/json'
        ];

        return Http::baseUrl($base)->withHeaders($headers)->asJson();
    }

    public function getIpAddress(Request $request): string
    {
        // Get location from x-forwarded-for header.
        $forwardedFor = $request->header('x-forwarded-for', null);
        if (!$forwardedFor) return $request->ip();
        return trim(str($forwardedFor)->explode(",")->first());
    }

    public function getIpLocation(string $ipAddr): false|IpLocSpec
    {
        $c = $this->getClient();
        
        $params = [
            'ip' => $ipAddr,
            'key' => $this->config['service.api_key']
        ];
        
        $res =  $c->get('/',$params);
        
        if ($res->ok()) {
            if (!$res->json('error')) {
                return new IpLocSpec($res->json());
            }
        }
        return false;
    }
}
