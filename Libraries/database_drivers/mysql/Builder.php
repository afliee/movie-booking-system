<?php

namespace Libraries\database_drivers\mysql;

use mysqli;

trait Builder
{
    protected $db;
    public int $id;

    public function database(): mysqli
    {
        if (empty($this->db) && empty($this->db_connection)) {
            $this->db = new mysqli
            (
                env('DATABASE_HOST'), env('DATABASE_USERNAME'),
                env('DATABASE_PASSWORD'), env('DATABASE_NAME')
            );
            $this->db->set_charset('utf8');
            return $this->db;
        }

        return $this->db ?? $this->db_connection;
    }

    public function __destruct()
    {
        if (! isset($this->db_connection)) {
            $this->database()->close();
        }
    }

    public function callFirst(): bool|array|null
    {
        $query = 'SELECT * FROM '.$this->table;
        $query .= $this->str_where ?? '';
        $query .= ' LIMIT 1';

        return $this->database()->query($query)->fetch_assoc();
    }

    public function callFind($id): bool|array|null
    {
        $id = cleanData($id);
        $query = 'SELECT * FROM '.$this->table;
        $query .= $this->str_where ?? '';
        $query .= isset($this->str_where) ? ' AND id = "'.$id.'"' : ' WHERE id= "'.$id.'"';
        $query .= ' LIMIT 1';

        return $this->database()->query($query)->fetch_assoc();
    }

    public function callGet($column)
    {
        if (empty($column)) {
            $column = '* ';
        } else {
            $column = 'id, '.implode(', ', $column).' ';
        }
        $query = 'SELECT '.$column.'FROM '.$this->table;
        $query .= $this->str_where ?? '';

        return $this->database()->query($query)->fetch_all(MYSQLI_ASSOC);
    }

    public function callWhere($column, $values, $table): Query
    {
        $query = new Query($table);
        $query->where($column, $values);

        return $query;
    }

    public function callWhereIn($column, $value, $table): Query
    {
        $query = new Query($table);
        $query->whereIn($column, $value);

        return $query;
    }

    public function callCreate($data = [], $table = null): int
    {
        $data = cleanData($data);
        $columns = '('.implode(', ', array_keys($data)).')';
        $values = $this->getCreateValues($data);
        $query = 'INSERT INTO '.$table.' '.$columns.' VALUES '.$values;
        $this->database()->query($query);

        return $this->database()->insert_id;
    }

    public function callUpdate($data = []): bool
    {
        $data = cleanData($data);
        $str_set = $this->getUpdateValues($data);
        $query = 'UPDATE '.$this->table.' SET '.$str_set;
        $query .= $this->str_where ?? '';

        $id = $this->id ?? null;
        if (isset($id)) {
            if (isset($this->str_where)) {
                $query .= ' AND id = "'.$id.'"';
            } else {
                $query .= ' WHERE id= "'.$id.'"';
            }
        }
        return $this->database()->query($query);
    }

    public function callDelete(): bool
    {
        $query = 'DELETE FROM '.$this->table;
        $query .= isset($this->id) ? ' WHERE id = "'.$this->id.'"' : '';
        $query .= $this->str_where ?? '';
        $this->database()->query($query);

        return ($this->database()->affected_rows > 0 && $this->database()->affected_rows);
    }

    public function callDestroy($ids): int
    {
        $count = 0;
        foreach ($ids as $id) {
            $model = new ('\App\Models\\'.ucfirst($this->table))();
            $model->id = $id;
            if ($model->callDelete()) {
                $count++;
            }
        }

        return $count;
    }

    public function callRaw($sql)
    {
        if (str_starts_with($sql, 'SELECT')) {
            return $this->database()->query($sql)->fetch_all(MYSQLI_ASSOC);
        }

        return $this->database()->query($sql);
    }

    private function getUpdateValues($data): string
    {
        $str_set = '';
        foreach ($data as $column => $value) {
            if (in_array($column, $this->not_string_attributes ?? [], true)) {
                $str_set .= $column.' = '.$value.', ';
            } else {
                $str_set .= $column.' = "'.$value.'", ';
            }
        }

        return substr($str_set, 0, -2);
    }

    private function getCreateValues($data): string
    {
        $values = '(';
        foreach ($data as $column => $value) {
            if (in_array($column, $this->not_string_attributes ?? [], true)) {
                $values .= $value.',';
            } else {
                $values .= '"'.$value.'",';
            }
        }

        return substr($values, 0, -1).')';
    }

    private function setAttributes($model, $data): void
    {
        foreach ($data as $key => $value) {
            $model->$key = $value;
            $model->attributes[$key] = $value;
        }
    }

}