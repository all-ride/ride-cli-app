<?php

namespace ride\cli\command;

/**
 * Command to clear the cache
 */
class CacheClearCommand extends AbstractCommand {

    /**
     * Initializes the command
     * @return null
     */
    protected function initialize() {
        $this->setDescription('Clears all caches or a specific cache if provided');

        $this->addArgument('name', 'Name of the cache to clear', false);
        $this->addFlag('skip', 'Name of the caches, separated by a comma, to skip when clearing');
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
            $control->clear();

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

            $control->clear();
        }
    }

}
