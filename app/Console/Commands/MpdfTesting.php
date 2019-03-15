<?php

namespace App\Console\Commands;

use App\Console\Commands\Contracts\PDFTesterAbstractCommand;

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
        return 'MPDF';
    }

    /**
     * Build PDF from html
     *
     * @param string $html_path
     */
    protected function buildPdf(string $html_path)
    {
        $mpdf = new \Mpdf\Mpdf();
        $mpdf->WriteHTML(file_get_contents($html_path));
        $mpdf->Output(storage_path('app/mpdf_result.pdf'));
    }
}