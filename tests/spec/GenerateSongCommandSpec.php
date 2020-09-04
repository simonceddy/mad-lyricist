<?php

namespace spec\Eddy\MadLyricist;

use Eddy\MadLyricist\GenerateSongCommand;
use PhpSpec\ObjectBehavior;

class GenerateSongCommandSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(GenerateSongCommand::class);
    }
}
