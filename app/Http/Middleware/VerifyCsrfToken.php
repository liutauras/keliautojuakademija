<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     * atmetame csrf tikrinima nes tai isorinis serveris daro call i musu svetaine
     *
     * @var array
     */
    protected $except = [
        '/*/webhook',
    ];
}
