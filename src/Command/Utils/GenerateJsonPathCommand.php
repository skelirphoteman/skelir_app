<?php


namespace App\Command\Utils;


use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\Routing\RouterInterface;

class GenerateJsonPathCommand extends Command
{
    protected static $defaultDescription = 'Generate new json file to listing app\'s path.';


    public function __construct(
        private RouterInterface $router,
        private KernelInterface $kernel)
    {
        parent::__construct();
    }

    // ...
    protected function configure(): void
    {
        $this
            ->setName('route:generate:list')
            ->setHelp('This command generate and sort all app\'s routes into json file')
        ;
    }

    public function execute(InputInterface $input, OutputInterface $output) : int
    {
        $io                 = new SymfonyStyle($input, $output);

        $io->title('Welcome to the Json File Routes Generator');

        $routes             = $this->router->getRouteCollection();

        $routesArray        = [];

        $io->writeln('Grouping all routes by modules...');

        $groupProgressBar    = $io->createProgressBar($routes->count());
        $groupProgressBar->setFormat('very_verbose');
        foreach ($routes->all() as $name => $route)
        {
            $groupProgressBar->advance();
            $module = explode('/', $route->getPath(), 3);

            $routesArray[$module[1]][$name] = [
                'name'  => $name,
                'path'  => $route->getPath(),
            ];
        }
        $groupProgressBar->finish();

        $io->writeln("Generate json file(s)");

        $jsonProgressBar    = $io->createProgressBar(count($routesArray));
        $jsonProgressBar->setFormat('very_verbose');
        /**
         * @var String $name
         * @var array $module
         */
        foreach ($routesArray as $name => $module){
            $jsonProgressBar->advance(1);
            $json       = json_encode($module);
            $routesPath = $this->kernel->getProjectDir() . '/assets/App/Routes';

            if(!file_exists($routesPath)){
                mkdir($routesPath, 0777);
            }
            file_put_contents($routesPath . '/' . $name . '.json', $json);

        }

        $jsonProgressBar->finish();
        $io->success('All files were generate !');
        return Command::SUCCESS;
    }

}