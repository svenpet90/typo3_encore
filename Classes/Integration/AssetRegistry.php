<?php
declare(strict_types = 1);

namespace Ssch\Typo3Encore\Integration;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use TYPO3\CMS\Core\Utility\GeneralUtility;

final class AssetRegistry implements AssetRegistryInterface
{
    /**
     * @var array
     */
    private $registeredFiles = [];

    /**
     * @var array
     */
    private $defaultAttributes = [];

    public function registerFile(string $file, string $type)
    {
        if (!isset($this->registeredFiles[$type])) {
            $this->registeredFiles[$type] = [];
        }

        $this->registeredFiles[$type][] = GeneralUtility::createVersionNumberedFilename($file);
    }

    public function getRegisteredFiles(): array
    {
        return $this->registeredFiles;
    }

    public function getDefaultAttributes(): array
    {
        return $this->defaultAttributes;
    }
}
