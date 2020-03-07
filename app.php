<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;

$autoloader = require __DIR__ . '/vendor/autoload.php';

AnnotationRegistry::registerLoader(array($autoloader, 'loadClass'));

use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Mapping\ClassDiscriminatorFromClassMetadata;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

use App\AnimalInterface;
use App\Cat;

$classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));

$discriminator = new ClassDiscriminatorFromClassMetadata($classMetadataFactory);

$serializer = new Serializer(
    [new ObjectNormalizer($classMetadataFactory, null, null, null, $discriminator)],
    ['json' => new JsonEncoder()]
);


$serialized = $serializer->serialize(new Cat(), 'json');

echo $serialized;

$animal = $serializer->deserialize($serialized, AnimalInterface::class, 'json');

echo get_class($animal);
