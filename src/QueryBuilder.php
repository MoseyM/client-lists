<?php

class QueryBuilder
{
    protected $conn;
    protected $query = '';
    protected $table = '';
    protected $wheres = [];

    /**
     * Sets the database connection.
     */
    function __construct($connection)
    {
        $this->conn = $connection;
    }

    /**
     * Clears the instance and associated attributes
     * for a clean query builder.
     * 
     * @return this
     */
    public function clearIfNeeded()
    {
        if($this->query) {
            $this->query = '';
            $this->wheres = [];
            $this->table = '';
        }

        return $this;
    }

    /**
     * Sets the table to query.
     * 
     * @param  string $tableName The table to set for querying
     * @return this
     */
    public function search(string $tableName)
    {
        $this->table = $tableName;
        return $this;
    }

    /**
     * Adds a where clause to the query.
     * 
     * @param  string $colName The column name
     * @param  string  $value   The value for the column
     * @return this
     */
    public function where(string $colName, string $value)
    {
        $this->wheres[] = "{$colName} = '{$value}'";

        return $this;
    }

    /**
     * Builds the query from selected attributes.
     * 
     * @return this
     */
    protected function buildQuery()
    {
        $this->query = "SELECT * FROM {$this->table} ";
        
        if(count($this->wheres)) {
            $this->query .= "WHERE ";
            foreach($this->wheres as $key => $stmt) {
                if($key === 0) {
                    $this->query .= "({$stmt}) ";
                } else {
                    $this->query .= "AND ({$stmt}) ";
                }
            }
        }

        if(isset($this->limit)) {
            $this->query .= "LIMIT {$this->limit}";
        }

        return $this;
    }

    /**
     * Executes the prepared query.
     */
    public function get()
    {
        $this->buildQuery();

        $res = $this->conn->query($this->query);
        //if there were no results return null.
        if($res->num_rows == 0) {
            return null;
        }
        
        return $res->fetch_all(MYSQLI_ASSOC);
    }
}