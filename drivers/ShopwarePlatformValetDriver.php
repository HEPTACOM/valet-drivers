<?php

class ShopwarePlatformValetDriver extends SymfonyValetDriver
{
    /**
     * Determine if the incoming request is for a static file.
     *
     * @param  string  $sitePath
     * @param  string  $siteName
     * @param  string  $uri
     * @return string|false
     */
    public function isStaticFile($sitePath, $siteName, $uri)
    {
        if (stripos($uri, '/recovery/install/assets/') === 0) {
            $uri = substr($uri, strlen('/recovery/install/assets/'));

            return $sitePath . '/public/recovery/assets/' . $uri;
        }

        return parent::isStaticFile($sitePath, $siteName, $uri);
    }

    /**
     * Get the fully resolved path to the application's front controller.
     *
     * @param  string  $sitePath
     * @param  string  $siteName
     * @param  string  $uri
     * @return string
     */
    public function frontControllerPath($sitePath, $siteName, $uri)
    {
        if (stripos($uri, '/recovery/install/index.php') === 0) {
            return $sitePath . '/public/recovery/install/index.php';
        }

        return parent::frontControllerPath($sitePath, $siteName, $uri);
    }
}