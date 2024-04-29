<?php

declare(strict_types=1);

namespace MiguelAlcaino\MindbodyApiClient\MindbodyREST\RESTEndpoint\MindbodyClass\Model;

use JMS\Serializer\Annotation as Serializer;

class ClassDescription
{
    #[Serializer\SerializedName("Id")]
    private int $id;
    /**
     * @Serializer\SerializedName("SessionType")
     */
    private SessionType $sessionType;

    /**
     * @Serializer\SerializedName("Name")
     */
    private string $name;

    /**
     * @Serializer\SerializedName("Description")
     */
    private string $description;

    /**
     * @Serializer\SerializedName("Category")
     */
    private ?string $category;

    #[Serializer\SerializedName("Program")]
    private Program $program;

    public function __construct(SessionType $sessionType)
    {
        $this->sessionType = $sessionType;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getSessionType(): SessionType
    {
        return $this->sessionType;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function getProgram(): Program
    {
        return $this->program;
    }
}
