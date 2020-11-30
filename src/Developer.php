<?php
/**
 * Created for plugin-developer
 * Datetime: 25.06.2019 12:23
 * @author Timur Kasumov aka XAKEPEHOK
 */

namespace Leadvertex\Plugin\Components\Developer;


use JsonSerializable;
use RuntimeException;

final class Developer implements JsonSerializable
{

    private static self $instance;

    private string $name;

    private string $email;

    private string $uri;

    /**
     * Developer constructor.
     * @param string $name of company or developer
     * @param string $email of support this export
     * @param string $uri hostname of this export (e.g. example.com)
     */
    private function __construct(string $name, string $email, string $uri)
    {
        $this->name = $name;
        $this->email = $email;
        $this->uri = $uri;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getUri(): string
    {
        return $this->uri;
    }

    public function jsonSerialize()
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
            'uri' => $this->uri,
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