<?php

namespace Mihaeu;

/**
 * @covers Mihaeu\HtmlFormatter
 */
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

    public function testCRLFareReplacedCorrectly()
    {
        $input = "<p>one\r\ntwo</p>";
        $expected = "<p>\n    one two\n</p>";
        $this->assertSame($expected, $this->formatter->format($input));
    }

    public function testFormatterDoesNotThrowAnyWarnings()
    {
        $warnings = 0;

        try {

            $this->formatter->format('<html lang="en" dir="ltr"><head><title>My Website</title></head><body class="homepage"><div class="container"><h1 class="h1-title">H1 Title</h1><div class="body-content">Body Content</div></div></body></html>');

        } catch (\PHPUnit_Framework_Error_Warning $exception) {
            $warnings++;
        }

        $this->assertEquals(0, $warnings, 'Failed to assert that the formatter does not throw any exceptions');

    }

}