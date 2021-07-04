<?php

namespace App\Http\Services;

use App\Http\Contracts\ICalculateService;


class CalculateService implements ICalculateService
{
    /**
     * @param float $firstDistance
     * @param string $firstType
     * @param float $secondDistance
     * @param string $secondType
     * @param string $returnType
     * @return float
     * @throws \Exception
     */
    public function sumDistance(float $firstDistance, string $firstType, float $secondDistance, string $secondType, string $returnType): float
    {
        if($firstDistance < 0 || $secondDistance < 0){
            throw new \Exception("Negative distances are invalid");
        }

        return
            $this->convert($firstType, $returnType, $firstDistance) +
            $this->convert($secondType, $returnType, $secondDistance);
    }


    /**
     * @param string $from
     * @param string $to
     * @param float $value
     * @return float
     */
    private function convert(string $from, string $to, float $value) : float
    {
        if ($from == $to) {
            return $value;
        }

        // yards to meters
        if ($to == 'meters') {
            return $value * 0.9144;
        }

        //meters to yards
        return $value * 1.09361;
    }

}
