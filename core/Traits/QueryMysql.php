<?php

namespace Core\Traits;

use Core\QueryBuilderMysql;


/**
 * @method static \Core\QueryBuilderMysql where()
 * @method static \Core\QueryBuilderMysql select()
 * @method static \Core\QueryBuilderMysql from(string $table, $alias = null)
 * @method static \Core\QueryBuilderMysql join(string $join_table, string $on, string $operation, string $to, string $aliasFirstTable = '')
 * @method static \Core\QueryBuilderMysql first(string $namespace, $controller, array $only = [])
 * @method static \Core\QueryBuilderMysql query(string $statement)
 * @method static \Core\QueryBuilderMysql prepare(string $statement, array $attribute)
 * @method static \Core\QueryBuilderMysql orderBy()
 * @method static \Core\QueryBuilderMysql limit()
 * @method static \Core\QueryBuilderMysql groupBy()
 * @method static \Core\QueryBuilderMysql map()
 * @method static \Core\QueryBuilderMysql get()
 * @method static \Core\QueryBuilderMysql last()
 * @method static \Core\QueryBuilderMysql stringify()
 *
 * @see \Core\QueryBuilderMysql
 */
trait QueryMysql
{

    /**
     * @var QueryBuilderMysql|null
     */
    public static ?QueryBuilderMysql $query = null;

    public static function __callStatic($method, $arguments)
    {
        if (is_null(self::$query) || self::$query->getInstance() != get_called_class()) {
            self::$query = new QueryBuilderMysql(get_called_class());
        }
        return call_user_func_array([self::$query, $method], $arguments);
    }
}