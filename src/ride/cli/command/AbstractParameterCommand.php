<?php

namespace ride\cli\command;

use ride\library\cli\input\AutoCompletable;
use ride\library\config\Config;
use ride\library\config\ConfigHelper;
use ride\library\dependency\DependencyInjector;

/**
 * Abstract parameter command which provides auto completion
 */
abstract class AbstractParameterCommand extends AbstractCommand implements AutoCompletable {

    /**
     * Instance of the config
     * @var \ride\library\config\Config
     */
    protected $config;

    /**
     * Instance of the config helper
     * @var \ride\library\config\ConfigHelper
     */
    protected $configHelper;

    /**
     * Constructs a new abstract command
     * @param \ride\library\dependency\DependencyInjector $dependencyInjector
     * @param string $name Name of the command
     * @return null
     */
    public function __construct(DependencyInjector $dependencyInjector, Config $config, ConfigHelper $configHelper) {
        parent::__construct($dependencyInjector);

        $this->config = $config;
        $this->configHelper = $configHelper;
    }

    /**
     * Performs auto complete on the provided input
     * @param string $input Input value to auto complete
     * @return array Array with the auto completion matches
     */
    public function autoComplete($input) {
        $completion = array();

        if (strpos($input, ' ') !== false) {
            return $completion;
        }

        $values = $this->config->getAll();
        $values = $this->configHelper->flattenConfig($values);

        foreach ($values as $key => $value) {
            if (strpos($key, $input) !== 0) {
                continue;
            }

            $completion[] = $key;
        }

        return $completion;
    }

}
