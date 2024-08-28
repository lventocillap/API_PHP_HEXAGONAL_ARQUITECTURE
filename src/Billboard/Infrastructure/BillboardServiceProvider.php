<?php

declare(strict_types=1);

namespace Src\Billboard\Infrastructure;

use Src\Billboard\Domain\Repository\BillboardRepositoryInterface;
use Src\Billboard\Infrastructure\Persistence\MySQLBillboardRepository;

class BillboardServiceProvider
{
    private static array $instances = [];

    public static function register(): void
    {
        self::$instances[BillboardRepositoryInterface::class] = function (){
            return new MySQLBillboardRepository();
        };
    }

    public static function get(string $interface)
    {
        if (!isset(self::$instances[$interface])) {
            throw new \Exception("No instance found for {$interface}");
        }

        // Llamar al closure para obtener la instancia
        return call_user_func(self::$instances[$interface]);
    }
}