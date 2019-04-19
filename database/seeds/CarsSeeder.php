<?php

use Illuminate\Database\Seeder;
use App\Car;
use App\Generators\CarsGenerator;

class CarsSeeder extends Seeder
{
    /**
     * Count of cars, which will be created
     */
    protected const CARS_COUNT = 200000;

    /**
     * Cars generator instance
     * @var CarsGenerator
     */
    protected $generator;

    /**
     * CarsSeeder constructor.
     * @param CarsGenerator $generator
     */
    public function __construct(CarsGenerator $generator)
    {
        $this->generator = $generator;
    }

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() : void
    {
        Car::truncate();

        echo "Creation of random cars...\r\n";
        $data = $this->generator->generate(self::CARS_COUNT);
        echo "Random cars are created!\r\n";

        echo "Addition random cars in database...\r\n";

        foreach($data as $item) {
            Car::insert($item);
        }

        echo "Random cars are added in database!\r\n";
    }
}
