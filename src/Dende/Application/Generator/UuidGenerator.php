<?php
namespace Dende\Application\Generator;

/**
 * Class UuidGenerator.
 */
class UuidGenerator implements IdGeneratorInterface
{
    /**
     * {@inheritdoc}
     */
    public function generateId()
    {
        return uniqid('');
    }
}
