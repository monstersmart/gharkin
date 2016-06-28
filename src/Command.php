<?php
namespace Gharkin;

use Symfony\Component\Console\Command\Command as BaseCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class Command extends BaseCommand {

    protected function configure()
    {
        $this
            ->setName('sum')
            ->setDescription('Calculate total')
            ->addArgument(
                'file',
                InputArgument::REQUIRED,
                'Xml file'
            )
            ->addOption(
                'discount',
                null,
                InputOption::VALUE_OPTIONAL,
                'Discount class id'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $file = $input->getArgument('file');



        $discount = $input->getOption('discount');
    }
}