<?php
namespace Dende\Bundle\AppBundle\Repository;

use Dende\Application\Repository\TaskRepositoryInterface;
use Dende\Domain\Task;
use Doctrine\ORM\EntityRepository;

/**
 * Class TasksRepository.
 */
class TasksRepository extends EntityRepository implements TaskRepositoryInterface
{
    /**
     * {@inheritdoc}
     */
    public function insert(Task $task)
    {
        $this->getEntityManager()->persist($task);
        $this->getEntityManager()->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function remove(Task $task)
    {
        $this->getEntityManager()->remove($task);
        $this->getEntityManager()->flush();
    }

    /**
     * {@inheritdoc}
     */
    public function update(Task $task)
    {
        $this->getEntityManager()->merge($task);
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
