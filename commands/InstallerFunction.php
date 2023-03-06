<?php

namespace PandaWP\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\{InputInterface};
use Symfony\Component\Console\Output\OutputInterface;

class InstallerFunction extends Command {
    protected $commandName = 'install';
    protected $commandDescription = 'Panda WP installer';

    protected $hostname;
    protected $theme;

    protected function configure() {
        $this
            ->setName($this->commandName)
            ->setDescription($this->commandDescription);
    }

    protected function execute(InputInterface $input, OutputInterface $output) {
        $this->hostname = readline('> Hostname: ');

        $currentDir = explode('\\', getcwd());

        $this->theme = $currentDir[count($currentDir) - 1];

        if ($this->hostname) {
            shell_exec('cp .env.example .env');

            echo "\033[1;32m";
            echo "---------------------------------------------\n";
            echo ">>> 1. Instalando dependecias NPM (Vue)      |\n";
            echo "---------------------------------------------\n";

            shell_exec('cd resources/vue && npm install && cd ../..');

            echo "\033[1;32m";
            echo "---------------------------------------------\n";
            echo ">>> 2. Instalando dependecias NPM (Admin)    |\n";
            echo "---------------------------------------------\n";

            shell_exec('cd resources/admin && npm install && cd ../..');

            echo "\033[1;32m";
            echo "---------------------------------------------\n";
            echo ">>> 3. Configurando ambientes frontend       |\n";
            echo "---------------------------------------------\n";

            $this->settingVueEnviroment($this->hostname, $this->theme);
            $this->settingAdminEnviroment($this->hostname, $this->theme);

            echo "\033[1;32m";
            echo "----------------------------------------------------------\n";
            echo ">>> 4. Vue Frontend: Building project in development mode |\n";
            echo "----------------------------------------------------------\n";

            echo "\033[33m";
            echo shell_exec('npm run vue:stage');

            echo "\033[1;32m";
            echo "------------------------------------------------------------\n";
            echo ">>> 5. Admin Frontend: Building project in development mode |\n";
            echo "------------------------------------------------------------\n";

            echo "\033[33m";
            echo shell_exec('npm run admin:stage');

            echo "\033[0;36m";
            echo "                                                    \n";
            echo "                               _                    \n";
            echo "                              | |                   \n";
            echo "         _ __   __ _ _ __   __| | __ _              \n";
            echo "        | '_ \\ / _` | '_ \\ / _` |/ _` |             \n";
            echo "        | |_) | (_| | | | | (_| | (_| |             \n";
            echo "        | .__/ \\__,_|_| |_|\\__,_|\\__,_|             \n";
            echo "        | |                                         \n";
            echo "        |_|                                         \n";
            echo "                                                    \n";
            echo "       ¡Panda WP instalado exitosamente!            \n";
            echo "                                                    \n";
            echo "                                                    \n";

            $response = 'Made with ❤️  by Cleiver + Lili';
        } else {
            $response = 'Error: Necesita ingresar el hostname del proyecto';
        }

        $output->writeln($response);

        return Command::SUCCESS;
    }

    protected function settingVueEnviroment($hostname, $theme) {
        $fileEnvPath        = 'resources/vue/.env';
        $fileEnvStagePath   = 'resources/vue/.env.staging';

        shell_exec("cp resources/vue/.env.example resources/vue/.env");

        $envFile    = file_get_contents($fileEnvPath);
        $envFile    = str_replace(['pandawp.site'], $hostname, $envFile);
        $envFile    = str_replace(['pandawp'], $theme, $envFile);

        file_put_contents($fileEnvPath, $envFile);

        shell_exec("cp resources/vue/.env resources/vue/.env.staging");        

        $envStageFile   = file_get_contents($fileEnvStagePath);
        $envStageFile   = str_replace(['NODE_ENV=development'], 'NODE_ENV=production', $envStageFile);
        $envStageFile   = str_replace(['VUE_APP_MODE=\'development\''], 'VUE_APP_MODE=\'staging\'', $envStageFile);

        file_put_contents($fileEnvStagePath, $envStageFile);
    }

    protected function settingAdminEnviroment($hostname, $theme) {
        $fileEnvPath = 'resources/admin/src/config.json';

        shell_exec("cp resources/admin/src/config.example.json resources/admin/src/config.json");

        $envFile    = file_get_contents($fileEnvPath);
        $envFile    = str_replace(['pandawp.site'], $hostname, $envFile);
        $envFile    = str_replace(['pandawp'], $theme, $envFile);

        file_put_contents($fileEnvPath, $envFile);
    }
}
