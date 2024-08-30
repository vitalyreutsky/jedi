<?php

namespace App\Acf\Blocks\General;

use App\Acf\Blocks\Helpers\Block;
use App\Acf\Blocks\RegisterBlock;

final class Projects implements \App\Acf\Blocks\Helpers\BlockItem
{

    public static function setBlockParams(): void
    {
        RegisterBlock::addBlock(
            new Block(
                'projects',
                'Projects',
                'Projects block',
                'templates/blocks/projects.php',
                '',
                '',
                array(
                    'align' => false,
                    'mode'  => false,
                    'jsx'   => true,
                    'anchor' => true,
                ),
                array(
                    'title'       => "Projects block",
                    'description' => "Projects block"
                ),
                'block-default',
                'jedi'
            )
        );
    }
}
