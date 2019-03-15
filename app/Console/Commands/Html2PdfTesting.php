<?php

namespace App\Console\Commands;

use App\Console\Commands\Contracts\PDFTesterAbstractCommand;
use Spipu\Html2Pdf\Html2Pdf;

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
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

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
     * @param string $html_path
     */
    protected function buildPdf(string $html_path)
    {
        $pdf = new Html2Pdf();
        $pdf->writeHTML(file_get_contents($html_path));
        $pdf->output(storage_path('app/html2pdf_result.pdf'));
    }
}