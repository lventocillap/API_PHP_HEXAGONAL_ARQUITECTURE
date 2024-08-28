<?php
declare(strict_types=1);

namespace Src\Billboard\Aplication\DTO;

class BillboardResponse
{
    public function __construct(
        public int $id,
        public int $movieId,
        public int $hallId,
        public string $starDate,
        public string $endDate,
        public string $timeProyection
    )
    {
    }
}