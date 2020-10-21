<?php 

interface query_sql{

  public function select($colum, $table, $condition);

  public function custom_query($query);

  public function update($table, $colums, $condition);

  public function delete($table, $condition);

  public function insert($table, $colums, $test_values);
  
}