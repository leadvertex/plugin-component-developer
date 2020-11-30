<?php
/**
 * Created for plugin-developer
 * Datetime: 25.06.2019 12:23
 * @author Timur Kasumov aka XAKEPEHOK
 */

namespace Leadvertex\Plugin\Components\Developer;


use InvalidArgumentException;
use JsonSerializable;
use RuntimeException;

final class Developer implements JsonSerializable
{

    private static self $instance;

    private string $name;

    private string $email;

    private ?string $hostname;

    /**
     * Developer constructor.
     * @param string $name of company or developer
     * @param string $email of support for this plugin
     * @param string|null $hostname hostname of company or developer
     */
    private function __construct(string $name, string $email, string $hostname = null)
    {
        $this->name = trim($name);
        $this->email = strtolower(trim($email));

        $hostname = trim(strtolower($hostname));
        if (!preg_match('~^[^.][a-z\d\-.]+[^.]$~u', $hostname)) {
            throw new InvalidArgumentException('Hostname should not contain http(s)://, or slashes. For example, it can be "example.com"');
        }
        $this->hostname = $hostname;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getHostname(): string
    {
        return $this->hostname;
    }

    public function jsonSerialize()
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'hostname' => $this->hostname,
        ];
    }

    public static function config(string $name, string $email, string $uri): void
    {
        self::$instance = new self($name, $email, $uri);
    }

    public static function getInstance(): self
    {
        if (!isset(self::$instance)) {
            throw new RuntimeException('Plugin developer is not configured');
        }
        return self::$instance;
    }
}