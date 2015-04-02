<?php

namespace Mihaeu;

class HtmlFormatterTest extends \PHPUnit_Framework_TestCase
{
    public function testIndentsASimpleParagraph()
    {
        $formatter = new HtmlFormatter();
        $this->assertEquals("<p>\n    Test\n</p>", $formatter->format('<p>Test</p>'));
    }
}