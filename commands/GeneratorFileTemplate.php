<?php


namespace PandaWP\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\{InputOption, InputInterface};
use Symfony\Component\Console\Output\OutputInterface;

class GeneratorFileTemplate extends Command
{
    protected $commandName = 'make:template';
    protected $commandDescription = 'Create template';

    protected $commanOptionFileName = 'filename';
    protected $commanOptionFileDescription = '';

    protected $commanOptionTemplateName = 'template_name';
    protected $commanOptionTemplateDescription = '';

    protected $filename;
    protected $templateName;

    protected function configure()
    {
        $this
            ->setName($this->commandName)
            ->setDescription($this->commandDescription)
            ->addOption(
                $this->commanOptionFileName,
                null,
                InputOption::VALUE_REQUIRED,
                $this->commanOptionFileDescription
            )
            ->addOption(
                $this->commanOptionTemplateName,
                null,
                InputOption::VALUE_REQUIRED,
                $this->commanOptionTemplateDescription
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->filename = $input->getOption('filename');
        $this->templateName = $input->getOption('template_name');

        if ( $this->filename != NULL && $this->templateName != NULL ) {
            if ( ! file_exists("app/template-{$this->filename}.php") ) {
                $this->createFile();
                $res = 'Created file.';
            } else {
                $res = 'El Archivo existe';
            }
        } else {
            $res = 'Error';
        }

        $output->writeln($res);
    }

    protected function createFile()
    {
        file_put_contents(
            "app/template-{$this->filename}.php",
            $this->compileFileStub()
        );
    }

    protected function compileFileStub()
    {
        return str_replace(
            '{{template_name}}',
            $this->templateName,
            file_get_contents("commands/stubs/templates/template.stub")
        );
    }
}
