<?php

namespace App\Helpers;

use Carbon\Carbon;

trait DateHelper
{
    /**
     * @var array|string[]
     */
    protected array $spanishMonths = [
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

    public function getFirstDayOfLastMonth(): string
    {
        return Carbon::now()->startOfMonth()->subMonth();
    }

    public function getFirstDayOfLastThreeMonths(): string
    {
        return Carbon::now()->startOfMonth()->subMonth(3);
    }

    public function getFirstDayOfLastTwoMonths(): string
    {
        return Carbon::now()->startOfMonth()->subMonth(2);
    }

    public function getLastDayOfLastThreeMonths(): string
    {
        return Carbon::now()->startOfMonth();
    }

    public function getPeriodsForLastThreeMonths(): array
    {
        $periods = [];
        $periods[] = $this->getPeriod($this->getFirstDayOfLastMonth());
        $periods[] = $this->getPeriod($this->getFirstDayOfLastTwoMonths());
        $periods[] = $this->getPeriod($this->getFirstDayOfLastThreeMonths());

        return $periods;
    }
}
