<?php

namespace App\Console\Commands\Contracts;

use Illuminate\Console\Command;
use App\Car;
use Illuminate\Support\Collection;

/**
 * Class PDFTesterAbstractCommand
 * @package App\Console\Commands\Contracts
 */
abstract class PDFTesterAbstractCommand extends Command {

    protected $start_time = null;

    /**
     * Get PDF builder name
     *
     * @return string
     */
    abstract protected function getTitle(): string;

    /**
     * Build pdf file from html
     *
     * @param string $html_path
     * @return void
     */
    abstract protected function buildPdf(string $html_path);

    /**
     * Set start_time as current time
     *
     * @return void
     */
    protected function resetStartTime()
    {
        $this->start_time = time();
    }

    /**
     * Print title
     *
     * @return void
     */
    protected function printTitle()
    {
        echo "\033[0;32mPDF builder name: " . $this->getTitle() . "\r\n";
        echo "\033[1;37m\r\n";
    }

    /**
     * Print error message
     *
     * @return void
     */
    protected function printError()
    {
        echo "\033[0;31mPDF building error!\r\n";
        echo "\033[1;37m\r\n";
    }

    /**
     * Print finished line
     *
     * @return void
     */
    protected function printFinish()
    {
        echo "=========================================\r\n";
        echo "\r\n";
        echo "\r\n";
    }

    /**
     * Print diff between current time and start time
     *
     * @param string $label
     * @return void
     */
    protected function printTime(string $label, bool $auto_reset = true)
    {
        echo $label . ": " . (time() - $this->start_time) . " seconds \r\n";

        if ($auto_reset) {
            $this->resetStartTime();
        }
    }

    /**
     * Get data collection
     *
     * @return Car[]|\Illuminate\Database\Eloquent\Collection
     */
    protected function getData()
    {
        $count = $this->option('count');
        return Car::query()
            ->when($count, function($query, $count) {
                $query->limit($count);
            })
            ->get();
    }

    /**
     * Create html and return his path
     *
     * @param Collection $data
     * @throws \Exception
     * @return string
     */
    protected function createHtml(Collection $data): string
    {
        $view = view("pdf.cars_report", [
            'cars' => $data
        ]);
        $html_path = storage_path("app/" . md5(microtime()) . '.html');

        file_put_contents($html_path, $view->render());

        return $html_path;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->printTitle();
        $this->resetStartTime();

        $data = $this->getData();
        $this->printTime("Getting data from database");

        $html_path = $this->createHtml($data);
        $this->printTime("Building HTML file");

        try {
            $this->buildPdf($html_path);
            $this->printTime("Building PDF file");
        }
        catch (\Exception $e) {
            $this->printError();
        }

        $this->printFinish();
        unlink($html_path);
    }

}