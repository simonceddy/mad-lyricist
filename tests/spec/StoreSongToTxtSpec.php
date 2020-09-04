<?php

namespace spec\Eddy\MadLyricist;

use Eddy\MadLyricist\Song;
use Eddy\MadLyricist\StoreSongToTxt;
use PhpSpec\ObjectBehavior;
use Symfony\Component\Filesystem\Filesystem;

class StoreSongToTxtSpec extends ObjectBehavior
{
    function let(Filesystem $filesystem)
    {
        $this->beConstructedWith($filesystem);
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType(StoreSongToTxt::class);
    }

    function it_wraps_symfony_filesystem()
    {
        $this->filesystem()->shouldBeAnInstanceOf(Filesystem::class);
    }

    function it_stores_a_song_as_a_plain_text_file(
        Filesystem $filesystem,
        Song $song
    ) {
        $song->title()->willReturn('test song');
        $song->__toString()->willReturn('Test lyrics');

        $filesystem->dumpFile(
            getcwd() . '/test song.txt',
            'Test lyrics'
        )->shouldBeCalled();

        $this->store($song);
    }
}
