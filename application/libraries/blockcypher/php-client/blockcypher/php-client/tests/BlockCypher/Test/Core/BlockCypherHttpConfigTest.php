<?php

namespace BlockCypher\Test\Core;

use BlockCypher\Core\BlockCypherHttpConfig;

/**
 * Test class for BlockCypherHttpConfigTest.
 *
 */
class BlockCypherHttpConfigTest extends \PHPUnit_Framework_TestCase
{

    protected $object;

    /*private $config = array(
        'http.ConnectionTimeOut' => '30',
        'http.Retry' => '5',
    );*/

    /**
     * @test
     */
    public function testHeaderFunctions()
    {
        $o = new BlockCypherHttpConfig();
        $o->addHeader('key1', 'value1');
        $o->addHeader('key2', 'value');
        $o->addHeader('key2', 'overwritten');

        $this->assertEquals(2, count($o->getHeaders()));
        $this->assertEquals('overwritten', $o->getHeader('key2'));
        $this->assertNull($o->getHeader('key3'));

        $o = new BlockCypherHttpConfig();
        $o->addHeader('key1', 'value1');
        $o->addHeader('key2', 'value');
        $o->addHeader('key2', 'and more', false);

        $this->assertEquals(2, count($o->getHeaders()));
        $this->assertEquals('value;and more', $o->getHeader('key2'));

        $o->removeHeader('key2');
        $this->assertEquals(1, count($o->getHeaders()));
        $this->assertNull($o->getHeader('key2'));
    }

    /**
     * @test
     */
    public function testCurlOpts()
    {
        $o = new BlockCypherHttpConfig();
        $o->setCurlOptions(array('k' => 'v'));

        $curlOpts = $o->getCurlOptions();
        $this->assertEquals(1, count($curlOpts));
        $this->assertEquals('v', $curlOpts['k']);
    }

    public function testRemoveCurlOpts()
    {
        $o = new BlockCypherHttpConfig();
        $o->setCurlOptions(array('k' => 'v'));
        $curlOpts = $o->getCurlOptions();
        $this->assertEquals(1, count($curlOpts));
        $this->assertEquals('v', $curlOpts['k']);

        $o->removeCurlOption('k');
        $curlOpts = $o->getCurlOptions();
        $this->assertEquals(0, count($curlOpts));
    }

    /**
     * @test
     */
    public function testUserAgent()
    {
        $ua = 'UAString';
        $o = new BlockCypherHttpConfig();
        $o->setUserAgent($ua);

        $curlOpts = $o->getCurlOptions();
        $this->assertEquals($ua, $curlOpts[CURLOPT_USERAGENT]);
    }

    /**
     * @test
     */
    public function testSSLOpts()
    {
        $sslCert = '../cacert.pem';
        $sslPass = 'passPhrase';

        $o = new BlockCypherHttpConfig();
        $o->setSSLCert($sslCert, $sslPass);

        $curlOpts = $o->getCurlOptions();
        $this->assertArrayHasKey(CURLOPT_SSLCERT, $curlOpts);
        $this->assertEquals($sslPass, $curlOpts[CURLOPT_SSLCERTPASSWD]);
    }

    /**
     * @test
     */
    public function testProxyOpts()
    {
        $proxy = 'http://me:secret@hostname:8081';

        $o = new BlockCypherHttpConfig();
        $o->setHttpProxy($proxy);

        $curlOpts = $o->getCurlOptions();
        $this->assertEquals('hostname:8081', $curlOpts[CURLOPT_PROXY]);
        $this->assertEquals('me:secret', $curlOpts[CURLOPT_PROXYUSERPWD]);

        $this->setExpectedException('BlockCypher\Exception\BlockCypherConfigurationException');
        $o->setHttpProxy('invalid string');
    }

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {

    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }
}

?>
