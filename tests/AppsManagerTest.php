<?php

namespace RenokiCo\EchoServer\Test;

use RenokiCo\EchoServer\Models\EchoApp;

class AppsManagerTest extends TestCase
{
    public function test_retrieve_with_array()
    {
        $this->json('GET', route('echo-server.app.show', ['app' => 'echo-app', 'token' => 'echo-app-token']))
            ->assertOk()
            ->assertJson([
                'app' => [
                    'id' => 'echo-app',
                    'key' => 'echo-app-key',
                    'secret' => 'echo-app-secret',
                    'maxConnections' => -1,
                ],
            ]);

        $this->json('GET', route('echo-server.app.show', ['app' => 'echo-app-wrong', 'token' => 'echo-app-token']))
            ->assertNotFound();

        $this->json('GET', route('echo-server.app.show', ['app' => 'echo-app', 'token' => 'echo-app-token-wrong']))
            ->assertUnauthorized();
    }

    public function test_retrieve_with_database()
    {
        $this->app['config']->set('echo-server.app-manager.driver', 'database');

        $app = factory(EchoApp::class)->create([
            'key' => 'echo-app-key',
            'secret' => 'echo-app-secret',
            'maxConnections' => 100,
        ]);

        $this->json('GET', route('echo-server.app.show', ['app' => $app->id, 'token' => 'echo-app-token']))
            ->assertOk()
            ->assertJson([
                'app' => [
                    'id' => $app->id,
                    'key' => $app->key,
                    'secret' => $app->secret,
                    'maxConnections' => $app->maxConnections,
                ],
            ]);

        $this->json('GET', route('echo-server.app.show', ['app' => 'echo-app-wrong', 'token' => 'echo-app-token']))
            ->assertNotFound();

        $this->json('GET', route('echo-server.app.show', ['app' => 'echo-app', 'token' => 'echo-app-token-wrong']))
            ->assertUnauthorized();
    }
}
