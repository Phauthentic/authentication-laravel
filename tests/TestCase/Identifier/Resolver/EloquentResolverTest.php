<?php
declare(strict_types=1);

namespace Authentication\Test\TestCase\Identifier\Resolver;

use Authentication\Identifier\Resolver\EloquentResolver;
use Authentication\Test\TestCase\AuthenticationTestCase;
use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Database\Connection;
use Illuminate\Database\ConnectionResolverInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * User Model
 */
class UserModel extends Model {}

/**
 * EloquentResolverTest
 */
class EloquentResolverTest extends AuthenticationTestCase
{
    /**
     * Eloquent User Model
     *
     * @var \Authentication\Test\TestCase\Identifier\Resolver\UserModel
     */
    protected $model;

    /**
     * @inheritDoc
     */
    public function setUp(): void
    {
        parent::setUp();

        $resolverMock = $this->getMockBuilder(ConnectionResolverInterface::class)
            ->getMock();

        UserModel::setConnectionResolver($resolverMock);

        $connection = new Connection($this->getConnection()->getConnection());

        $resolverMock->expects($this->any())
            ->method('getDefaultConnection')
            ->willReturn($connection);

        $resolverMock->expects($this->any())
            ->method('connection')
            ->willReturn($connection);

        $model = new UserModel();
        $model->setTable('users');
        $model->setConnection('default');

        $this->model = model;
    }

    /**
     * testFindDefault
     *
     * @return void
     */
    public function testFindDefault(): void
    {
        $resolver = new EloquentResolver($this->model);
        $result = $resolver->find([
            'username' => 'florian'
        ]);

        $this->assertInstanceOf(\ArrayAccess::class, $result);
        $this->assertEquals($result['username'], 'florian');
    }
}
