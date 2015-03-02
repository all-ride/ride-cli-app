<?php

namespace ride\cli\command;

/**
 * Command to search for parameters in the configuration
 */
class ParameterSearchCommand extends AbstractParameterCommand {

    /**
     * Initializes the command
     * @return null
     */
    protected function initialize() {
        $this->setDescription('Show an overview of the defined parameters');

        $this->addArgument('query', 'Query to search the parameters', false, true);
    }

    /**
     * Executes the command
     * @param string $query Query to search the parameters
     * @return null
     */
    public function invoke($query = null) {
    	$values = $this->config->getAll();
    	$values = $this->configHelper->flattenConfig($values);

    	if ($query) {
    		foreach ($values as $key => $value) {
    			if (stripos($key, $query) !== false || stripos($value, $query) !== false) {
    				continue;
    			}

    			unset($values[$key]);
    		}
    	}

    	ksort($values);

    	foreach ($values as $key => $value) {
    		$this->output->writeLine($key . ' = ' . $value);
    	}
    }

}
