<?php
// app/database/QueryBuilder.php

class QueryBuilder
{
    // Propiedades para la consulta
    private $select;
    private $from;
    private $where;
    private $orderBy;
    private $orderDirection;
    private $groupBy;
    private $having;
    private $params; // Parámetros para las sentencias preparadas

    // Constructor para iniciar la consulta
    public function __construct()
    {
        $this->select = '*';
        $this->from = '';
        $this->where = '';
        $this->orderBy = '';
        $this->orderDirection = 'ASC';
        $this->groupBy = '';
        $this->having = '';
        $this->params = [];
    }

    // Métodos para construir la consulta
    public function select($columns = '*')
    {
        if (is_array($columns)) {
            $this->select = implode(', ', $columns);
        } else {
            $this->select = $columns;
        }

        return $this;
    }

    public function from($table)
    {
        $this->from = $table;
        return $this;
    }

    public function where($condition, $params = [])
    {
        $this->where = 'WHERE ' . $condition;
        $this->params = $params;
        return $this;
    }

    public function orderBy($column, $direction = 'ASC')
    {
        $this->orderBy = 'ORDER BY ' . $column;
        $this->orderDirection = $direction;
        return $this;
    }

    public function groupBy($column)
    {
        $this->groupBy = 'GROUP BY ' . $column;
        return $this;
    }

    public function having($condition, $params = [])
    {
        $this->having = 'HAVING ' . $condition;
        $this->params = $params;
        return $this;
    }

    // Método para obtener la consulta SQL completa
    public function getQuery()
    {
        $query = "SELECT {$this->select} FROM {$this->from} {$this->where} {$this->groupBy} {$this->having} {$this->orderBy} {$this->orderDirection}";
        return $query;
    }

    // Método para ejecutar la consulta con sentencia preparada
    public function execute()
    {
        require_once 'app/models/Database.php';
        $db = new Database();
        
        $query = $this->getQuery();
        $stmt = $db->getConnection()->prepare($query);

        if (!empty($this->params)) {
            foreach ($this->params as $param => $value) {
                $stmt->bindParam($param, $value);
            }
        }

        try {
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            die('Error en la consulta: ' . $e->getMessage());
        }
    }
}
?>
