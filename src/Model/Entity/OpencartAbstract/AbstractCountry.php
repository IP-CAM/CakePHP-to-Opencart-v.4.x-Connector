<?php

namespace CakePHPOpencart\Model\Entity\OpencartAbstract;

abstract class AbstractCountry extends \CakePHPOpencart\Model\Entity\Entity
{

    protected function _getCode()
    {
        return $this->iso_code_2;
    }

}
