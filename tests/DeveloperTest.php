<?php
/**
 * Created for plugin-developer
 * Datetime: 25.06.2019 17:00
 * @author Timur Kasumov aka XAKEPEHOK
 */

namespace Leadvertex\Plugin\Components\Developer;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class DeveloperTest extends TestCase
{

    private string $name = 'Tony';

    private string $email = 'Tony@starkindustries.com';

    private string $hostname = 'starkindustries.com';

    protected function setUp(): void
    {
        parent::setUp();
        Developer::config($this->name, $this->email, $this->hostname);
    }

    public function testConfigWithInvalidHostname(): void
    {
        $this->expectException(InvalidArgumentException::class);
        Developer::config($this->name, $this->email, 'https://example.com');
    }

    public function testGetName(): void
    {
        $this->assertEquals($this->name, Developer::getInstance()->getName());
    }

    public function testGetEmail(): void
    {
        $this->assertEquals('tony@starkindustries.com', Developer::getInstance()->getEmail());
    }

    public function testJsonSerialize(): void
    {
        $this->assertEquals(
            '{"name":"Tony","email":"tony@starkindustries.com","hostname":"starkindustries.com"}',
            json_encode(Developer::getInstance())
        );
    }

}
