<?php
namespace Dende\Application\Repository\InMemory;

use Doctrine\Common\Collections\Collection;

trait FilterTrait
{
    /**
     * @param array $parameters
     *
     * @return array
     */
    private function filter($data, array $parameters = [])
    {
        if ($data instanceof Collection) {
            $data = $data->toArray();
        }

        if (!array_key_exists('deleted', $parameters)) {
            $parameters['deleted'] = null;
        }

        return array_filter($data, function ($object, $id) use ($parameters) {
            $matched = false;

            foreach ($parameters as $parameterName => $parameterValue) {
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
