<?php

namespace App\Exports;

use App\Models\Event;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class EventsExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Event::all();
    }

    /**
     * Define the headings for the spreadsheet
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'Titel',
            'Starttijd',
            'Eindtijd',
            'Locatie',
            'Prijs niet-leden',
            'Prijs leden',
            'Omschrijving',
            'Provincie',
            'Onderwerp'
        ];
    }

    /**
     * Map the data for each row
     *
     * @param mixed $user
     * @return array
     */
    public function map($event): array
    {
        return [
            $event->title,
            $event->datetime_start,
            $event->datetime_end,
            $event->location,
            $event->price,
            $event->price_member,
            $event->description,
            $event->tag_province,
            $event->tag_subject
        ];
    }
}
