<?php

declare(strict_types=1);

namespace Src\Billboard\Infrastructure\Persistence;

use Src\Billboard\Domain\Model\Billboard;
use Src\Billboard\Domain\Repository\BillboardRepositoryInterface;
use Src\Shader\Infrastructure\Database\Conexion;
use PDO;
use PDOException;

class MySQLBillboardRepository implements BillboardRepositoryInterface
{
    public function getAll(array $params = []): array
    {
        $conexion = new Conexion();
        $PDO = $conexion->getConexion();

        $stmt = $PDO->prepare("SELECT * FROM billboards");
        $stmt->execute();
        $billbs = $stmt->fetchAll();
        foreach ($billbs as $fila) {
            $billboards[] = new Billboard(
                id: $fila['id'],
                movieId: $fila['movie_id'],
                hallId: $fila['hall_id'],
                starDate: $fila['star_date'],
                endDate: $fila['end_date'],
                timeProyection: $fila['time_proyection']
            );
        }
        return $billboards;
    }

    public function getById(int $billboardId): ?Billboard
    {
        $conexion = new Conexion();
        $PDO = $conexion->getConexion();

        $stmt = $PDO->prepare("SELECT * FROM billboards WHERE id = :id");
        $stmt->bindParam(":id", $billboardId, PDO::PARAM_INT);
        $stmt->execute();
        $fila = $stmt->fetch();
        if ($fila) {
            return new Billboard(
                $fila['id'],
                $fila['movie_id'],
                $fila['hall_id'],
                $fila['star_date'],
                $fila['end_date'],
                $fila['time_proyection']
            );
        }
        return null;
    }

    public function insert(int $movieId, int $hallId, string $starDate, string $endDate, string $timeProyection): void
    {
        $conexion = new Conexion();
        $PDO = $conexion->getConexion();

        try {
            $stmt = $PDO->prepare("INSERT INTO billboards(movie_id, hall_id, star_date, end_date, time_proyection) 
                VALUES(:movie_id, :hall_id, :star_date, :end_date, :time_proyection)"
            );

            $stmt->bindParam(":movie_id", $movieId, PDO::PARAM_INT);
            $stmt->bindParam(":hall_id", $hallId, PDO::PARAM_INT);
            $stmt->bindParam(":star_date", $starDate, PDO::PARAM_STR);
            $stmt->bindParam(":end_date", $endDate, PDO::PARAM_STR);
            $stmt->bindParam(":time_proyection", $timeProyection, PDO::PARAM_STR);

            $stmt->execute();

            $succes = ['succes' => 'Insert succesfull'];
            echo json_encode($succes);
        } catch (PDOException $e) {
            $notsucces = ['error' => 'Not succesfull :' . $e];
            echo json_encode($notsucces);
        }
    }

    public function update(int $id, int $movieId,  int $hallId, string $starDate, string $endDate, string $timeProyection): void
    {
        $conexion = new Conexion();
        $PDO = $conexion->getConexion();

        try{
            $stmt = $PDO->prepare("UPDATE billboards SET 
                                    movie_id = :movie_id,
                                    hall_id = :hall_id,
                                    star_date = :star_date,
                                    end_date = :end_date,
                                    time_proyection = :time_proyection
                                    WHERE id = :id");
            $stmt->bindParam(":movie_id", $movieId, PDO::PARAM_INT);
            $stmt->bindParam(":hall_id", $hallId, PDO::PARAM_INT);
            $stmt->bindParam(":star_date", $starDate, PDO::PARAM_STR);
            $stmt->bindParam(":end_date",$endDate, PDO::PARAM_STR);
            $stmt->bindParam(":time_proyection", $timeProyection, PDO::PARAM_STR);
            $stmt->bindParam(":id", $id, PDO::PARAM_INT);

            $stmt->execute();

            $succes = ['succes' => 'Update succesfull'];
            echo json_encode($succes);
        }catch(PDOException $e){
            $notsucces = ['error' => 'Not succesfull :' . $e];
            echo json_encode($notsucces);
        }
    }

    public function delete($billboardId): void
    {
        $conexion = new Conexion();
        $PDO = $conexion->getConexion();

        try{
            $stmt = $PDO->prepare("DELETE FROM billboards WHERE id = :id");
            $stmt->bindParam(":id", $billboardId, PDO::PARAM_INT);

            $stmt->execute();
            
            $succes = ['succes' => 'Delete succesfull'];
            echo json_encode($succes);
        }catch(PDOException $e){
            $notsucces = ['error' => 'Not succesfull :' . $e];
            echo json_encode($notsucces);
        }
    }
}
