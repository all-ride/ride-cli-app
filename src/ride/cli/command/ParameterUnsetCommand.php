<?php

namespace ride\cli\command;

/**
 * Command to unset a configuration parameter
 */
class ParameterUnsetCommand extends AbstractParameterCommand {

    /**
     * Initializes the command
     * @return null
     */
    protected function initialize() {
        $this->setDescription('Unsets a parameter');

        $this->addArgument('key', 'Key of the parameter');
    }

    /**
     * Executes the command
     * @param string $key Key of the parameter
     * @return null
     */
    public function invoke($key) {
    	$this->config->set($key, null);
    }

}
