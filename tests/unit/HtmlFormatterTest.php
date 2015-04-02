<?php

namespace Mihaeu;

class HtmlFormatterTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var HtmlFormatter
     */
    private $formatter;

    public function setUp()
    {
        $this->formatter = new HtmlFormatter();
    }

    public function testIndentsASimpleParagraph()
    {
        $expected = <<<EOT
<p>
    Test
</p>
EOT;

        $this->assertEquals($expected, $this->formatter->format('<p>Test</p>'));
    }

    public function testLineFeedsWithinTextNodesAreBeingPreserved()
    {
        $actual = <<<EOT
<p>Test
    and some more
    Linefeeds</p>
EOT;
        $expected = <<<EOT
<p>
    Test
    and some more
    Linefeeds
</p>
EOT;

        $this->assertEquals($expected, $this->formatter->format($actual));
    }
}