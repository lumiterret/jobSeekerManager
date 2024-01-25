<?php

namespace App\Services\Vacancy\Http;

use Illuminate\Http\Request;
use App\Models\Vacancy;

class VacancyIndexFilters
{
    public ?array $status = [];
    public ?string $employer = null;
    public ?bool $isFavorite = null;

    public function __construct(Request $request)
    {
        $filters = [
            'status' => $request->get('status'),
            'employer' => strtolower($request->get('employer')),
            'isFavorite' => $request->get('is_favorite'),
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
