<?php
/**
 * Created for plugin-developer
 * Datetime: 25.06.2019 17:00
 * @author Timur Kasumov aka XAKEPEHOK
 */

namespace Leadvertex\Plugin\Components\Developer;

use PHPUnit\Framework\TestCase;

class DeveloperTest extends TestCase
{

    /** @var string */
    private $name = 'Tony';

    /** @var string */
    private $email = 'tony@starkindustries.com';

    /** @var string */
    private $hostname = 'starkindustries.com';

    /** @var string */
    private $sign = 'tonystark';

    /** @var Developer */
    private $developer;

    protected function setUp(): void
    {
        parent::setUp();
        $this->developer = new Developer(
            $this->name,
            $this->email,
            $this->hostname,
            $this->sign
        );
    }

    public function testGetName()
    {
        $this->assertEquals($this->name, $this->developer->getName());
    }

    public function testGetEmail()
    {
        $this->assertEquals($this->email, $this->developer->getEmail());
    }

    public function testGetHostname()
    {
        $this->assertEquals($this->hostname, $this->developer->getHostname());
    }

    public function testGetSign()
    {
        $this->assertEquals($this->sign, $this->developer->getSign());
    }

    public function testToArray()
    {
        $this->assertEquals([
            'name' => $this->name,
            'email' => $this->email,
            'hostname' => $this->hostname,
            'sign' => $this->sign,
        ], $this->developer->toArray());
    }

}
