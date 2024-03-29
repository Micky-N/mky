<?php

return [
    /*
     * -------------------------------------------------------------
     *  Module Middlewares
     * -------------------------------------------------------------
     *
     * List of middlewares that will be called before each route in the module
     *
     */
    'middlewares' => [
    ],

    /*
     * -------------------------------------------------------------
     *  Route Middlewares
     * -------------------------------------------------------------
     *
     * List of middlewares that will be defined in the routes by alias
     *
     */
    'routeMiddlewares' => [
	    'guest' => \App\Middlewares\GuestMiddleware::class,
	    'auth' => \App\Middlewares\AuthMiddleware::class,
    ],
];