<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Illuminate\Http\Middleware\TrustProxies as Middleware;

class TrustProxies extends Middleware
{
    /**
     * Los proxies confiables de esta aplicación.
     *
     * @var array|string|null
     */
    protected $proxies = '*'; // Confía en todos los proxies, como los de Railway

    /**
     * Los encabezados que deben usarse para detectar proxies.
     *
     * @var int
     */
    protected $headers = Request::HEADER_X_FORWARDED_ALL;
}
