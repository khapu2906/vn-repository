<?php

/**
 * @method Model get();
 * @method Model create(array $data)
 * @method Model update(Model $model, array $data = [])
 * @method Model delete(Model $model)
 * @method Model paginate(int $limit = 30)
 */


namespace Khapu\VNRepository\Repositories\Itf;

use Illuminate\Database\Eloquent\Model;


interface BasicRepositoryInterface
{
    /**
	 * @param array $where
	 * @param array $columns
	 * @param array $with
	 * @param array $orders
	 * @param bool  $desc = true
     * 
     * @return Model|null
     */
    public function get(array $where = [], array $columns = ['*'], array $with = [], array $orders = ['id'], bool $desc = true);

    /**
	 * @param array $where
	 * @param array $columns
	 * @param array $with
	 * @param array $orders
	 * @param bool  $desc = true
     * 
     * @return Model|null
     */
    public function count(array $where = [], array $columns = ['*'], array $with = [], array $orders = ['id'], bool $desc = true);

    /**
	 * @param array $where
	 * @param array $columns
	 * @param array $with
	 * @param array $orders
	 * @param bool  $desc = true
     * 
     * @return Model|null
     */
    public function first(array $where = [], array $columns = ['*'], array $with = [], array $orders = ['id'],bool $desc = true);

    /**
     * @param array $data
     *
     * @return Model|null
     */
    public function create(array $data);

    /**
     * @param Model
     * @param array $data
     *
     * @return Model|null
     */
    public function update(Model $model, array $data = []);

    /**
     * @param Model
     */
    public function findById(int $id): ?Model;

    /**
     * @param Model
     *
     * @return Model|null
     */
    public function delete(Model $model);

    /**
	 * @param array $where
	 * @param array $columns
	 * @param array $with
	 * @param array $orders
	 * @param bool  $desc = true
     * 
     * @return Model|null
     */
    public function paginate(array $where = [], array $columns = ['*'], array $with = [], array $orders = ['id'], bool $desc = true);

    /**
     * @param string $relationship
     * @param array $ids=null
     *
     * @return Model|null
     */
    public function detach(string $relationship, array $ids = null);

    /**
     * @param string $relationship
     * @param array $ids = null
     *
     * @return Model|null
     */
    public function attach(string $relationship, array $ids = null);

    /**
     * @param string $relationship
     * @param array $conditions = null
     *
     * @return Model|null
     */
    public function sync(string $relationship, array $conditions = null);

    /**
     * @param Model $model
     * @param string $relationship
     * @param array $conditions = null
     *
     * @return Model|null
     */
    static public function syncWithModel(Model $model, string $relationship, array $ids = null);

    /**
     * @param Model $model
     * @param string $relationship
     * @param array $ids = null
     *
     * @return Model|null
     */
    static public function detachWithModel(Model $model, string $relationship, array $ids = null);

    /**
     * @param Model $model
     * @param string $relationship
     * @param array $ids=null
     *
     * @return Model|null
     */
    static public function attachWithModel(Model $model, string $relationship, array $ids = null);

}
