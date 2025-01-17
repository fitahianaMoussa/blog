<?php

namespace App\Models;

use PDO;
use Database\DBConnection;

abstract class Model{
    protected $db;
    protected $table;

    public function __construct(DBConnection $db)
    {
        $this->db = $db;
    }

    public function all(): array
    {
        return $this->query("SELECT * FROM {$this->table} ORDER BY created_at DESC ");
    }

    public function findById(int $id): Model
    {
        return $this->query("SELECT * FROM {$this->table} WHERE id = ?",[$id],true);
        
    }

    public function destroy(int $id)
    {
        return $this->query("DELETE FROM {$this->table} WHERE id = ?",[$id]);
    }


    public function update(int $id,array $data, ?array $relations = null)
    {   
        $i = 1;
        $sqlRequestPart = "";

        foreach ($data as $key => $value) {
            $comma = $i === count($data) ? " " : ",";
            $sqlRequestPart .= "{$key} = :{$key}{$comma}";
            $i++;
        }

        $data['id'] = $id;

        return $this->query("UPDATE {$this->table} SET {$sqlRequestPart} WHERE id = :id ",$data);
    }


    public function create(array $data, ?array $relations = null)
    {
        
        $firstParenthesis = "";
        $seconParenthesis = "";
        $i = 1;

        foreach($data as $key => $value){
            $comma = $i === count($data) ? "" : "," ;

            $firstParenthesis .= "{$key}{$comma}";
            $seconParenthesis .= ":{$key}{$comma}";
            $i++;
        }

        return $this->query("INSERT INTO {$this->table} ($firstParenthesis) VALUES ($seconParenthesis)",$data);

    }


    public function query(string $sql, array $param = null, bool $single = null)
    {
        $method = is_null($param) ? 'query' : 'prepare';
        $fetch = is_null($single) ? 'fetchAll' : 'fetch';

        if(strpos($sql,'DELETE') === 0 || strpos($sql, 'UPDATE') === 0 || strpos($sql,'INSERT') === 0){
            $stmt = $this->db->getPDO()->$method($sql);
            $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]); 
            return $stmt->execute($param);
        }

        $stmt = $this->db->getPDO()->$method($sql);
        $stmt->setFetchMode(PDO::FETCH_CLASS, get_class($this), [$this->db]);

        if ($method === 'query') {
            return $stmt->$fetch();
        } else {
            if (is_array($param)) {
                $stmt->execute($param);
            } else {
                $stmt->execute([$param]);
            }
            return $stmt->$fetch();
        }
    }



}