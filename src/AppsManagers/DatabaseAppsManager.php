<?php

namespace RenokiCo\EchoServer\AppsManagers;

use RenokiCo\EchoServer\Contracts\AppsManager;

class DatabaseAppsManager implements AppsManager
{
    /**
     * Find an application by ID.
     *
     * @param  string  $appId
     * @return null|\RenokiCo\EchoServer\AppsManagers\App
     */
    public function find(string $appId)
    {
        $model = config('echo-server.app-manager.database.model');

        $app = $model::find($appId);

        if (! $app) {
            return null;
        }

        return new App(
            $app->id,
            $app->key,
            $app->secret,
            $app->max_connections,
            $app->allowed_origins
        );
    }
}
