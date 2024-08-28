<?php

namespace Src\Billboard\Aplication\UseCase;

use Src\Billboard\Aplication\DTO\BillboardRequest;
use Src\Billboard\Domain\Repository\BillboardRepositoryInterface;

class RegisterBillboard
{
    public function __construct(
        private BillboardRepositoryInterface $billboardRepository
    )
    {}
    
    public function execute(BillboardRequest $request):void
    {
        $this->billboardRepository->insert(
            $request->movieId, 
            $request->hallId, 
            $request->starDate, 
            $request->endDate, 
            $request->timeProyection
        );
    }
}