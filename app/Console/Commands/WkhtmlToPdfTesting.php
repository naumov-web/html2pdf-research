<?php

namespace App\Console\Commands;

use App\Console\Commands\Contracts\PDFTesterAbstractCommand;

/**
 * Class WkhtmlToPdfTesting
 * @package App\Console\Commands
 */
class WkhtmlToPdfTesting extends PDFTesterAbstractCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pdf-builders:wkhtmltopdf {--count=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Build PDF via wkhtmltopdf';

    /**
     * Get PDF builder name
     *
     * @return string
     */
    protected function getTitle(): string
    {
        return 'WkhtmlToPDF';
    }

    /**
     * Build PDF from html
     *
     * @param string $htmlPath
     * @return void
     */
    protected function buildPdf(string $htmlPath) : void
    {
        $pdfPath = storage_path('app/wkhtmltopdf_result.pdf');
        $command = "wkhtmltopdf $htmlPath $pdfPath";
        exec($command);
    }
}
