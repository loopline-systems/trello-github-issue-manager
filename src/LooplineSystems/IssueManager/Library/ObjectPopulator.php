<?php

namespace LooplineSystems\IssueManager\Library;

class ObjectPopulator
{

    /**
     * @param $object
     * @param array $data
     * @return mixed
     */
    public static function populate($object, array $data = null)
    {
        if (! $data) {
            return $object;
        }

        $filter = new \Zend\Filter\Word\UnderscoreToCamelCase();
        
        foreach ($data as $key => $val) {
            $setter = 'set' . $filter->filter($key);

            if (method_exists($object, $setter)) {
                $object->$setter($val);
            }
        }

        return $object;
    }



}
