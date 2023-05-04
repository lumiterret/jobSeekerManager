<?php

namespace App\Services\Employer\Http;

use Illuminate\Http\Request;

class EmployerIndexFilters
{
    public ?string $employer = null;

    public function __construct(Request $request)
    {
        $filters = [
            'employer' => $request->get('employer-title'),
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
