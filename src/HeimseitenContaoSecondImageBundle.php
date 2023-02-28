<?php

declare(strict_types=1);

/*
 * This file is part of Contao Second Image Bundle.
 *
 * (c) heimseiten.de - Webdesign aus Köln 2023 <info@heimseiten.de>
 * @license GPL-3.0-or-later
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 * @link https://github.com/heimseiten/contao-second-image-bundle
 */

namespace Heimseiten\ContaoSecondImageBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class HeimseitenContaoSecondImageBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }

    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container): void
    {
        parent::build($container);

    }
}
