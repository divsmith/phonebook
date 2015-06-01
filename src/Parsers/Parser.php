<?php  namespace Phonebook\Parsers;

interface Parser {

    /**
     * Return the part of the URL used
     * for matching a tenant.
     *
     * @return string
     */
    public function parseUrl();
}