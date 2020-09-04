<?php

namespace spec\Eddy\MadLyricist;

use Eddy\MadLyricist\Song;
use PhpSpec\ObjectBehavior;

class SongSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(['one', 'two', 'three'], 'Test Title');
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType(Song::class);
    }

    function it_has_a_title()
    {
        $this->title()->shouldReturn('Test Title');
    }

    function it_has_lyrics()
    {
        $this->lyrics()->shouldBeArray();
        $this->lyrics(true)->shouldBeString();
    }
}
