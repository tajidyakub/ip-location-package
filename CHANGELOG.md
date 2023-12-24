# CHANGELOG

> Ip Geo Location development notes.

## v0.1.2

- [ ] `UserHasIpAddress` concern adds extra data attached to a user model.
- [ ] `persist` configuration, to enable data persistence through a data base model.
- [ ] prepare model class and database migration file. 

## v0.1.1

- [ ] Service's caching setup.
- [ ] Exceptions setup.
- [ ] Middleware to extract ip address.
- [ ] Register middleware alias to be implemented in the incoming routes.
- [ ] `logging` directive in config.
- [ ] Log on service error.

## v0.1.0

- [x] Config directive to enable getting Cloudflare's'`CF-IPCountry` header, this feature requires the app to be behind Cloudflare's network and enables `IP Geo Location` feature.
- [x] `IpLocApi` facades added.
- [x] Ip Location data schema class.
- [x] Test on data schema class.
- [x] Test on service provider's functions.
- [x] Test on service basic functions.
- [x] `IpLocPackServiceProvider` merging `iploc` config into the main application configuration,
- [x] `config/iploc.php` configuration namespace.
- [x] `IpLocApi` facade setup.
- [x] Interface setup.
- [x] Service setup.
- [x] Package requirement setup.
