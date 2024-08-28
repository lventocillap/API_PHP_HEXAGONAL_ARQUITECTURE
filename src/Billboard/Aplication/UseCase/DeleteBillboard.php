<?php

declare(strict_types=1);

namespace Src\Billboard\Aplication\UseCase;

use Src\Billboard\Domain\Model\Billboard;
use Src\Billboard\Domain\Repository\BillboardRepositoryInterface;

class DeleteBillboard
{
    public function __construct(
        private BillboardRepositoryInterface $billboardRepository
    )
    {}

    public function execute(int $billboardId):void
    {
        $this->billboardRepository->delete($billboardId);
    }
}