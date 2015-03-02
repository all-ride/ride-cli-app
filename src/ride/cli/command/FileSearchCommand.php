<?php

namespace ride\cli\command;

use ride\library\system\file\browser\FileBrowser;

/**
 * Command to search for files relative to the directory structure
 */
class FileSearchCommand extends AbstractCommand {

    /**
     * Initializes the command
     * @return null
     */
    protected function initialize() {
        $this->setDescription('Search for files relative to the directory structure.');

        $this->addArgument('path', 'Relative path of the file');
    }

    /**
     * Executes the command
     * @param \ride\library\system\file\browser\FileBrowser $fileBrowser
     * @param string $path Relative path of the file
     * @return null
     */
    public function invoke(FileBrowser $fileBrowser, $path) {
        $file = ltrim($path, '/');

        $this->output->writeLine('Application files:');

        $files = $fileBrowser->getFiles($file);
        if ($files) {
            foreach ($files as $f) {
                $this->output->writeLine('- ' . $f);
            }
        } else {
            $this->output->writeLine('<none>');
        }

        $this->output->writeLine('');

        $hasPublic = false;
        $this->output->writeLine('Public files:');

        $publicFile = $fileBrowser->getPublicDirectory()->getChild($file);
        if ($publicFile->exists()) {
            $this->output->writeLine('- ' . $file);

            $hasPublic = true;
        }

        $files = $fileBrowser->getFiles($fileBrowser->getPublicPath() . '/' . $file);
        if ($files) {
            foreach ($files as $f) {
                $this->output->writeLine('- ' . $f);
            }
        } elseif (!$hasPublic) {
            $this->output->writeLine('<none>');
        }

        $this->output->writeLine('');
    }

}
