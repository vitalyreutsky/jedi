<?php

namespace App\Acf\Blocks\General;

use App\Acf\Blocks\Helpers\Block;
use App\Acf\Blocks\RegisterBlock;

final class Features implements \App\Acf\Blocks\Helpers\BlockItem
{

    public static function setBlockParams(): void
    {
        RegisterBlock::addBlock(
            new Block(
                'features',
                'Features',
                'Features block',
                'templates/blocks/features.php',
                '',
                '',
                array(
                    'align' => false,
                    'mode'  => false,
                    'jsx'   => true,
                    'anchor' => true,
                ),
                array(
                    'title'       => "features block",
                    'description' => "features block"
                ),
                'block-default',
                'jedi'
            )
        );
    }
}
