<?php

declare(strict_types=1);

namespace Src\Billboard\Infrastructure\Controller;

use Core\Container;
use Src\Billboard\Aplication\DTO\BillboardRequest;
use Src\Billboard\Aplication\UseCase\DeleteBillboard;
use Src\Billboard\Aplication\UseCase\GetBillboard;
use Src\Billboard\Aplication\UseCase\GetBillboards;
use Src\Billboard\Aplication\UseCase\RegisterBillboard;
use Src\Billboard\Aplication\UseCase\UpdateBillboard;

class BillboardControll
{
    public function __construct(
        private Container $container
    )
    {
        
    }

    public function index(): void
    {
        $getBillboards = $this->container->get(GetBillboards::class);
        $billboards = $getBillboards->execute();
        echo json_encode($billboards);
    }

    public function show($billboardId):void
    {
        $getBillboard = $this->container->get(GetBillboard::class);
        $billboard = $getBillboard->execute($billboardId);
        echo json_encode($billboard);
    }

    public function insert(): void
    {
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);

        $insertBillboard = $this->container->get(RegisterBillboard::class);
        $insertBillboard->execute(new BillboardRequest(
            movieId:$data['movie_id'], 
            hallId:$data['hall_id'], 
            starDate:$data['star_date'], 
            endDate:$data['end_date'], 
            timeProyection:$data['time_proyection']));
    }

    public function update(int $billboardId):void
    {
        $input = file_get_contents('php://input');
        $data = json_decode($input, true);

        $updateBillboard = $this->container->get(UpdateBillboard::class);
        $updateBillboard->execute(new BillboardRequest(
                id: $billboardId,
                movieId:$data['movie_id'], 
                hallId:$data['hall_id'], 
                starDate:$data['star_date'], 
                endDate:$data['end_date'], 
                timeProyection:$data['time_proyection'])
        );
    }

    public function delete($billboardId):void
    {
        $deleteBillboard = $this->container->get(DeleteBillboard::class);
        $deleteBillboard->execute($billboardId);
    }
}