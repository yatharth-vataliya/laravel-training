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
        return $this->model->find($id)->delete();
    }

    public function getByLatest(): Collection
    {
        return $this->model->get();
    }

    public function getByDate(?string $start_date, ?string $end_date): Collection
    {
        $query = $this->model->query();
        if (!empty($start_date)) {
//            $start_date = date('Y-m-d', strtotime($start_date." -1 days"));
            $query->where('date', '>=', $start_date);
        }
        if (!empty($end_date)) {
//            $end_date = date('Y-m-d', strtotime($end_date." +1 days"));
            $query->where('date', '<=', $end_date);
        }

        return $query->get();
    }
}
