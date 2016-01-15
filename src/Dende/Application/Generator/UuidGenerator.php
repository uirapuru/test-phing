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
    public function generate()
    {
        return uniqid('');
    }
}
