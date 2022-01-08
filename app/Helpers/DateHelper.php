<?php

namespace App\Helpers;

trait DateHelper
{
    /**
     * @var array|string[]
     */
    public array $spanishMonths = [
        'January' => 'Enero',
        'February' => 'Febrero',
        'March' => 'Marzo',
        'April' => 'Abril',
        'May' => 'Mayo',
        'June' => 'Junio',
        'July' => 'Junio',
        'August' => 'Agosto',
        'September' => 'Septiembre',
        'October' => 'Octubre',
        'November' => 'Noviembre',
        'December' => 'Diciembre',
    ];

    public function getMonth(string $month): string
    {
        return $this->spanishMonths[$month];
    }

    public function getYear($date): string
    {
        return date('Y', strtotime($date));
    }

    public function getPeriod($date): string
    {
        return $this->getMonth(date('F', strtotime($date))) . ' ' . $this->getYear($date);
    }
}
