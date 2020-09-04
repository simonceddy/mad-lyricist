<?php

namespace spec\Eddy\MadLyricist;

use Eddy\MadLyricist\GenerateSongCommand;
use Eddy\MadLyricist\SongGenerator;
use Eddy\MadLyricist\StoreSongToTxt;
use PhpSpec\ObjectBehavior;

class GenerateSongCommandSpec extends ObjectBehavior
{
    function let(SongGenerator $songGenerator, StoreSongToTxt $store)
    {
        $this->beConstructedWith($songGenerator, $store);
    }
    

    function it_is_initializable()
    {
        $this->shouldHaveType(GenerateSongCommand::class);
    }
}
