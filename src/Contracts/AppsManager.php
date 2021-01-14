<?php

namespace Renokico\EchoServer\Contracts;

interface AppsManager
{
    /**
     * Find an application by ID.
     *
     * @param  string  $appId
     * @return null|\RenokiCo\EchoServer\AppsManagers\App
     */
    public function find(string $appId);
}
