<?php

/**
 * @method Model rawFilter(array $where = [], array $with = [], bool $first = false);
 */


namespace Khapu\VNRepository\Repositories\Itf;

interface HardRepositoryInterface
{
	/**
	 * @param string $typeQuery = 'get' | 'first' | 'paginate' | 'count'
	 * @param array $where
	 * @param array $columns
	 * @param array $with
	 * @param array $orders
	 * @param bool  $desc = true
	 * 
	 * @return /Model
	 */
	public function query(
		string $typeQuery = 'get' | 'first' | 'paginate' | 'count', 
		array $where = [], 
		array $columns = ['*'],
		array $with = [], 
		array $orders = ['id'],
		bool  $desc = true
	);
}
