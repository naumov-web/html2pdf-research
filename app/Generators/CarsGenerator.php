<?php

namespace App\Generators;

/**
 * Class CarsGenerator
 * @package App\Generators
 */
class CarsGenerator {

    /**
     * Available letters for reg number
     * @var string
     */
    const REG_NUMBER_LETTERS = 'ABCEHKMOPTYX';

    /**
     * Available digits for reg number
     * @var string
     */
    const REG_NUMBER_DIGITS = '0123456789';

    /**
     * Max count of road accidents
     * @var int
     */
    const MAX_ACCIDENTS_COUNT = 5;

    /**
     * Max count of fines
     * @var int
     */
    const MAX_FINES_COUNT = 10;

    /**
     * Config with handbooks for creation cars
     * @var \Illuminate\Config\Repository|mixed
     */
    protected $config;

    /**
     * CarsGenerator constructor
     */
    public function __construct()
    {
        $this->config = config('cars_data');
    }

    /**
     * Generate arrays with random data
     *
     * @param int $count
     * @return array
     */
    public function generate(int $count): array
    {
        $result = [];

        for($i = 0; $i < $count; $i++) {
            $result[] = $this->generateOne();
        }

        return $result;
    }

    /**
     * Generate one random car`s data
     *
     * @return array
     */
    protected function generateOne()
    {
        $result = [
            'reg_number' => $this->randomRegNumber(),
            'owner_name' => $this->randomFromSet($this->config['owner_names']) . ' ' . $this->randomFromSet($this->config['owner_surnames']),
            'region_name' => $this->randomFromSet($this->config['regions']),
            'brand_name' => $this->randomFromSet($this->config['brands']),
            'model_name' => $this->randomFromSet($this->config['models']),
            'transmission_name' => $this->randomFromSet($this->config['transmissions']),
            'road_accidents_count' => rand(0, self::MAX_ACCIDENTS_COUNT + 1),
            'fines_count' => rand(0, self::MAX_FINES_COUNT + 1),
            'last_service_at' => date("Y-m-d H:i:s")
        ];

        return $result;
    }

    /**
     * Generate random reg number
     *
     * @return string
     */
    protected function randomRegNumber()
    {
        $template = 'LDDDLLDDD';
        $letters = self::REG_NUMBER_LETTERS;
        $digits = self::REG_NUMBER_DIGITS;

        for($i = 0, $len = strlen($template); $i < $len; $i++)
        {
            if ($template[$i] === 'L')
            {
                $template[$i] = $letters[rand(0, strlen($letters)-1)];
            }
            else
            {
                $template[$i] = $digits[rand(0, strlen($digits)-1)];
            }
        }

        return $template;
    }

    /**
     * Get random item from array
     *
     * @param array $set
     * @return string
     */
    protected function randomFromSet(array $set)
    {
        return $set[rand(0, count($set) - 1)];
    }

}