<?php

namespace Valet\Drivers\Custom;

use Valet\Drivers\Specific\SymfonyValetDriver;

class ShopwarePlatformValetDriver extends SymfonyValetDriver
{
    /**
     * Determine if the incoming request is for a static file.
     *
     * @return string|false
     */
    public function isStaticFile(string $sitePath, string $siteName, string $uri)
    {
        if (stripos($uri, '/recovery/install/assets/') === 0) {
            $uri = substr($uri, strlen('/recovery/install/assets/'));

            return $sitePath . '/public/recovery/assets/' . $uri;
        }

        return parent::isStaticFile($sitePath, $siteName, $uri);
    }

    /**
     * Get the fully resolved path to the application's front controller.
     */
    public function frontControllerPath(string $sitePath, string $siteName, string $uri): ?string
    {
        if (stripos($uri, '/recovery/install/index.php') === 0) {
            return $sitePath . '/public/recovery/install/index.php';
        }

        return parent::frontControllerPath($sitePath, $siteName, $uri);
    }
}
