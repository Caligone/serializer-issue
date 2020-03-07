<?php

namespace App;

use Symfony\Component\Serializer\Annotation\DiscriminatorMap;

abstract class AbstractEntity
{
    public $id;
}