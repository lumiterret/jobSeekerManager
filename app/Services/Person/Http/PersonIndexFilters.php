<?php

namespace App\Services\Person\Http;

use Illuminate\Http\Request;

class PersonIndexFilters
{
    public ?string $firstName = null;

    public function __construct(Request $request)
    {
        $filters = [
            'firstName' => $request->get('f-name'),
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
