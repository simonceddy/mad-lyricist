<?php

namespace spec\Eddy\MadLyricist;

use Eddy\MadLyricist\SongOptions;
use PhpSpec\ObjectBehavior;

class SongOptionsSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedThrough('make', [[]]);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(SongOptions::class);
    }
}
