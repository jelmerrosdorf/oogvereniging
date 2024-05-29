<?php

namespace App\Exports;

use App\Models\Event;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class EventUsersExport implements FromCollection, WithHeadings, WithMapping
{
    protected $event_id;

    public function __construct($event_id)
    {
        $this->event_id = $event_id;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // Retrieve the users signed up for the specified event
        $event = Event::findOrFail($this->event_id);
        return $event->users()->select('name', 'email')->get();
    }

    /**
     * Define the headings for the spreadsheet
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'Naam',
            'Emailadres'
        ];
    }

    /**
     * Map the data for each row
     *
     * @param mixed $user
     * @return array
     */
    public function map($user): array
    {
        return [
            $user->name,
            $user->email,
        ];
    }
}
