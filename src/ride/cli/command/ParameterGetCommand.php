<?php

namespace ride\cli\command;

/**
 * Command to get a configuration parameter
 */
class ParameterGetCommand extends AbstractParameterCommand {

    /**
     * Initializes the command
     * @return null
     */
    protected function initialize() {
        $this->setDescription('Gets the value of a parameter');

        $this->addArgument('key', 'Key of the parameter');
    }

    /**
     * Executes the command
     * @param string $key Key of the parameter
     * @return null
     */
    public function invoke($key) {
    	$value = $this->config->get($key);

    	$this->output->writeLine(var_export($value, true));
    }

}
