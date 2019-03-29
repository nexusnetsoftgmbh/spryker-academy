<?php


namespace Nexus\Project\Communication\Command\Spryker;


use Nexus\Project\Communication\Command\AbstractNexusCliCommand;
use SprykerSdk\Zed\SprykGui\Communication\Form\Type\ArgumentType;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ConsoleProjectCommand extends AbstractNexusCliCommand
{
    protected function configure()
    {
        $this
            ->setName('project:spryker:console')
            ->setDescription('Run spryker console command')
            ->addArgument('cmd', InputArgument::OPTIONAL, 'Command', '')
            ->addArgument('store', InputArgument::OPTIONAL, 'Store', 'DE');
    }

    /**
     * @param \Symfony\Component\Console\Input\InputInterface $input
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     *
     * @return int|null|void
     * @throws \Core\Locator\Dynamic\ServiceNotParseable
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $command = $input->getArgument('cmd');
        $store = $input->getArgument('store');
        $visibility = $output->isVerbose() ? '-vvv' : '';

        $response = '';

        $response .= $this->runNexusCli(
            sprintf(
                'docker:exec spy_php "bash -c \"APPLICATION_STORE=%s php /data/shop/development/current/vendor/bin/console %s %s\""',
                strtoupper($store),
                $command,
                $visibility
            )
        );

        if ($output->isVerbose()) {
            $output->writeln($response);
        }
    }
}