<?php

namespace MiguelAlcaino\MindbodyApiClient\MindbodySOAPRequest\SOAPService\SaleService\Model;

class Item implements \JsonSerializable
{
    /**
     * @var int
     */
    private $ID;

    /**
     * @var string
     */
    private $type;

    /**
     * ItemRequest constructor.
     *
     * @param int    $ID
     * @param string $type
     */
    public function __construct(int $ID, string $type)
    {
        $this->ID   = $ID;
        $this->type = $type;
    }

    public function jsonSerialize()
    {
        return [
            '_attributes' => [
                'xsi:type' => $this->type
            ],
            'ID' => $this->ID
        ];
    }

}
