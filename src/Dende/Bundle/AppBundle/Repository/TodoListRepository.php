<?php
namespace Dende\Bundle\AppBundle\Repository;

use Dende\Application\Repository\ListRepositoryInterface;
use Dende\Domain\TodoList;
use Doctrine\ORM\EntityRepository;

/**
 * Class TodoListRepository.
 */
class TodoListRepository extends EntityRepository implements ListRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function insert(TodoList $todoList)
    {
        $this->getEntityManager()->persist($todoList);
        $this->getEntityManager()->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function remove(TodoList $todoList)
    {
        $this->getEntityManager()->remove($todoList);
        $this->getEntityManager()->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function update(TodoList $todoList)
    {
        $this->getEntityManager()->merge($todoList);
        $this->getEntityManager()->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function findOne(array $parameters = [])
    {
        return $this->findOneBy($parameters);
    }

    /**
     * @inheritDoc
     */
    public function findAll(array $parameters = [])
    {
        return parent::findAll();
    }
}
