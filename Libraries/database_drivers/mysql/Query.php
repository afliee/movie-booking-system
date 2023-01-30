<?php

namespace Libraries\database_drivers\mysql;

use Libraries\database_drivers\Model;

class Query
{
    use Builder;

    public string $table;
    public string $str_where;

    public function __construct($table, $db = null)
    {
        $this->table = $table;
        $this->db = $db;
    }

    public function where($column, $value): static
    {
        $value = cleanData($value);
        if (isset($this->str_where)) {
            $add_query = ' AND '.$column.' = "'.$value.'"';
            $this->str_where .= $add_query;
        } else {
            $query = ' WHERE '.$column.' = "'.$value.'"';
            $this->str_where = $query;
        }

        return $this;
    }

    public function whereIn($column, $values): static
    {
        $values = cleanData($values);
        $values = '("'.implode('", "', $values).'")';
        if (isset($this->str_where)) {
            $add_query = ' AND '.$column.' IN '.$values;
            $this->str_where .= $add_query;
        } else {
            $query = ' WHERE '.$column.' IN '.$values;
            $this->str_where = $query;
        }

        return $this;
    }

    public function first(): Model|null
    {
        $data = $this->callFirst();
        if (empty($data)) {
            return null;
        }
        $model = new ('\App\Models\\'.ucfirst($this->table))();
        $this->setAttributes($model, $data);

        return $model;
    }

    public function find($id): Model|null
    {
        $data = $this->callFind($id);
        if (empty($data)) {
            return null;
        }
        $model = new ('\App\Models\\'.ucfirst($this->table))();

        $this->setAttributes($model, $data);

        return $model;
    }

    public function get($column = [])
    {
        return $this->callGet($column);
    }

    public function update($data = []): bool
    {
        return $this->callUpdate($data);
    }

    public function delete(): bool
    {
        return $this->callDelete();
    }

    public function destroy($ids): int
    {
        return $this->callDestroy($ids);
    }

}