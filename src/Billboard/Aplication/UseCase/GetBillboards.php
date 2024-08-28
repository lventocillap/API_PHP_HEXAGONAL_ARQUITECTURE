<?php 
declare(strict_types = 1);

namespace Src\Billboard\Aplication\UseCase;

use Src\Billboard\Aplication\DTO\BillboardResponse;

use Src\Billboard\Domain\Repository\BillboardRepositoryInterface;


class GetBillboards
{
    public function __construct(
        private BillboardRepositoryInterface $BillboardRepository
    ){}
    public function execute(): array
    {
        $billboards = $this->BillboardRepository->getAll();
        return array_map(function($billboard){
            return new BillboardResponse(
                id : $billboard->getId(),
                movieId: $billboard->getMovieId(),
                hallId: $billboard->getHallId(),
                starDate: $billboard->getStarDate(),
                endDate: $billboard->getEndDate(),
                timeProyection: $billboard->getTimeProyection()
            );
        },$billboards);
    }
}