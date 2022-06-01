<?php

/**
 * @method Model get(array $where = [], array $columns = ['*'], array $with = [], array $orders = ['id'], bool $desc = true);
 * @method Model count(array $where = [], array $columns = ['*'], array $with = [], array $orders = ['id'], bool $desc = true);
 * @method Model first(array $where = [], array $columns = ['*'], array $with = [], array $orders = ['id'], bool $desc = true);
 * @method Model paginate(array $where = [], array $columns = ['*'], array $with = [], array $orders = ['id'], bool $desc = true);
 * 
 * @method Model findById(int $id)
 * @method Model create(array $data)
 * @method Model update(Model $model, array $data = [])
 * @method Model delete(Model $model)
 * 
 * @method Model detach(string $relationship, array $ids = null);
 * @method Model attach(string $relationship, array $ids = null);
 * @method Model sync(string $relationship, array $conditions = null);
 * 
 * @static @method Model syncWithModel(Model $model, string $relationship, array $conditions = null);
 * @static @method Model attachWithModel(Model $model, string $relationship, array $ids = null);
 * @static @method Model detachWithModel(Model $model, string $relationship, array $ids = null);
 * 
 * @method Model query(
 * 						string $typeQuery = 'get' | 'first' | 'paginate' | 'count', 
 * 						array $where = [], 
 * 						array $columns = ['*'], 
 * 						array $with = [], 
 * 						array $orders = ['id'], 
 * 						bool $desc = true);
 */


namespace Khapu\VNRepository\Repositories\Itf;

interface RepositoryInterface extends 
	BasicRepositoryInterface,
	HardRepositoryInterface
{

}
