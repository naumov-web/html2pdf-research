<?php

namespace App\Console\Commands;

use App\Console\Commands\Contracts\PDFTesterAbstractCommand;

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
        return 'WkhtmlToPDF';
    }

    /**
     * Build PDF from html
     *
     * @param string $html_path
     */
    protected function buildPdf(string $html_path)
    {
        $pdf_path = storage_path("app/wkhtmltopdf_result.pdf");
        $command = "wkhtmltopdf $html_path $pdf_path";
        exec($command);
    }
}
