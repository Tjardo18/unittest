<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\TagParser;

class TagParserTest extends TestCase
{
    public function test_it_parses_a_tag()
    {
        $parser = new TagParser;

        $result = $parser->parse('personal');
        $expected = ['personal'];
        $this->assertSame($expected, $result);
    }

    public function test_it_parses_a_comma_seperated_list_of_tags()
    {
        $parser = new TagParser;

        $result = $parser->parse('personal, money, family');
        $expected = ['personal', 'money', 'family'];
        $this->assertSame($expected, $result);
    }

    public function test_it_parses_a_pipe_seperated_list_of_tags()
    {
        $parser = new TagParser;

        $result = $parser->parse('personal | money | family');
        $expected = ['personal', 'money', 'family'];
        $this->assertSame($expected, $result);
    }

    public function test_spaces_are_optional()
    {
        $parser = new TagParser;

        $result = $parser->parse('personal,money, family');
        $expected = ['personal', 'money', 'family'];
        $this->assertSame($expected, $result);
    }

    public function test_mixed_everything()
    {
        $parser = new TagParser;

        $result = $parser->parse('personal |money, family');
        $expected = ['personal', 'money', 'family'];
        $this->assertSame($expected, $result);
    }
}
