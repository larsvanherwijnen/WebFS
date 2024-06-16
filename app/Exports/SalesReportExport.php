<?php

namespace App\Exports;

use App\Models\OrderLine;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class SalesReportExport implements FromCollection, WithColumnFormatting, WithHeadings, WithMapping
{
    public function forDate(Carbon $date): static
    {
        $this->date = $date;

        return $this;
    }

    public function collection(): Collection
    {
        $data = OrderLine::with('dish')->whereBetween('created_at', [$this->date->startOfDay(), $this->date->endOfDay()])->get();

        $grouped = $data->groupBy('dish_id');

        // Map to required format
        $result = $grouped->map(function ($sales) {
            $firstSale = $sales->first();
            $date = Carbon::parse($firstSale->created_at)->format('Y-m-d');
            $dishName = $firstSale->dish->name;
            $quantity = $sales->sum('quantity');

            return [
                'date' => Date::dateTimeToExcel(Carbon::parse($date)),
                'dish' => $dishName,
                'quantity' => $quantity,
            ];
        });

        // Return the result as a collection
        return collect($result->values());
    }

    public function headings(): array
    {
        return [
            'Date',
            'Dish',
            'Quantity',
        ];
    }

    public function map($row): array
    {
        return [
            $row['date'],
            $row['dish'],
            $row['quantity'],
        ];
    }

    public function columnFormats(): array
    {
        return [
            'A' => NumberFormat::FORMAT_DATE_DDMMYYYY,
        ];
    }
}
