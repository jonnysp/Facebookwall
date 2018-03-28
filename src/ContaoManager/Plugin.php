<?php

namespace Jonnysp\Facebookwall\ContaoManager;

use Jonnysp\Facebookwall\JonnyspFacebookwall;
use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;


class Plugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser)
    {
        return [
            BundleConfig::create(JonnyspFacebookwall::class)
                ->setLoadAfter([ContaoCoreBundle::class])
                ->setReplace(['facebookwall']),
        ];
    }
}
