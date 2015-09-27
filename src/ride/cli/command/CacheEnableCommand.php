<?php

namespace ride\cli\command;

/**
 * Command to enable the cache
 */
class CacheEnableCommand extends AbstractCommand {

    /**
     * Initializes the command
     * @return null
     */
    protected function initialize() {
        $this->setDescription('Enables the cache');

        $this->addArgument('name', 'Name of the cache to enable', false);
    }

    /**
     * Executes the command
     * @param string $name Name of the cache to enable
     * @return null
     */
    public function invoke($name = null) {
        if ($name) {
            $control = $this->dependencyInjector->get('ride\\library\\cache\\control\\CacheControl', $name);
            if ($control->canToggle()) {
                $control->enable();
            }
        } else {
            $controls = $this->dependencyInjector->getAll('ride\\library\\cache\\control\\CacheControl');
            foreach ($controls as $control) {
                if ($control->canToggle()) {
                    $control->enable();
                }
            }
        }
    }

}
