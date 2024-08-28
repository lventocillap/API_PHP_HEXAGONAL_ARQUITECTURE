<?php 
declare(strict_types=1);

namespace Src\Billboard\Domain\Exception;

use Exception;

class BillboardNotFound extends Exception
{
    public function __construct()
    {
        parent::__construct("Billboard not found", 404);
    }
}