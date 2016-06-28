<?php
namespace Gharkin;

use Symfony\Component\Console\Command\Command as BaseCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Tests\AbstractTest;
use Gharkin\Order;

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
                'Discount class id (3for2 || BuyShampooGetConditionerFor50off)'
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $file = $input->getArgument('file');

        $discount = $input->getOption('discount');

        $order = new Order($file);

        if ($discount) {
            // 3for2 |
            $class = "Gharkin\\Discounts\\Discount$discount";

            $order->addDiscount(new $class);
        }

        $total = $order->getTotal();

        echo $total;

        return $order->getTotal();
    }
}