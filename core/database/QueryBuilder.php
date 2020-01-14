<?php
/**
 * Created by: stephanhoeksema 2018
 * phpoop
 */
namespace MVC\database;

class QueryBuilder
{
    public static $pdo;

    /**
     * @inheritDoc
     * @var $table defines table of the database
     */

    public function selectAll($table, $intoClass)
    {
        /**
         * @var $statement all data for given table
         * @var $intoClass define class for output
         */
        $sql = "SELECT * FROM {$table}";
        return self::execute($sql, $intoClass);
    }
    /*
            * Create entry for the database
            * @var $values defines the values for the table to be inserted
       * */
    // Create table values with given $table and $values in array with key is columns
    public function create($table, array $values)
    {
        $colum_key = array_keys($values);
        $value_key = array_values($values);
        // Make a string of the keys of $values and seperate it with a comma
        $comma_seperated = implode(",", $colum_key);
        // Makes a string of the values of $values with quotes and seperate each with a comma
        $comma_seperated_values = "'" . implode("','", $value_key) . "'";
        $sql = "INSERT INTO {$table} ({$comma_seperated}) VALUES ({$comma_seperated_values})";
        return self::execute($sql);

    }
    /*
            * execute entry to execute all given queries
            * @var $query is the database query to to executed
            * @var $class define class for output with default value of null
       * */
    // Execute all the given queries
    public function execute($query, $class = '')
    {

        $check = false;
        $results = [];
        $statement = QueryBuilder::$pdo->prepare($query);
        if($statement->execute()){
            $check = true;
        }
        // Check if the executes query is an select or insert/update/delete to return result or boolean
        if(strpos($statement->queryString, 'SELECT') !== false ||strpos($statement->queryString, 'show') !== false){
            if(empty($class)){
                // fetch all the results
                while($row = $statement->fetch()){
                    $results[] = $row;
                }
                return $results;
            }else{
                return $statement->fetchAll(\PDO::FETCH_CLASS, 'MVC\\model\\'. $class);

            }

        }
        return $check;
    }
    /*
            * select entry in the database with given table and selected columns; default columns value will select all
            * @var $table defines the table to be updated
       * */
    // Select a table
    public function select($table, $colums = '*', $intoClass = '')
    {
        $sql = "SELECT $colums FROM $table";
        return self::execute($sql, $intoClass);
    }
    /*
            * SelectWhere entry in the database
            * @var $table defines the table to be updated
            * @var $columsValues the SET columns with the value to be updated
            * @var $valuesCondition defines the WHERE conditions
       * */
    // select a table with a conditions with given colums, table and the conditions
    public function selectWhere($fields = "*", $table, $valuesConditions)
    {
        // seperate the given array $valuesCondition to make conditions for the WHERE statement
        $seperatedConditions = self::seperateConditions($valuesConditions, 'AND');
        $sql = "SELECT {$fields} FROM {$table} WHERE {$seperatedConditions}";
        return self::execute($sql);
    }

    /*
         * Update an function in the database
         * @var $table defines the table to be updated
         * @var $columsValues the SET columns with the value to be updated
         * @var $valuesCondition defines the WHERE conditions
    * */
    public function update($table, $columnsValues, $valuesConditions)
    {
        $seperatedColumsValues = self::seperateConditions($columnsValues, ',');
        $seperatedConditions = self::seperateConditions($valuesConditions, 'AND');
        $sql = "UPDATE {$table} SET {$seperatedColumsValues} WHERE {$seperatedConditions}";
        return self::execute($sql);
    }
    /*
        * seperatedConditions to make a string and seperate associate array
        * @var $values is given associate array to be seperated
        * @var $typeRegex define the regex of the query

   * */
    public function seperateConditions($values, $typeRegex)
    {
        /**
         * @var $seperatedConditions defines the query conditions with given regex
         */
        $seperatedConditions = implode(" {$typeRegex} ", array_map(
                function ($v, $k) { return sprintf("%s='%s'", $k, $v); },
                $values,
                array_keys($values))
        );
        return $seperatedConditions;
    }
    /*
            * Delete an function in the database
            * @var $table defines the table to be updated
            * @var $valuesCondition the condition to be execute
       * */
    public function delete($table, $valuesCondition)
    {
        $valuesCondition = self::seperateConditions($valuesCondition, 'AND');
        $sql = "DELETE FROM {$table} WHERE {$valuesCondition}";
        return self::execute($sql);
    }


}