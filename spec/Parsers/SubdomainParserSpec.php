<?php

namespace spec\Phonebook\Parsers;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class SubdomainParserSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Phonebook\Parsers\SubdomainParser');
    }

    function it_returns_the_subdomain_from_url()
    {
        $this->parseUrl('http://test.testing.com')->shouldReturn('test');
        $this->parseUrl('https://test.testing.com')->shouldReturn('test');

        $this->parseUrl('http://www.test.testing.com')->shouldReturn('test');
        $this->parseUrl('https://www.test.testing.com')->shouldReturn('test');

        $this->parseUrl('http://www.t3st.testing1234.com')->shouldReturn('t3st');
    }

    function it_returns_null_if_no_subdomain()
    {
        $this->parseUrl('http://testing.com')->shouldReturn(null);
        $this->parseUrl('https://testing.com')->shouldReturn(null);
        $this->parseUrl('https://t3sting1234.com')->shouldReturn(null);

        $this->parseUrl('http://www.testing.com')->shouldReturn(null);
        $this->parseUrl('https://www.testing.com')->shouldReturn(null);
        $this->parseUrl('http://www.t3sting1234.com')->shouldReturn(null);

    }
}
