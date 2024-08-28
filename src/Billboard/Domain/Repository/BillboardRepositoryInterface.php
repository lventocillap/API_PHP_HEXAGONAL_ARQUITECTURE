<?php
declare(strict_types=1);

namespace Src\Billboard\Domain\Repository;

use Src\Billboard\Domain\Model\Billboard;

Interface BillboardRepositoryInterface
{
    /**
     * Summary of getAll
     * @return Billboard[]  Array of Billboard objects
     */
    public function getAll(array $params = []): array;

    public function getById(int $billboardId): ?Billboard;

    public function insert(int $movieId, int $hallId, string $starDate, string $endDate, string $timeProyection): void;

    public function update(int $id, int $movieId, int $hallId, string $starDate, string $endDate, string $timeProyection): void;

    public function delete($billboardId);
}