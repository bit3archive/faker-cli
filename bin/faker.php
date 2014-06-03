#!/usr/bin/env php
<?php

require(__DIR__ . '/../vendor/autoload.php');

class FakerApplication extends \Symfony\Component\Console\Application
{
	public function __construct()
	{
		parent::__construct('Faker Command Line Tool', '@package_version@');
	}

	protected function getCommandName(\Symfony\Component\Console\Input\InputInterface $input)
	{
		return 'faker:generate';
	}

	protected function getDefaultCommands()
	{
		$defaultCommands   = parent::getDefaultCommands();
		$defaultCommands[] = new \Bit3\FakerCli\Command\GenerateCommand();
		return $defaultCommands;
	}

	public function getDefinition()
	{
		$inputDefinition = parent::getDefinition();
		$inputDefinition->setArguments();
		return $inputDefinition;

	}
}

$application = new FakerApplication();
$application->run();
