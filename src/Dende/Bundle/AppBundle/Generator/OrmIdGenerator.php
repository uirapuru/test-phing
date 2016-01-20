<?php
namespace Dende\Bundle\AppBundle\Generator;

use Dende\Application\Generator\IdGeneratorInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Id\UuidGenerator;

/**
 * Class IdGenerator.
 */
final class OrmIdGenerator extends UuidGenerator implements IdGeneratorInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $em;
    /**
     * IdGenerator constructor.
     *
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
    /**
     * @return bool|mixed|string
     */
    public function generateId()
    {
        return parent::generate($this->em, null);
    }
}
