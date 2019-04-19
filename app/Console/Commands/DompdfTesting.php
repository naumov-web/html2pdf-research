<?php

namespace App\Console\Commands;

use App\Console\Commands\Contracts\PDFTesterAbstractCommand;
use Dompdf\Dompdf;

/**
 * Class DompdfTesting
 * @package App\Console\Commands
 */
class DompdfTesting extends PDFTesterAbstractCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pdf-builders:dompdf {--count=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Build PDF via Dompdf';

    /**
     * Get PDF builder name
     *
     * @return string
     */
    protected function getTitle(): string
    {
        return 'Dompdf';
    }

    /**
     * Build PDF from html
     *
     * @param string $html_path
     * @return void
     */
    protected function buildPdf(string $html_path) : void
    {
        $pdf = new Dompdf();
        $pdf->loadHtml(file_get_contents($html_path));
        $pdf->setPaper('A4', 'landscape');
        $output = $pdf->output();
        file_put_contents(storage_path('app/dompdf_result.pdf'), $output);
    }
}