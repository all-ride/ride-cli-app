<?php

namespace ride\cli\command;

/**
 * Command to disable the cache
 */
class CacheDisableCommand extends AbstractCommand {

    /**
     * Constructs a new cache disable command
     * @return null
     */
    protected function initialize() {
        $this->setDescription('Disables the cache');

        $this->addArgument('name', 'Name of the cache to disable', false);
    }

    /**
     * Executes the command
     * @param string $name Name of the cache to disable
     * @return null
     */
    public function invoke($name = null) {
        if ($name) {
            $control = $this->dependencyInjector->get('ride\\application\\cache\\control\\CacheControl', $name);
            if ($control->canToggle()) {
                $control->disable();
            }
        } else {
            $controls = $this->dependencyInjector->getAll('ride\\application\\cache\\control\\CacheControl');
            foreach ($controls as $control) {
                if ($control->canToggle()) {
                    $control->disable();
                }
            }
        }
    }

}
