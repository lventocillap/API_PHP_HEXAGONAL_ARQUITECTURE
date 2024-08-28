<?php

declare(strict_types=1);

namespace Src\Billboard\Aplication\UseCase;

use Src\Billboard\Aplication\DTO\BillboardRequest;
use Src\Billboard\Domain\Repository\BillboardRepositoryInterface;

class UpdateBillboard
{
    public function __construct(
        private BillboardRepositoryInterface $billboardRepository
    )
    {}

    public function execute(BillboardRequest $request): void
    {
        $this->billboardRepository->update(
            $request->id,
            $request->movieId,
            $request->hallId,
            $request->starDate,
            $request->endDate,
            $request->timeProyection
        );
    }


}