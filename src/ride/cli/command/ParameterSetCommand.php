<?php

namespace ride\cli\command;

/**
 * Command to set a configuration parameter
 */
class ParameterSetCommand extends AbstractParameterCommand {

    /**
     * Initializes the command
     * @return null
     */
    protected function initialize() {
        $this->setDescription('Sets a parameter');

        $this->addArgument('key', 'Key of the parameter');
        $this->addArgument('value', 'Value for the parameter', true, true);
    }

    /**
     * Executes the command
     * @param string $key Key of the parameter
     * @param string $value Value for the parameter
     * @return null
     */
    public function invoke($key, $value) {
    	$this->config->set($key, $value);
    }

}
