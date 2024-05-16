<?php

namespace CakePHPOpencart\Model\Entity\OpencartAbstract;

use Cake\ORM\Entity;

abstract class AbstractCountry extends Entity
{

    protected function _getCode()
    {
        return $this->iso_code_2;
    }

}
