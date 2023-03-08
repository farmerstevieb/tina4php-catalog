<?php

/**
 * Tina4php-ecomm - ecomm Module
 * Copy-right 2007 - current Tina4
 * License: MIT https://opensource.org/licenses/MIT
 */

class Catalog extends Content
{
    private string $twigNamespace = "@tina4ecomm";

    /**
     * Get a different twig name space for changing dashboard and other screens
     * @return string
     */
    public function getTwigNameSpace(): string
    {
        if (defined("ECOMM_NAMESPACE")) {
            if (!empty(ECOMM_NAMESPACE)) {
                return ECOMM_NAMESPACE;
            } else {
                return "@__main__";
            }
        } else {
            return $this->twigNamespace;
        }
    }
}
