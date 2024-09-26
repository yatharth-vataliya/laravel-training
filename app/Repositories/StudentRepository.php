<?php

namespace App\Repositories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Model;

class StudentRepository
{
    private $model = null;

    public function __construct(private Student $student)
    {
        $this->model = $student;
    }

    public function getAll()
    {
        return $this->model->get();
    }

    public function create($data): Model
    {
        return $this->model::create($data);
    }

    public function updateStudent($data, $model)
    {
        // $model->update($data);
        $this->model::where('id', $model->id)->update($data);
    }

    public function getById($id): ?Model {}

    public function truncate(): bool
    {
        // TODO: Implement truncate() method.
    }

    public function deleteById($id): bool
    {
        return $this->model->destroy($id);
    }
}
