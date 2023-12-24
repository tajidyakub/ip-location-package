# Ip Location Package

> Laravel package to get IP Address geo location info from ip2location API.

## Features

- [x] `IpLocApi` facade to utilize the package.
- [x] Extract Ip Address from `request` object from `x-forwarded-for` header if exists or through `ip()` method. Available through `IpLocApi::getIpAddress($request)`.
- [x] Get Ip address location object from `ip2location` API service, available through `IpLocApi::getIpLocation($ipAddress)` method.
- [x] Ip Location data provided by the API available on object form of `IpLocSpec` which has `inArray` method to provide the data in array form.

Other useful features will be added on later version such as `caching` the response to reduce external API calls, this can be done through an aliased `middleware`.

## API Service

API Service provided by `https://www.ip2location.io/`, there for an account is required, `service.base_url` and `service.api_key` needs to be defined in the app `.env` file.
