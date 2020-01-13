<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAP\SOAPService\ClientService\Model;

class ValidateLoginRequest implements \JsonSerializable
{
    /**
     * @var string
     */
    private $Username;

    /**
     * @var string
     */
    private $Password;

    /**
     * ValidateLoginRequest constructor.
     *
     * @param string $Username
     * @param string $Password
     */
    public function __construct(string $Username, string $Password)
    {
        $this->Username = $Username;
        $this->Password = $Password;
    }

    public function jsonSerialize()
    {
        return [
            'Username' => $this->Username,
            'Password' => $this->Password
        ];
    }
}
