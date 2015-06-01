<?php  namespace Phonebook\Parsers;

interface Parser {

    /**
     * Return the part of the URL used
     * for matching a tenant.
     *
     * @param $url
     * @return string
     */
    public function parseUrl($url);
}