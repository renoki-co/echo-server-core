<?php

namespace RenokiCo\EchoServer\AppsManagers;

use RenokiCo\EchoServer\Contracts\AppsManager;

class ArrayAppsManager implements AppsManager
{
    /**
     * Find an application by ID.
     *
     * @param  string  $appId
     * @return null|\RenokiCo\EchoServer\AppsManagers\App
     */
    public function find(string $appId)
    {
        $app = collect(config('echo-server.app-manager.array.apps'))
            ->where('id', $appId)
            ->first();

        if (! $app) {
            return null;
        }

        return new App(
            $app['id'],
            $app['key'],
            $app['secret'],
            $app['maxConnections'] ?? -1
        );
    }
}
