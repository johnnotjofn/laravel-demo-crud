<?php

namespace App\Helper\Routes;

class RouteHelper
{
    /**
     * @param string $folder
     * @return void
     */
    public static function includeRouteFiles(string $folder): void
    {
        // iterate through the v1 folder recursively
        $dirIterator = new \RecursiveDirectoryIterator($folder);
        $it = new \RecursiveIteratorIterator($dirIterator);
        while ($it->valid()) {
            if (!$it->isDot() && $it->isFile() && $it->isReadable() && $it->current()->getExtension() === 'php') {
                require($it->key());
            }
//            dump($it->key());
            $it->next();
        }
    }
}
