<?php

namespace spec\Eddy\MadLyricist;

use Eddy\MadLyricist\Song;
use Eddy\MadLyricist\SongGenerator;
use Faker\Generator as Faker;
use PhpSpec\ObjectBehavior;

class SongGeneratorSpec extends ObjectBehavior
{
    function let(Faker $faker)
    {
        $this->beConstructedWith($faker);
    }
    
    function it_is_initializable()
    {
        $this->shouldHaveType(SongGenerator::class);
    }

    function it_wraps_the_underlying_faker_instance()
    {
        $this->faker()->shouldBeAnInstanceOf(Faker::class);
    }

    function it_creates_a_new_song_instance(Faker $faker)
    {
        $faker->paragraphs(3, false)->shouldBeCalled();
        $faker->paragraphs(3, false)->willReturn(['one', 'two', 'three']);

        $this->beConstructedWith($faker);
        $this->make(['noTitle' => true])->shouldBeAnInstanceOf(Song::class);
    }
}
