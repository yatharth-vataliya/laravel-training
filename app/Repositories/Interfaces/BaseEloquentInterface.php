<?php

namespace App\Repositories\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface BaseEloquentInterface
{
    public function getAll(): Collection;

    public function create(array $fields): Model;

    public function getById($id): ?Model;

    public function truncate(): bool;

    public function deleteById($id): bool;
}
