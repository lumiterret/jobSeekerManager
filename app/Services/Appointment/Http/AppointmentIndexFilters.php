<?php

namespace App\Services\Appointment\Http;

use Illuminate\Http\Request;

class AppointmentIndexFilters
{
    public ?array $status = [];
    public ?string $employer = null;

    public function __construct(Request $request)
    {
        $filters = [
            'status' => $request->get('status'),
            'employer' => strtolower($request->get('employer_id')),
        ];
        $this->fromArray($filters);
    }

    private function fromArray(array $filters): void
    {
        foreach ($filters as $filterKey => $filterValue) {
            if (property_exists($this, $filterKey)) {
                $this->$filterKey = $filterValue;
            }
        }
    }
}
