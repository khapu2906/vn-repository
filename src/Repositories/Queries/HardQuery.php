<?php

namespace Khapu\VNRepository\Repositories\Queries;
use Illuminate\Database\Eloquent\Model;


trait HardQuery
{
	/**
	 * @param Model $model
	 * @param string $typeWhere
	 * @param any $condition
	 * 
	 * @return Model
	 */
	private function _condition($model, string $typeWhere, $condition)
	{
		try {	
			if (is_array($condition)) {
				$countCondition = count($condition);
				switch ($countCondition) {
					case 3;
						$column =  $condition[0];
						$operator = $condition[1];
						$value = $condition[2];
						break;
					case 2:
						$column =  $condition[0];
						$operator = '=';
						$value = $condition[1];
						break;
				}
				return $model->{$typeWhere}($column, $operator, $value);
			} else {
				return $model->{$typeWhere}($condition);
			}
		} catch (\Exception $e) {
			throw $e->getMessage();
		}
	}

	/**
	 * @param string $type
	 * 
	 * @return string
	 */
	private function _typeWhere(string $type) : string 
	{
		$type = ucfirst($type);
		switch ($type) {
			case 'And':
				$typeWhere = 'where';
				break;
			case 'Or':
				$typeWhere = 'orWhere';
				break;
			default:
				$typeWhere = 'where' . $type;
				break;
		}
		return $typeWhere;
	}

	/**
	 * @param Model $model
	 * @param string $type
	 * 
	 * @return Model
	 */
	private function _typeQuery($model, string $type)
	{
		switch ($type) {
			case 'paginate':
				return $model->{$type}($this->paginate);
			default:
				return $model->{$type}();
		}
	}

	/**
	 * @param Model $model
	 * @param array $columns
	 * @param string $option
	 * 
	 * @return Model
	 */
	private function _orderBy($model, array $columns, string $option)
	{
		foreach ($columns as $column) {
			$model = $model->orderBy($column, $option);
		}
		return $model;
	}


	public function query(
		string $typeQuery = 'get' | 'first' | 'paginate' | 'count', 
		array $where = [], 
		array $columns = ['*'],
		array $with = [], 
		array $orders = ['id'],
		bool  $desc = true
	)
	{
		try {
			// Select 
			$model = $this->modelCriterion->select($columns);

			// Where
			if (!empty($where)) {
				foreach ($where as $value) {
					[$type, $condition] = $value;
					$type = ucfirst($type);
					$typeWhere = $this->_typeWhere($type);
	
					$model = $this->_condition($model, $typeWhere ,$condition);
				}
			}

			// With
			if (!empty($with)) {
				$model = $model->with($with);
			}

			// Order by
			$optionOrder = $desc ? 'DESC' : 'ASC';
			$model = $this->_orderBy($model, $orders, $optionOrder);

			// Query
			return $this->_typeQuery($model, $typeQuery);
		} catch (\Exception $e) {
			throw $e->getMessage();
		}
	}
}
