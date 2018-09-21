<?php
declare(strict_types=1);
/**
 * Copyright (c) Phauthentic (https://github.com/Phauthentic)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Phauthentic (https://github.com/Phauthentic)
 * @link          https://github.com/Phauthentic
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */
namespace Phauthentic\Authentication\Identifier\Resolver;

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
