<?php

namespace RenokiCo\EchoServer;

use Illuminate\Broadcasting\BroadcastManager;
use Illuminate\Support\ServiceProvider;
use Psr\Log\LoggerInterface;
use Pusher\Pusher;

class EchoServerServiceProvider extends ServiceProvider
{
    /**
     * Boot the service provider.
     *
     * @param  \Illuminate\Broadcasting\BroadcastManager  $broadcastManager
     * @return void
     */
    public function boot(BroadcastManager $broadcastManager)
    {
        //
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
