<?php

/**
 * Tina4php-Catalog - Catalog Module
 * Author Stevie B steve@farmit.cymru
 */

class Catalog extends Content
{
    private string $twigNamespace = "@tina4catalog";

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
