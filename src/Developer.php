<?php
/**
 * Created for plugin-developer
 * Datetime: 25.06.2019 12:23
 * @author Timur Kasumov aka XAKEPEHOK
 */

namespace Leadvertex\Plugin\Components\Developer;


use JsonSerializable;

class Developer implements JsonSerializable
{

    private string $name;

    private string $email;

    private string $uri;

    /**
     * Developer constructor.
     * @param string $name of company or developer
     * @param string $email of support this export
     * @param string $uri hostname of this export (e.g. example.com)
     */
    public function __construct(string $name, string $email, string $uri)
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
}