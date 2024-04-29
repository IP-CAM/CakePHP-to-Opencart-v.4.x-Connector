<?php

namespace CakePHPOpencart\Model\Entity\OpencartCommon;

use Cake\ORM\Entity;

class Country extends Entity
{

    protected function _getCode()
    {
        return $this->iso_code_2;
    }

}
