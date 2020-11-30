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

    protected function setUp(): void
    {
        parent::setUp();
        Developer::config($this->name, $this->email);
    }

    public function testGetName()
    {
        $this->assertEquals($this->name, Developer::getInstance()->getName());
    }

    public function testGetEmail()
    {
        $this->assertEquals($this->email, Developer::getInstance()->getEmail());
    }

    public function testJsonSerialize()
    {
        $this->assertEquals(
            '{"name":"Tony","email":"tony@starkindustries.com"}',
            json_encode(Developer::getInstance())
        );
    }

}
