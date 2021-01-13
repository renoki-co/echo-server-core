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
        $broadcastManager->extend('socketio', function ($app, $config) {
            $pusher = new Pusher(
                $config['key'],
                $config['secret'],
                $config['app_id'],
                $config['options'] ?? []
            );

            if ($config['log'] ?? false) {
                $pusher->setLogger($this->app->make(LoggerInterface::class));
            }

            return new Broadcasters\EchoServerBroadcaster($pusher);
        });
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
