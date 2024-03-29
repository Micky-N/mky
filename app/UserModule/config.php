<?php



return [
    /*
     * -------------------------------------------------------------
     *  Prefix config
     * -------------------------------------------------------------
     *
     * url prefix
     *
     */
    'prefix' => '/',

    /*
     * -------------------------------------------------------------
     *  Views options
     * -------------------------------------------------------------
     *
     * Views mode directory for Twig (base by default, module, parent or both)
     * module mode must be an array with modules name
     *
     */
    'views_mode' => 'base',

    /*
     * -------------------------------------------------------------
     *  Route mode config
     * -------------------------------------------------------------
     *
     * Merge config in app file, replace route_mode config
     *
     */
    'app:route_mode' => 'controller',
    'mkyengine:layoutDir' => 'path'
];