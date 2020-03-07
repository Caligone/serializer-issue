<?php

namespace App;

use Symfony\Component\Serializer\Annotation\DiscriminatorMap;

/**
 * @DiscriminatorMap(typeProperty="type", mapping={
 *    "cat"="App\Cat",
 *    "dog"="App\Dog"
 * })
 */
interface AnimalInterface
{

}