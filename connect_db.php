<?php 
  class database
    { 
       private $db_host="localhost";
       private $db_user="root";
       private $db_name="facebook_clone";
    private $db_pass="";
       private $con=false;
       private $mysqli=" ";
       private $tmp="";
       private $t="";
       private $result=array();
     public function __construct(){
      
     if(!$this->con){
     $this->mysqli=new mysqli($this->db_host,$this->db_user,$this->db_pass,$this->db_name);  
      if($this->mysqli->connect_error)
         {
             array_push($this->result,$this->mysqli->connect_error);
                return(false);
                 }
           $this->con=true;
         
          }
     else
        {
         return(true);
         
       }
  } 
public function insert($table_name,$params=array())
{
     //$e=implode(',' ,array_keys($params));
     //echo $e;
    if($this->tableExists($table_name))
         {
               $table_columns=implode(',',array_keys($params));
               $table_values=implode("','" ,$params);
    
           $sql="insert into $table_name($table_columns) values('$table_values')";
             //echo $sql;
      
           if($this->mysqli->query($sql))
              {
                  array_push($this->result,'done');
                  return true;
              }
          else
               {
                  array_push($this->result,$this->mysqli->error);
                   return false;
                }
          }
           else
                   {
                      return false;
                       } 
    }

public function update($table,$params=array(),$where=null)
   {
	   $sql="";
     if($this ->tableExists($table))
         {
             $args=array();
             foreach($params as $key => $value)
               {
                  $args [ ]="$key='$value' " ;
                }
         $sql.="update $table set ".implode(' , ',$args);
              if($where!=null)
              {
                 $sql.="where $where ";
             }
           $this->tmp=$sql;
        
              if($this->mysqli->query($sql))
                  {
                    array_push($this->result,$this->mysqli->affected_rows);
                  }
                else
               {
                 array_push($this->result,$this->mysqli->error);
                 }  
          } 
       else
             {
                 return false;
             } 
   }                
  
function delete($table,$where =null)
 {  
   if($this->tableExists($table))
       {
          $sql="delete from $table ";
           if($where != null)
              {
                $sql.="where $where ";
               }
           if($this->mysqli->query($sql))
               {
                  return(true);
               }
          //return($sql);
       }
   else
       {
         return false;
       }
 //echo $sql; 
 }
    
 public function select($table,$sql)
    {
      if($this->tableExists($table)) 
           {
              $query=$this->mysqli->query($sql);
              if($query)
                {
                   $this->result=$query->fetch_all(MYSQLI_ASSOC); 
                    return true;
                 }
              else
                   {
                    array_push($this->result,$this->mysqli->error);
                     return false;
                   }
             }
      }
           
 public function sql_high($table,$row=" ",$join=null,$where=null,$order=null,$limit=null)
   {
       if($this->tableExists($table))    
          {
            $sql="";
             $sql.="select $row from $table ";
               
              if($join !=null)
                 {
                   $sql.="$join"  ;
                 }

             if($where != null)
               {
                 $sql.="  where  $where"; 
              }
                
             if($order !=null)
               {
               $sql.="order $order";
              }
            if($limit !=  null)
             {
                $sql.="limit $limit";
              }  
        
              $this->tmp.=$sql;
     
              $query=$this->mysqli->query($sql);
               $t=$query;
             if($query)
                   {
                   $this->result=$query->fetch_all(MYSQLI_ASSOC);
                    if(sizeof($this->result))
                      {
                        return 1;
                      }
                     else
                      {
                        return false;
                      }
                   } 
              else
                 {
                   array_push($this->result,$this->mysqli->error);
                return false;                 
               }    
               
            }
       else
          {
           return false;
          } 
    }
    
 private function tableExists($tablename)
   {
      $sql="show tables from $this->db_name like '$tablename' ";
       $tableInDb=$this->mysqli->query($sql);
         if($tableInDb)
               {
                   if($tableInDb->num_rows==1)
                      {
                         return true;
                      }
                     else
                      {
                        array_push($this->result,$tablename."dose not exists in this database");
                       }
                   }
          }
function show()
 {
   return($this->result);
 }
function sql()
 {
   return($this->tmp);
 }
function qur()
 {
  return($this->t);
 }
public function __destruct()
 {
    if($this->con)
       {
           if($this->mysqli->close())
              {
                   $this->con=false;
                 //print_r($this->result);
                  return true;
               }
       }
   else
        {
            return false;
         }
   }  
}
   /*$obj= new database();
$obj->insert("user_table1",['firstname'=>'pintu','lastname'=>'gorai','email'=>'235@nn','username'=>'pg','password'=>'np']);
$obj->sql_high("user_table1","*",null,'username="pgorai"',null,null,null);
$obj->show();*/
   ?>  