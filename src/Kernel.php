<?php declare(strict_types=1);

namespace Heptacom\ValetDrivers;

use DirectoryIterator;

class Kernel
{
	public static function setup()
	{
		$sourcePath = __DIR__ . '/../drivers/';
		$targetPath = getenv('HOME') . '/.config/valet/Drivers/';

		$iterator = new DirectoryIterator($sourcePath);
		foreach ($iterator as $fileinfo) {
			if ($fileinfo->isDot()) {
				continue;
			}

			if (is_file($targetPath . $fileinfo->getFilename())) {
				unlink($targetPath . $fileinfo->getFilename());
			}

			symlink(
				$sourcePath . $fileinfo->getFilename(),
				$targetPath . $fileinfo->getFilename()
			);
		}

		echo ' [OK] Custom valet drivers have been installed.' . PHP_EOL;
	}
}
