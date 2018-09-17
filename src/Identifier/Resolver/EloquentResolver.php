<?php
declare(strict_types=1);

namespace Authentication\Identifier\Resolver;

use ArrayAccess;
use ArrayObject;
use Illuminate\Database\Eloquent\Model;

/**
 * Eloquent ORM Resolver
 */
class EloquentResolver implements ResolverInterface
{
    /**
     * Eloquent Model
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $model;

    /**
     * Constructor.
     *
     * @param \Illuminate\Database\Eloquent\Model
     * @param array $config Config array.
     */
    public function __construct(Model $model, array $config = [])
    {
        $this->model = $model;
    }

    /**
     * {@inheritDoc}
     */
    public function find(array $conditions): ArrayAccess
    {
        $result = $this->model->where($conditions)->take(1)->get();

        $result = $result->toArray();
        if (!empty($result)) {
           return new ArrayObject($result[0]);
        }

        return null;
    }
}
