<?php
/**
 * Created by Maksym Ignatchenko, Appus Studio LP on 03.04.19
 *
 */

namespace App\Models;

use Doctrine\DBAL\Query\QueryException;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BaseModel extends Model
{
    use CustomPaginatorTrait;

    public function resolveRouteBinding($value)
    {
        try {
            $model = $this->where('id', (int) $value)->firstOrFail();
        } catch (ModelNotFoundException $exception) {
            $exception->setModel(class_basename(static::class));
            throw $exception;
        } catch (QueryException $exception) {
            $exception = new ModelNotFoundException();
            $exception->setModel(class_basename(static::class));
            throw $exception;
        }
        return $model;
    }
}