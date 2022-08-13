<?php

namespace App\Factory;

use App\Entity\Metadata;
use App\Repository\MetadataRepository;
use Zenstruck\Foundry\RepositoryProxy;
use Zenstruck\Foundry\ModelFactory;
use Zenstruck\Foundry\Proxy;

/**
 * @extends ModelFactory<Metadata>
 *
 * @method static Metadata|Proxy createOne(array $attributes = [])
 * @method static Metadata[]|Proxy[] createMany(int $number, array|callable $attributes = [])
 * @method static Metadata|Proxy find(object|array|mixed $criteria)
 * @method static Metadata|Proxy findOrCreate(array $attributes)
 * @method static Metadata|Proxy first(string $sortedField = 'id')
 * @method static Metadata|Proxy last(string $sortedField = 'id')
 * @method static Metadata|Proxy random(array $attributes = [])
 * @method static Metadata|Proxy randomOrCreate(array $attributes = [])
 * @method static Metadata[]|Proxy[] all()
 * @method static Metadata[]|Proxy[] findBy(array $attributes)
 * @method static Metadata[]|Proxy[] randomSet(int $number, array $attributes = [])
 * @method static Metadata[]|Proxy[] randomRange(int $min, int $max, array $attributes = [])
 * @method static MetadataRepository|RepositoryProxy repository()
 * @method Metadata|Proxy create(array|callable $attributes = [])
 */
final class MetadataFactory extends ModelFactory
{
    public function __construct()
    {
        parent::__construct();

        // TODO inject services if required (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#factories-as-services)
    }

    protected function getDefaults(): array
    {
        return [
            // TODO add your default values here (https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#model-factories)
            'code' => self::faker()->numberBetween(100, 200),
            'content' => self::faker()->text(),
        ];
    }

    protected function initialize(): self
    {
        // see https://symfony.com/bundles/ZenstruckFoundryBundle/current/index.html#initialization
        return $this
            // ->afterInstantiate(function(Metadata $metadata): void {})
        ;
    }

    protected static function getClass(): string
    {
        return Metadata::class;
    }
}
