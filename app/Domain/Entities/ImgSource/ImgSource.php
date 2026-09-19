<?php

namespace App\Domain\Entities\ImgSource;

class ImgSource {
    public function __construct(
        private string $id,
        private $stream, // Stream de dados
        private int $size
    ) {}

    public function getId(): string { return $this->id; }
    public function getStream() { return $this->stream; }
    public function getSize(): int { return $this->size; }
}
