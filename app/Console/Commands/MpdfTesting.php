<?php

namespace App\Console\Commands;

use App\Console\Commands\Contracts\PDFTesterAbstractCommand;
use Mpdf\Mpdf;

/**
 * Class MpdfTesting
 * @package App\Console\Commands
 */
class MpdfTesting extends PDFTesterAbstractCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pdf-builders:mpdf {--count=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Build PDF via MPDF';

    /**
     * Get PDF builder name
     *
     * @return string
     */
    protected function getTitle(): string
    {
        return 'MPDF';
    }

    /**
     * Build PDF from html
     *
     * @param string $htmlPath
     *
     * @throws \Mpdf\MpdfException
     */
    protected function buildPdf(string $htmlPath) : void
    {
        $mpdf = new Mpdf();
        $mpdf->WriteHTML(file_get_contents($htmlPath));
        $mpdf->Output(storage_path('app/mpdf_result.pdf'));
    }
}
