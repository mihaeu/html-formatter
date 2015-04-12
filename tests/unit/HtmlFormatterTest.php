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

    /**
     * If a text node contains a newline whitespace and *no other whitespace*
     * between two words, then the newline must be replaced by a space
     * (otherwise the visual html output would be modified)
     */
    public function testEssentialLineFeedsAreBeingPreserved()
    {
        $input = <<<EOT
<p>Test
and some more
    Linefeeds</p>
EOT;
        $expected = <<<EOT
<p>
    Test and some more Linefeeds
</p>
EOT;
        $this->assertSame($expected, $this->formatter->format($input));
    }

}