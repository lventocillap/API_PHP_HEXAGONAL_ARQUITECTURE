<?php

declare(strict_types=1);

namespace Src\Billboard\Aplication\UseCase;

use Src\Billboard\Aplication\DTO\BillboardResponse;
use Src\Billboard\Domain\Exception\BillboardNotFound;
use Src\Billboard\Domain\Repository\BillboardRepositoryInterface;

class GetBillboard
{
    public function __construct(
        private BillboardRepositoryInterface $billboardRepository
    ) {}

    public function execute(int $billboardId): BillboardResponse
    {
        $billboard = $this->billboardRepository->getById($billboardId);
        if (!$billboard) {
            throw new BillboardNotFound();
        }
        return new BillboardResponse(
            id: $billboard->getId(),
            movieId: $billboard->getMovieId(),
            hallId: $billboard->getHallId(),
            starDate: $billboard->getStarDate(),
            endDate: $billboard->getEndDate(),
            timeProyection: $billboard->getTimeProyection()
        );
    }
}
