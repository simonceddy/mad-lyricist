<?php
namespace Eddy\MadLyricist;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateSongCommand extends Command
{
    private SongGenerator $songGenerator;

    private StoreSongToTxt $storage;

    public function __construct(
        SongGenerator $songGenerator,
        StoreSongToTxt $storage
    ) {
        parent::__construct();
        $this->storage = $storage;
        $this->songGenerator = $songGenerator;
    }

    protected function configure()
    {
        $this->setName('gen:song')
            ->setDescription(
                'Generates a song full of gibberish and saves it as a text file'
            )
            ->addOption(
                'title',
                'T',
                InputOption::VALUE_REQUIRED,
                'Specify the song title'
            )
            ->addOption(
                'noTitle',
                'N',
                InputOption::VALUE_NONE,
                'Do not generate a title'
            )
            ->addOption(
                'verses',
                'A',
                InputOption::VALUE_REQUIRED,
                'Number of verses to generate'
            )
            ->addOption(
                'display',
                'D',
                InputOption::VALUE_NONE,
                'Display the song in console instead of storing to file.'
            )
            ->addOption(
                'choruses',
                'C',
                InputOption::VALUE_NONE,
                'Add choruses between each verse'
            )
            ->addOption(
                'overwrite',
                'O',
                InputOption::VALUE_NONE,
                'Overwrite existing files'
            )
            ->addOption(
                'filename',
                'F',
                InputOption::VALUE_REQUIRED,
                'Store the song using the given filename. Sets --display to false.'
            )
            ->addOption(
                'dir',
                'L',
                InputOption::VALUE_REQUIRED,
                'Specify a directory to store text files in'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        // get options
        $options = SongOptions::make($input->getOptions());

        // create song object
        $song = $this->songGenerator->make($options->toArray());
        // dd($options);
        
        if ($options['display']) {
            $output->writeln(
                '<info>' . mb_strtoupper($song->title()) . '</info>' . PHP_EOL
            );
            $output->writeln($song);
            return 1;
        }
        
        // TODO handle custom directory
        try {
            $this->storage->store(
                $song,
                $options['dir'] ?: null,
                $options['filename'] ?: null,
                $options['overwrite']
            );
            
        } catch (\Throwable $e) {
            // TODO verbosity
            $output->writeln('<error>ERROR</error>');
            $output->writeln($e->getMessage());
        }

        return 1;
    }
}
