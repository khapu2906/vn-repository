<?php

namespace Khapu\VNRepository\Repositories\Abs;

use Khapu\VNRepository\Repositories\Itf\
{
    BasicRepositoryInterface, 
    HardRepositoryInterface
};
use Illuminate\Database\Eloquent\Model;
use Khapu\VNRepository\Repositories\Queries\{
    BasicQuery,
    HardQuery
};

abstract class Repository 
    implements 
        HardRepositoryInterface,
        BasicRepositoryInterface
{
    use HardQuery, BasicQuery;

    /**
     * @var Illuminate\Database\Eloquent\Model
     */
    protected $model = null;

    /**
     * @var Illuminate\Database\Eloquent\Model
     */
    protected $modelCriterion = null;

    public $paginate = 20;

    public $criterions = [];

    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->modelCriterion = $model;
        $this->setCriterion();
    }

    protected function setCriterion()
    {
        foreach ($this->criterions as $criterion) {
            $cri = new $criterion;
            $this->modelCriterion = $cri->admit($this->modelCriterion);
        }
    }
}
