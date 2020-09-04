<?php

namespace spec\Eddy\MadLyricist;

use Eddy\MadLyricist\SongExistsException;
use PhpSpec\ObjectBehavior;

class SongExistsExceptionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(SongExistsException::class);
    }

    function it_is_throwable()
    {
        $this->shouldHaveType(\Throwable::class);
    }
}
