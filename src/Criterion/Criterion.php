<?php

namespace Khapu\VNRepository\Criterion;

use Illuminate\Database\Eloquent\Model;

interface Criterion
{
	/**
	 * @param Model $model
	 * 
	 * @return Model
	 */
	public function admit(Model $model);
}