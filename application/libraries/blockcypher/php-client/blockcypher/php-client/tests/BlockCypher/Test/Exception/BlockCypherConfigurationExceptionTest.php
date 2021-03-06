<?php

use BlockCypher\Exception\BlockCypherConfigurationException;

/**
 * Test class for BlockCypherConfigurationException.
 *
 */
class BlockCypherConfigurationExceptionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var BlockCypherConfigurationException
     */
    protected $object;

    public function testBCConfigurationException()
    {
        $this->assertEquals('Test BlockCypherConfigurationException', $this->object->getMessage());
    }

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {
        $this->object = new BlockCypherConfigurationException('Test BlockCypherConfigurationException');
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }
}