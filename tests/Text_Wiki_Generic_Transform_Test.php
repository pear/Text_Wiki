<?php
require_once 'Text/Wiki.php';

// class to test the Text_Wiki::transform() with different wiki markups
class Text_Wiki_Generic_Transform_Test extends PHPUnit_Framework_TestCase
{
    protected $obj;

    public function setUp()
    {
        if (!@include_once('Text/Wiki/Mediawiki.php')) {
            $this->markTestSkipped('Text_Wiki_Mediawiki not installed');
        }
        if (!@include_once('Text/Wiki/Render/Tiki.php')) {
            $this->markTestSkipped('Text_Wiki_Tiki not installed');
        }
        $this->obj = Text_Wiki::factory('Mediawiki');
        $this->obj->parseConf['Wikilink']['spaceUnderscore'] = false;
        $tiki = Text_Wiki::factory('Tiki');
        foreach ($tiki->getPath('render') as $path) {
            $this->obj->addPath('render', $path);
        }
    }

    public function testTransformFromMediawikiToTiki()
    {
        $source = file_get_contents(dirname(__FILE__) . '/fixtures/test_mediawiki_to_tiki_source.txt');
        $expectedResult = file_get_contents(dirname(__FILE__) . '/fixtures/test_mediawiki_to_tiki_output.txt');
        $this->assertEquals($expectedResult, $this->obj->transform($source, 'Tiki'));
    }

    public function testTransformFromMediawikiToTikiListSyntax()
    {
        return;
        $source = file_get_contents(dirname(__FILE__) . '/fixtures/test_mediawiki_to_tiki_lists_source.txt');
        $expectedResult = file_get_contents(dirname(__FILE__) . '/fixtures/test_mediawiki_to_tiki_lists_output.txt');
        $this->assertEquals($expectedResult, $this->obj->transform($source, 'Tiki'));
    }

    public function testTransformFromMediawikiToTikiRedirectSyntax()
    {
        return;
        $source = file_get_contents(dirname(__FILE__) . '/fixtures/test_mediawiki_to_tiki_redirect_source.txt');
        $expectedResult = file_get_contents(dirname(__FILE__) . '/fixtures/test_mediawiki_to_tiki_redirect_output.txt');
        $this->assertEquals($expectedResult, $this->obj->transform($source, 'Tiki'));
    }
}
