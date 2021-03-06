<?php

include "categoryproductsql.class.php";

class CategoryProduct
{
  private $id_category;
  private $name_category;
  private $mother_category;
 
  public $categories_list = array();
            public $categoryselect = array();
   /*
   GETTERS
   */
   // get idcategory
  public function getIdCategory()
  {
    return $this->id_category;
}	
	   // get category_name
  public function getNameCategory()
  {
    return $this->name_category;
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
                $categories_list[$row['id_category_product']]['id'] = $row['id_category_product'];
		$categories_list[$row['id_category_product']]['name'] = $row['name_category'];
                // type = 0 if mother category, id of mother category otherwise
                if(isset($categories_list[$row['id_category_product']]['type']) && $categories_list[$row['id_category_product']]['type'] == 1){
                }else
                 $categories_list[$row['id_category_product']]['type'] = 0;
               // loop into mothers categories only
                if($row['mother_category'] == 0){ 
                    // get list categories in order to retrieve its children
                    $categories_sql2= $categorySql->selectCategoriesList($mainCategory);
                    while ($row2 = $categories_sql2->fetch()) 
                    {
                        // if mother category corresponds to category we are looping => we found a child
                        if($row2['mother_category'] == $row['id_category_product']){
                            // we fill the result array
                            $categories_list[$row2['id_category_product']]['id'] = $row2['id_category_product'];
                            $categories_list[$row2['id_category_product']]['name'] = $row2['name_category'];
                            // type = 1 means its a child
                            $categories_list[$row2['id_category_product']]['type'] = 1;                       
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
	public function getCategory($id_advertiser){
             $categorySql = new CategorySql();
	  $categories_sql= $categorySql->SelectCategoryByAdvertiser($id_advertiser);
          

        while($result = $categories_sql->fetch())
        {
           // echo '<pre>', var_dump($result), '</pre>'; 
           // if($id_advertiser==$result['id_advertiser']){
              $this->categoryselect['id_category_product'] = $result['id_category_product'];
              $this->categoryselect['name_category'] = $result['name_category'];
              if($result['mother_category']!=0)
                  {
                  $categories_sql_child = $categorySql->selectCategoryNameFromId($result['mother_category']);
                  $res_categories_sql_child =  $categories_sql_child->fetch(); 
                  $this->categoryselect['mother_category'] = $res_categories_sql_child ['name_category'];
                 }
              
              //}
            
          
        }
        if(!isset($this->categoryselect['mother_category']))$this->categoryselect['mother_category']='';
       
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
  public function setCategoryName($name_category)
  {
   $this->category_name = $name_category;
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
  