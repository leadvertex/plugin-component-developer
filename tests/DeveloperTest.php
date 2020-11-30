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

    private string $name = 'Tony';

    private string $email = 'tony@starkindustries.com';

    private string $uri = 'https://starkindustries.com/plugin';

    private Developer $developer;

    protected function setUp(): void
    {
        parent::setUp();
        $this->developer = new Developer(
            $this->name,
            $this->email,
            $this->uri
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

    public function testGetUri()
    {
        $this->assertEquals($this->uri, $this->developer->getUri());
    }

    public function testJsonSerialize()
    {
        $this->assertEquals(
            '{"name":"Tony","email":"tony@starkindustries.com","uri":"https:\/\/starkindustries.com\/plugin"}',
            json_encode($this->developer)
        );
    }

}
