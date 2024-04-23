<?php

declare(strict_types=1);

namespace Valantic\PimcoreApiDocumentationBundle\Model\Component\Property;

abstract class AbstractPropertyDoc implements \JsonSerializable
{
    protected ?string $name = null;
    protected ?string $type = null;
    protected bool $nullable = true;

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setType(?string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setNullable(bool $nullable): static
    {
        $this->nullable = $nullable;

        return $this;
    }

    public function getNullable(): bool
    {
        return $this->nullable;
    }

    /**
     * @return mixed[]
     */
    public function jsonSerialize(): array
    {
        $data = [];

        if ($this->getType() !== null) {
            $data['type'] = $this->getType();
        }

        if ($this->getNullable()) {
            $data['nullable'] = true;
        }

        return $data;
    }

    /**
     * @return mixed[]
     */
    public function getSchema(): array
    {
        return [
            'type' => $this->getType(),
            'nullable' => $this->getNullable(),
        ];
    }
}
