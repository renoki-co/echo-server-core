<?php

namespace RenokiCo\EchoServer\Models;

use Illuminate\Database\Eloquent\Model;

class EchoApp extends Model
{
    /**
     * {@inheritdoc}
     */
    protected $guarded = [];

    /**
     * {@inheritdoc}
     */
    protected $hidden = [
        'secret',
    ];
}
