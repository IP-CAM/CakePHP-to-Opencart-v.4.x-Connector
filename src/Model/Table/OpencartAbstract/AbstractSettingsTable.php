<?php

namespace CakePHPOpencart\Model\Table\OpencartAbstract;

abstract class AbstractSettingsTable extends \CakePHPOpencart\Model\Table\Table
{

    /**
     * Get multiple settings by their keys
     *
     * @access public
     * @param string[] $keys
     * @return string[]|array values, unserialized if needed, indexed by keys
     */
    public function findByKeys($keys)
    {
        if (is_string($keys)) {
            $keys = [$keys];
        }
        $conditions = array(
            'OR' => [],
        );
        foreach ($keys as $key) {
            $conditions['OR'][] = ['key' => $key];
        }
        $results = $this->find('all', array(
            'conditions' => $conditions,
        ))->toArray();
        $response = array();
        foreach ($results as $result) {
            if ($result->serialized) {
                $result->value = json_decode($result->value);
            }
            $response[$result->key] = $result->value;
        }
        return $response;
    }

    /**
     * Wrapper for findByKeys() tailored to handling just one key and its value
     *
     * @access public
     * @param string $key
     * @return string|array value for the requested key
     */
    public function findByKey($key) {
        $result = $this->findByKeys([$key]);
        // findByKeys() returns values indexed by their keys. Unpack if needed.
        if (is_array($result) && isset($result[$key])) {
            return $result[$key];
        }
        return $result;
    }

}
