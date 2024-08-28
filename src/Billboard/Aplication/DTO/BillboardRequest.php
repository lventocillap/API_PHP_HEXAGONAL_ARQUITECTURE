<?php

namespace Src\Billboard\Aplication\DTO;

class BillboardRequest
{
    public function __construct(
        public ?int $id = null,
        public int $movieId,
        public int $hallId,
        public string $starDate,
        public string $endDate,
        public string $timeProyection
        )
    {
        
    }
}