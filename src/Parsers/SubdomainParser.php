<?php  namespace Phonebook\Parsers; 

class SubdomainParser implements Parser {

    /**
     * Return the part of the URL used
     * for matching a tenant or null
     * if URL piece is not present.
     *
     * @param $url
     * @return string | null
     */
    public function parseUrl($url)
    {
        $pattern = '/^https?:\/\/(?:www\.)?([^w.]+)\.(?![\w]+$)/';
        $matches = [];
        preg_match($pattern, $url, $matches);

        return isset($matches[1]) ? $matches[1] : null;
    }
}