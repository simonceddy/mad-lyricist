<?php
namespace Eddy\MadLyricist;

use Symfony\Component\Console\Command\Command;

class GenerateSongCommand extends Command
{
    protected function configure()
    {
        $this->setName('gen:song');
    }
}
