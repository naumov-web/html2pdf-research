<?php

namespace App\Console\Commands;

use App\Console\Commands\Contracts\PDFTesterAbstractCommand;
use Spipu\Html2Pdf\Html2Pdf;

/**
 * Class Html2PdfTesting
 * @package App\Console\Commands
 */
class Html2PdfTesting extends PDFTesterAbstractCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pdf-builders:html2pdf {--count=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Build PDF via Html2Pdf';

    /**
     * Get PDF builder name
     *
     * @return string
     */
    protected function getTitle(): string
    {
        return 'Html2Pdf';
    }

    /**
     * Build PDF from html
     *
     * @param string $htmlPath
     *
     * @return void
     * @throws \Spipu\Html2Pdf\Exception\Html2PdfException
     */
    protected function buildPdf(string $htmlPath) : void
    {
        $pdf = new Html2Pdf();
        $pdf->writeHTML(file_get_contents($htmlPath));
        $pdf->output(storage_path('app/html2pdf_result.pdf'));
    }
}
