<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use App\Models\ManageUser;

class ManageUserRepository implements Interfaces\ManageUserRepositoryInterface
{


    public function __construct(private ManageUser $model)
    {

    }

    public function getAll(): Model
    {
        return $this->model->all();
    }

    public function create(array $fields): Model
    {
        return $this->model->create($fields);
    }

    public function getById($id): ?Model
    {
        return $this->model->find($id);
    }

    public function truncate(): bool
    {
        return $this->model->truncate();
    }

    public function deleteById($id): bool
    {
        return $this->model->destroy();
    }

    public function getByLatest() : Collection {
        return $this->model->latest()->get();
    }
}
