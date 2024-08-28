<?php

declare(strict_types=1);

namespace Src\Billboard\Domain\Model;

class Billboard
{
    public function __construct(
        private int $id,
        private int $movieId,
        private int $hallId,
        private string $starDate,
        private string $endDate,
        private string $timeProyection
    )
    {
        
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getMovieId(): int
    {
        return $this->movieId;
    }

    public function getHallId(): int 
    {
        return $this->hallId;
    }

    public function getStarDate(): string
    {
        return $this->starDate;
    }

    public function getEndDate(): string
    {
        return $this->endDate;
    }

    public function getTimeProyection(): string
    {
        return $this->timeProyection;
    }
}