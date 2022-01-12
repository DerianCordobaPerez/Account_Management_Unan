<?php

namespace App\Helpers;

use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Response;

class PdfHelper
{
    use SingletonHelper;

    /**
     * @var PDF
     */
    private PDF $pdf;

    /**
     * PdfHelper constructor.
     */
    private function __construct()
    {
        // Create new PDF
        $this->create();
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
        if (!str_contains($filename, '.pdf'))
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
        if (!str_ends_with($filename, '.pdf'))
            $filename .= '.pdf';

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
        if (!str_contains($filename, '.pdf'))
            $filename .= '.pdf';

        return $this->pdf->save($filename);
    }
}
