<?php
namespace Dende\Application\Generator;

/**
 * Class UuidGenerator
 * @package Dende\Application\Generator
 */
class UuidGenerator implements IdGeneratorInterface
{
    /**
     * @inheritDoc
     */
    public function generate()
    {
        return uniqid();
    }
}