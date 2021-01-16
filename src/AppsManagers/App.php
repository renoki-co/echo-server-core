<?php

namespace RenokiCo\EchoServer\AppsManagers;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

class App implements Arrayable, Jsonable
{
    /**
     * The app ID.
     *
     * @var string
     */
    public $id;

    /**
     * The app key.
     *
     * @var string
     */
    public $key;

    /**
     * The app secret.
     *
     * @var string
     */
    protected $secret;

    /**
     * The maximum amount of connexions.
     *
     * @var int
     */
    protected $maxConnections;

    /**
     * The patterns for allowed origins.
     *
     * @var array
     */
    protected $allowedOrigins;

    /**
     * Initialize the app.
     *
     * @param  string  $id
     * @param  string  $key
     * @param  string  $secret
     * @param  int  $maxConnections
     * @param  array  $allowedOrigins
     * @return void
     */
    public function __construct(
        string $id,
        string $key,
        string $secret,
        int $maxConnections,
        array $allowedOrigins
    ) {
        $this->id = $id;
        $this->key = $key;
        $this->secret = $secret;
        $this->maxConnections = $maxConnections;
        $this->allowedOrigins = $allowedOrigins;
    }

    /**
     * Get the instance as an array.
     *
     * @return array
     */
    public function toArray()
    {
        return [
            'id' => $this->id,
            'key' => $this->key,
            'secret' => $this->secret,
            'maxConnections' => $this->maxConnections,
            'allowedOrigins' => $this->allowedOrigins,
        ];
    }

    /**
     * Convert the object to its JSON representation.
     *
     * @param  int  $options
     * @return string
     */
    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }
}
