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

    /**
     * Developer constructor.
     * @param string $name of company or developer
     * @param string $email of support this export
     */
    private function __construct(string $name, string $email)
    {
        $this->name = $name;
        $this->email = $email;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function jsonSerialize()
    {
        return [
            'name' => $this->name,
            'email' => $this->email,
        ];
    }

    public static function config(string $name, string $email): void
    {
        self::$instance = new self($name, $email);
    }

    public static function getInstance(): self
    {
        if (!isset(self::$instance)) {
            throw new RuntimeException('Plugin developer is not configured');
        }
        return self::$instance;
    }
}