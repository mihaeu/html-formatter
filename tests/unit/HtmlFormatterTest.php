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