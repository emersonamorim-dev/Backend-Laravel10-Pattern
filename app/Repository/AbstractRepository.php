<?php

declare(strict_types=1);

namespace App\Repository;

use App\Interfaces\RepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository implements RepositoryInterface
{
    protected static $model;

    public static function loadModel(): Model
    {
        return app(static::$model);
    }

    public static function all(): Collection
    {
        return self::loadModel()::all();
    }

    public static function find(int $id): ?Model
    {
        return self::loadModel()::query()->find($id);
    }

    public static function create(array $attributes = []): ?Model
    {
        return self::loadModel()::query()->create($attributes);
    }

    public static function delete(int $id): int
    {
        return self::loadModel()::query()->where(['id' => $id])->delete();
    }

    public static function update(int $id, array $attributes = []): int
    {
        return self::loadModel()::query()->where(['id' => $id])->update($attributes);
    }

    public static function findById(int $id): ?Model
    {
        return self::loadModel()::query()->find($id);
    }

    public static function getOrderedByColumn(string $column, int $limit, array $select = ['*']): Collection
    {
        return self::loadModel()::query()
            ->orderBy($column)
            ->limit($limit)
            ->get($select);
    }

    public static function save(Model $model): bool
    {
        return $model->save();
    }
}