<?php

namespace App\Http\Contracts;

interface ICalculateService
{
    public function sumDistance(
            float $firstDistance,
            string $firstType,
            float $secondDistance,
            string $secondType,
            string $returnType
    ): float;
}
