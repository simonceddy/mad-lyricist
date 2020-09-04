<?php
namespace Eddy\MadLyricist;

use Faker\Generator as Faker;

class SongGenerator
{
    protected Faker $faker;

    public function __construct(Faker $faker)
    {
        $this->faker = $faker;
    }

    protected function makeParagraphs(int $nb = 3)
    {
        return $this->faker->paragraphs($nb, false);
    }

    protected function makeLyrics(array $options)
    {
        return $this->makeParagraphs(
            isset($options['verses']) && is_int($options['verses'])
                ? $options['verses']
                : 3
        );
    }

    protected function makeTitle(array $options)
    {
        if (!isset($options['title'])) {
            if (!isset($options['no_title']) || $options['no_title'] !== true) {
                return $this->faker->words(mt_rand(1, 12), true);
            }
            return '';
        }
        return $options['title'];
    }

    public function faker()
    {
        return $this->faker;
    }

    public function make(array $options = [])
    {
        return new Song(
            $this->makeLyrics($options),
            $this->makeTitle($options)
        );
    }
}
