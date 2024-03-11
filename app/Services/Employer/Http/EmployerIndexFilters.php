<?php

namespace App\Services\Employer\Http;

use Illuminate\Http\Request;

class EmployerIndexFilters
{
    public ?string $employer_id = null;

    public function __construct(Request $request)
    {
        $filters = [
            'employer_id' => $request->get('employer_id'),
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
