<?php
require_once 'Text/Wiki.php';

// class to test the Text_Wiki::transform() with different wiki markups
class Text_Wiki_Generic_Transform_Test extends PHPUnit_Framework_TestCase
{

    public function testTransformFromMediawikiToTiki()
    {
        if (!@include_once('Text/Wiki/Mediawiki.php')) {
            $this->markTestSkipped('Text_Wiki_Mediawiki not installed');
        }
        if (!@include_once('Text/Wiki/Render/Tiki.php')) {
            $this->markTestSkipped('Text_Wiki_Tiki not installed');
        }
        $obj = Text_Wiki::factory('Mediawiki');
        $obj->parseConf['Wikilink']['spaceUnderscore'] = false;
        $source = file_get_contents(dirname(__FILE__) . '/fixtures/test_mediawiki_to_tiki_source.txt');
        $expectedResult = file_get_contents(dirname(__FILE__) . '/fixtures/test_mediawiki_to_tiki_output.txt');
        $this->assertEquals($expectedResult, $obj->transform($source, 'Tiki'));
    }

    public function testTransformFromMediawikiToTikiListSyntax()
    {
        if (!@include_once('Text/Wiki/Mediawiki.php')) {
            $this->markTestSkipped('Text_Wiki_Mediawiki not installed');
        }
        if (!@include_once('Text/Wiki/Render/Tiki.php')) {
            $this->markTestSkipped('Text_Wiki_Tiki not installed');
        }
        $obj = Text_Wiki::factory('Mediawiki');
        $obj->parseConf['Wikilink']['spaceUnderscore'] = false;
        $source = file_get_contents(dirname(__FILE__) . '/fixtures/test_mediawiki_to_tiki_lists_source.txt');
        $expectedResult = file_get_contents(dirname(__FILE__) . '/fixtures/test_mediawiki_to_tiki_lists_output.txt');
        $this->assertEquals($expectedResult, $obj->transform($source, 'Tiki'));
    }

    public function testTransformFromMediawikiToTikiRedirectSyntax()
    {
        if (!@include_once('Text/Wiki/Mediawiki.php')) {
            $this->markTestSkipped('Text_Wiki_Mediawiki not installed');
        }
        if (!@include_once('Text/Wiki/Render/Tiki.php')) {
            $this->markTestSkipped('Text_Wiki_Tiki not installed');
        }
        $obj = Text_Wiki::factory('Mediawiki');
        $obj->parseConf['Wikilink']['spaceUnderscore'] = false;
        $source = file_get_contents(dirname(__FILE__) . '/fixtures/test_mediawiki_to_tiki_redirect_source.txt');
        $expectedResult = file_get_contents(dirname(__FILE__) . '/fixtures/test_mediawiki_to_tiki_redirect_output.txt');
        $this->assertEquals($expectedResult, $obj->transform($source, 'Tiki'));
    }
}
