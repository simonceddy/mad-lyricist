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
        $verses = $this->makeParagraphs(
            isset($options['verses']) ? $options['verses'] : 3
        );

        // TODO generate chorus if option set
        if (isset($options['choruses']) && $options['choruses'] === true) {
            $chorus = $this->makeParagraphs(1)[0];
            $lastKey = array_key_last($verses);

            $lyrics = [];
            foreach ($verses as $key => $verse) {
                // dump($key);
                $lyrics[] = $verse;
                if ($key === $lastKey) {
                    continue;
                }
                $lyrics[] = $chorus;
            }
            // dd($lyrics);
            return $lyrics;
        }
        return $verses;
    }

    protected function makeTitle(array $options)
    {
        // dd($options);
        if (!isset($options['title']) || !is_string($options['title'])) {
            if (!isset($options['noTitle']) || $options['noTitle'] !== true) {
                // dd('generating title');
                return $this->faker->words(mt_rand(1, 12), true);
            }
            // dd('here');
            return '';
        }
        // dd('returning title:', $options['title']);
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
