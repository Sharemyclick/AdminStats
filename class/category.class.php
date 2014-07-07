<?php

include "categorysql.class.php";

class Category
{
  private $id_category;
  private $category_name;
  private $mother_category;
 
  public $categories_list = array();
            
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
                $categories_list[$row['id_category']]['id'] = $row['id_category'];
		$categories_list[$row['id_category']]['name'] = $row['name_category'];
                // type = 0 if mother category, idd of mother category otherwise
                $categories_list[$row['id_category']]['type'] = $row['mother_category'];
               // loop into mothers categories only
                if($row['mother_category'] == 0){ 
                    // get list categories in order to retrieve its children
                    $categories_sql2= $categorySql->selectCategoriesList($mainCategory);
                    while ($row2 = $categories_sql2->fetch()) 
                    {
                        // if mother category corresponds to category we are looping => we found a child
                        if($row2['mother_category'] == $row['id_category']){
                            // we fill the result array
                            $categories_list[$row2['id_category']]['id'] = $row2['id_category'];
                            $categories_list[$row2['id_category']]['name'] = $row2['name_category'];
                            // type = 1 means its a child
                            $categories_list[$row2['id_category']]['type'] = 1;                       
                        }
                        //echo $row['id_category']." ".$row2['id_category']." <br />";
                    }
                     
                }
		} //echo '<pre>', var_dump($categories_list), '</pre>'; 
	  //TODO setup $categories_list from query results
	  // structure of $categories_list : Array('id','name')
                $this->setCategoriesList($categories_list);
	  return true;
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
   $this->category_mother = $mother_category;
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
  