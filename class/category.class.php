<?php

include "categorysql.class.php";

class Category
{
  private $id_category;
  private $category_name;
  private $mother_category;
 
  private $categories_list;
            
   /*
   GETTERS
   */
   // get idcategory
  public function getIdCategory()
  {
    return $this->id_category;
}	
	   // get category_name
  public function getCategoryName()
  {
    return $this->category_name;
  }	
	   // get category_mother
  public function getCategoryMother()
  {
    return $this->mother_category;
	}
	
        
    // get categories list
    public function getCategoriesList($mainCategory = false){
	  $categorySql = new CategorySql();
	  $categories_sql= $categorySql->selectCategoriesList($mainCategory);
          $categories_list = array();
                  
	  while ($row = $categories_sql->fetch()) 
		{
		$categories_list[$row['id_category']] = $row['name_category'];
		} 
	  //TODO setup $categories_list from query results
	  // structure of $categories_list : Array('id','name')
	  return $categories_list;
	  }
	
	/*
  SETTERS
  */
   
   // set idcategory
  public function setIdCategory($id_category)
  {
   $this->id_category = $id_category;
  } 
   // set category_name
  public function setCategoryName($category_name)
  {
   $this->category_name = $category_name;
  } 
  
   // set category_mother
  public function setCategoryMother($category_mother)
  {
   $this->category_mother = $mother_mother;
  } 
  
    // set categories list
  public function setCategoriesList($categories_list)
  {
   $this->categories_list = $categories_list;
  } 
  
    /*
  METHODS
  */
  
}
  