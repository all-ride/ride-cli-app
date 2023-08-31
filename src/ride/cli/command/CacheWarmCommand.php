<?php

namespace ride\cli\command;

/**
 * Command to warm the cache
 */
class CacheWarmCommand extends AbstractCommand {

    /**
     * Initializes the command
     * @return null
     */
    protected function initialize() {
        $this->setDescription('Warms up the cache');

        $this->addArgument('name', 'Name of the cache to warm', false);
        $this->addFlag('skip', 'Name of the caches, separated by a comma, to skip when warming');
    }

    /**
     * Executes the command
     * @param string $name Name of the cache to clear
     * @param string $skip Name of the caches, separated by a comma, to skip when clearing
     * @return null
     */
    public function invoke($name = null, $skip = null) {
        if ($name) {
            $control = $this->dependencyInjector->get('ride\\library\\cache\\control\\CacheControl', $name);
            $control->warm();

            return;
        }

        if ($skip) {
            $skip = explode(',', $skip);
        }

        $controls = $this->dependencyInjector->getAll('ride\\library\\cache\\control\\CacheControl');
        foreach ($controls as $value => $control) {
            if (in_array($value, $skip)) {
                continue;
            }

            $control->warm();
        }
    }

}
