<?php

namespace Khapu\VNRepository\Repositories\Queries;

use Illuminate\Database\Eloquent\Model;

trait BasicQuery
{
    public function get(
        array $where = [], 
        array $columns = ['*'],
        array $with = [],
        array $orders = ['id'],
		bool  $desc = true
    )
    {
        return $this->query('get', $where, $columns, $with, $orders, $desc);
    }

    public function findById(int $id): ?Model
    {
        return $this->modelCriterion->find($id);
    }

    public function first(
        array $where = [], 
        array $columns = ['*'],
        array $with = [],
        array $orders = ['id'],
		bool  $desc = true
    )
    {
        return $this->query('first', $where, $columns, $with, $orders, $desc);
    }

    public function count(
        array $where = [], 
        array $columns = ['*'],
        array $with = [],
        array $orders = ['id'],
		bool  $desc = true
    )
    {
        return $this->query('count', $where, $columns, $with, $orders, $desc);
    }

    public function create(array $data)
    {
        foreach ($data as $k => $v) {
            $this->model->{$k} = $v;
        }
        return $this->model->save();
    }

    public function update(Model $model, array $data = [])
    {
        if (!empty($data)) {
            foreach ($data as $k => $v) {
                $model->{$k} = $v;
            }
        }
        return $model->save();
    }

    public function delete(Model $model)
    {
        return $model->delete();
    }

    public function paginate(
        array $where = [], 
        array $columns = ['*'],
        array $with = [],
        array $orders = ['id'],
        bool  $desc = true)
    {
        return $this->query('paginate', $where, $columns, $with, $orders, $desc);

    }

    public function detach(string $relationship, array $ids = null)
    {
        return $this->model->{$relationship}()->detach($ids);
    }

    public function attach(string $relationship, array $ids = null)
    {
        return $this->model->{$relationship}()->attach($ids);
    }

    public function sync(string $relationship, array $conditions = null)
    {
        return $this->model->{$relationship}()->sync($conditions);
    }

    static public function syncWithModel(Model $model, string $relationship, array $conditions = null)
    {
        return $model->{$relationship}()->sync($conditions);
    }

    static public function detachWithModel(Model $model, string $relationship, array $ids = null)
    {
        return $model->{$relationship}()->detach($ids);
    }

    static public function attachWithModel(Model $model, string $relationship, array $ids = null)
    {
        return $model->{$relationship}()->attach($ids);
    }
}
