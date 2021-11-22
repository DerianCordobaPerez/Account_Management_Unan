<?php

namespace App\helpers;

use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Response;

class PdfHelper
{
    /**
     * @var PDF
     */
    private PDF $pdf;

    /**
     * @var PdfHelper|null
     */
    private static ?PdfHelper $instance = null;

    /**
     * PdfHelper constructor.
     */
    private function __construct() {
        // Create new PDF
        $this->create();
    }

    /**
     * Get instance of PdfHelper
     *
     * @return PdfHelper
     */
    public static function getInstance(): PdfHelper
    {
        // Check if instance is null
        if (is_null(static::$instance))
            // Create new instance
            static::$instance = new PdfHelper();

        // Return instance
        return static::$instance;
    }

    /**
     * Create a new PDF
     *
     * @return $this
     */
    public function create(): PdfHelper
    {
        $this->pdf = app('dompdf.wrapper');
        return $this;
    }

    /**
     * Set the PDF page
     *
     * @param string $paper Type of paper
     * @param string $orientation Orientation of paper
     * @return $this
     */
    public function setPaper(string $paper, string $orientation = 'portrait'): PdfHelper
    {
        $this->pdf->setPaper($paper, $orientation);
        return $this;
    }

    /**
     * Set the PDF options
     *
     * @param array $options Options to set
     * @return $this
     */
    public function setOptions(array $options): PdfHelper
    {
        $this->pdf->setOptions($options);
        return $this;
    }

    /**
     * Load HTML string
     *
     * @param string $html HTML string
     * @return $this
     */
    public function loadHtml(string $html): PdfHelper
    {
        $this->pdf->loadHtml($html);
        return $this;
    }

    /**
     * Load PDF from a view
     *
     * @param string $view Name of the view
     * @param array $data Data to pass to the view
     * @return $this
     */
    public function loadView(string $view, array $data = []): PdfHelper
    {
        $this->pdf->loadView($view, $data);
        return $this;
    }

    /**
     * Download PDF
     *
     * @param string $filename Filename to save the PDF as
     * @return Response
     */
    public function download(string $filename = 'document.pdf'): Response
    {
        if(!str_contains($filename, '.pdf'))
            $filename .= '.pdf';

        return $this->pdf->download($filename);
    }

    /**
     * Stream PDF
     *
     * @param string $filename Filename to save the PDF as
     * @return Response
     */
    public function stream(string $filename = 'document.pdf'): Response
    {
        return $this->pdf->stream($filename);
    }

    /**
     * Save PDF to file
     *
     * @param string $filename Filename to save the PDF as
     * @return PDF
     */
    public function save(string $filename = 'document.pdf'): PDF
    {
        return $this->pdf->save($filename);
    }
}
