<?php

namespace ride\cli\command;

/**
 * Command to get an overview of the caches
 */
class CacheCommand extends AbstractCommand {

    /**
     * Initializes the command
     * @return null
     */
    protected function initialize() {
        $this->setDescription('Show an overview of the caches');
    }

    /**
     * Executes the command
     * @return null
     */
    public function invoke() {
        $controls = $this->dependencyInjector->getAll('ride\\library\\cache\\control\\CacheControl');

        ksort($controls);

        foreach ($controls as $name => $control) {
            $this->output->writeLine('[' . ($control->isEnabled() ? 'V' : ' ') . '] ' . $name . (!$control->canToggle() ? ' (locked)' : ''));
        }
    }

}
