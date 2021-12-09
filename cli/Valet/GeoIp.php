<?php

namespace Valet;

class GeoIp
{
    public $brew;
    public $cli;

    /**
     * Memcached.
     *
     * @param  Brew $brew
     * @param  CommandLine $cli
     */
    public function __construct(Brew $brew, CommandLine $cli)
    {
        $this->cli = $cli;
        $this->brew = $brew;
    }

    /**
     * Install service.
     *
     * @return bool
     */
    public function install()
    {
        $restart = false;
        if ($this->brew->installed('geoip')) {
            info('[geoip] (brew) already installed');
        } else {
            $restart = true;
            $this->brew->ensureInstalled('geoip');
            info('[geoip] Successfully installed');
        }
        return true;
    }

    /**
     * Uninstall memcached.
     *
     * @return bool
     */
    public function uninstall()
    {
        info('[geoip] Uninstalling');
        $this->brew->ensureUninstalled('geoip');
        info('[geoip] Successfully uninstalled');
        return true;
    }
}
