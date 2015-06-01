<?php  namespace Phonebook\Parsers;

interface Parser {

    /**
     * Return the part of the URL used
     * for matching a tenant or null
     * if URL piece is not present.
     *
     * @param $url
     * @return string | null
     */
    public function parseUrl($url);
}