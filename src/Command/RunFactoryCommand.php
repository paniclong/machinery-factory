<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpClient\HttpClient;
use Symfony\Component\HttpFoundation\Response;

class RunFactoryCommand extends Command
{
    protected static $defaultName = 'app:run-factory';

    /**
     * Стандартная задержка
     */
    private const DEFAULT_DELAY = 5;

    /**
     * Минимальная задержка, проставляется когда введеное значение меньше нижнего порога
     */
    private const MINIMUM_DELAY = 1;

    /**
     * Нижний порог, когда необходимо выставить минимальную задержку
     */
    private const LOWER_THRESHOLD_DELAY = 0;

    protected function configure(): void
    {
        $this
            ->setHelp('Включает фабрику по производству машин')
            ->addArgument(
                'delay',
                InputArgument::OPTIONAL,
                'Задержка производства (не чаще чем в 1 сек)',
                self::DEFAULT_DELAY
            );
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     *
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln([
            'Cars creator',
            '=========================================',
            '',
        ]);

        $delay = (int)$input->getArgument('delay');
        $delay = $delay > self::LOWER_THRESHOLD_DELAY ? $delay : self::MINIMUM_DELAY;

        $output->writeln([
            'Set delay - ' . $delay . ' second',
            ''
        ]);

        $client = HttpClient::create();

        try {
            for (; ;) {
                $response = $client->request('GET', 'http://172.17.0.1/api/cars/create/');

                $body = $response->getStatusCode() === Response::HTTP_OK
                    ? \json_decode($response->getContent(), true)
                    : '';

                $output->writeln([
                    'Create car',
                    'ID - ' . $body['id'],
                    '',
                ]);

                \sleep($delay);
            }
        } catch (\Throwable $ex) {
            echo $ex->getMessage();

            return -1;
        }

        return 0;
    }
}
