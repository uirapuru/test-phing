<?php
namespace Dende\Application\Repository\InMemory;

trait FilterTrait
{
    /**
     * @param array $parameters
     * @return array
     */
    private function filter(array $data = [], array $parameters = [])
    {
        if(count($parameters) === 0) {
            return $data;
        }

        return array_filter($data, function ($object, $id) use ($parameters) {
            $matched = false;

            foreach($parameters as $parameterName => $parameterValue) {
                if ($object->$parameterName() === $parameterValue) {
                    $matched = true;
                } else {
                    return false;
                }
            }

            return $matched;
        }, ARRAY_FILTER_USE_BOTH);
    }
}