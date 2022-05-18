<?php

namespace App;

use Illuminate\Foundation\Application;

class AnythingApplication extends Application
{
    /**
     * The namespace for all real-time facades.
     *
     * @var string
     */
    protected static $facadeNamespace = '';

    // /**
    //  * Configure the real-time facade namespace.
    //  *
    //  * @param  string  $namespace
    //  * @return void
    //  */
    // public function provideFacades($namespace)
    // {
    //     AnythingAliasLoader::setFacadeNamespace($namespace);
    // }
}