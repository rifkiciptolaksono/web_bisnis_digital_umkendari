<?php 
b_library();
/*
 * A simple custom crud model
 * 
 * This model is intend to save our developing time on doing repeatedly crud method.
 * Using it with avoid to do crud in model repeatedly and clean your hand .
 * 
 * @author Arkar Aung
 * @copyright 2012 Arkar Aung
 * @license http://opensource.org/licenses/MIT MIT License
 * @version 1.1
 * 
*/

	class Crud_model extends CI_Model
	{
		/** 
		 * Inserting data to a specify table in database .
		 * 
		 * Accepts two variables 
		 * 
		 * @param $table_name a name of table which you want to insert
		 * @param $data an array which is update to above table
		 * @return inserted id if unsuccessful , return false
		 */ 
					
		function insert($table_name,$data)
		{
			if($this->db->insert($table_name,$data))
			{
				return $this->db->insert_id($table_name);
			}
			return false;
		}
		
		/** 
		 * Updating data to a specify table in database .
		 * 
		 * Accepts four variables 
		 * 
		 * @param $table_name a name of table which you want to update
		 * @param $data an array which is update to above table
		 * @param $where an array which contains field and key to update
		 * @return true , if unsuccessful , return false
		 */ 		
			
		
		function update($table_name,$data,$where = array())
		{
			if(isset($where))
			{
				foreach($where as $w)
				{
					if(isset($w['where_field']) && isset($w['where_key']))
					{
						$this->db->where($w['where_field'],$w['where_key']);
					}
				}
			}			
			if($this->db->update($table_name,$data))
			{
				return true;
			}
			return false;			
		}
		
		/** 
		 * Getting require data and send to crud_model to delete to a 
		 * specify table in database .
		 * 
		 * Accepts three variables 
		 * 
		 * @param $table_name a name of table which you want to delete
		 * @param $where an array which contains field and key to delete 
		 * @return true , if unsuccessful , return false
		 */ 		
		
		function delete($table_name,$where = array())
		{
			if(isset($where))
			{
				foreach($where as $w)
				{
					if(isset($w['where_field']) && isset($w['where_key']))
					{
						$this->db->where($w['where_field'],$w['where_key']);
					}
				}
			}
			if($this->db->delete($table_name))
			{
				return true;
			}
			return false;
		}

		/** 
		 * Setting empty value in all fields from your selected table .
		 * 
		 * Accepts one variable
		 * 
		 * @param $table_name a name of table which you want to clean up.
		 * @return true , if unsuccessful , return false
		 */ 		
		
		function truncate($table_name)
		{
			return $this->db->truncate($table_name);
		}
		
		/** 
		 * Generating custom unique id .
		 * 
		 * Get and check the last id . If it exists , plus one and append 
		 * to your custom prefix . If not exists, return prefix and 1 . 
		 * 
		 * Accepts three variables 
		 * 
		 * @param $table_name a name of table which exist your unique id .
		 * @param $field a field name of above table which is an uniqe value 
		 * @param $prefix a prefix value of your custom id  
		 * @return $uniqid a generated custom unique id
		 */ 		
		
		function generate_uniqid($table_name,$field,$prefix)
		{
			$query = $this->db->order_by($field,'desc')->limit(1)->get($table_name)->result_array();
			if($query)
			{			
				$query = array_shift($query);			
				$uniqid = $query[$field];
				$temp = substr($uniqid,strlen($prefix),strlen($prefix)+1);
				$temp = $temp + 1;
				$uniqid	= $prefix.$temp;		
				
			}
			else
			{
				$uniqid = $prefix.'1';
			}
			return $uniqid;
		}
		
		/** 
		 * Getting all data from your selected table .
		 * 
		 * Get all record from your selected table as your defined rules 
		 * 
		 * Accepts four variables 
		 * 
		 * @param $table_name a name of table from which you want to get data .
		 * @param $where an array to match with it when getting data 
		 * @param $rule an array for order_by , limit , like  ,
		 * @param $join an array to join with the your another selected table	
		 * @param $select a string which contains field name to get				 	 
		 * @return data match with $rule
		 */ 		
		
		function get($table_name,$where = array(),$rule = array(),$join = array(),$select,$string=null)
		{
			if($string){
				$query = $this->db->query($string);
				$query = $query->result_array();
			}else{
				if($select!=null){
					$this->db->select($select);
				}else{
					$this->db->select('*');
				}
				if(isset($join))
				{		
					foreach($join as $j)
					{
						$left = '';
						if(isset($j['target_field']) && isset($j['target_table']) && isset($j['parent_field']))
						{
							if(isset($j['parent_table']))
							{
								$parent_table = $j['parent_table'];
							}
							else
							{
								$parent_table = $table_name;
							}
							if(isset($j['join_opt']))
							{
								$left = $j['join_opt'];
							}
							$this->db->join($j['target_table'],$j['target_table'].'.'.$j['target_field'].'='.$parent_table.'.'.$j['parent_field'],$left);
						}
					}
				}						
				
				if(isset($rule['order_by']) && isset($rule['order_field']))
				{
					$this->db->order_by($table_name.'.'.$rule['order_field'],$rule['order_by']);
				}

				if(isset($rule['limit']))
				{
					if(!isset($rule['offset'])){
						$rule['offset'] = 0;
					}
					$this->db->limit($rule['limit'],$rule['offset']);
				}	
				
				if(isset($rule['like_field']) && isset($rule['like_key']))	
				{
					$this->db->like($table_name.'.'.$rule['like_field'],$rule['like_key']);	
				}	
					
				if(isset($rule['group_by']))	
				{
					$this->db->group_by($rule['group_by']); 
				}	
				
				if(isset($rule['having_field']) && isset($rule['having_key']))
				{
					$this->db->having($table_name.'.'.$rule['having_field'], $rule['having_key']); 
				}
				
				if(isset($rule['where_in_field']) && isset($rule['where_in_key']) && is_array($rule['where_in_key']))
				{
					$this->db->where_in($rule['where_in_field'],$rule['where_in_key']);
				}	
				
				if(isset($rule['distinct']) && $rule['distinct'] == true)
				{
					$this->db->distinct();
				}
				if(isset($where))
				{
					foreach($where as $w)
					{
						if(isset($w['where_table']))
						{
							$where_table = $w['where_table'];
						}
						else
						{
							$where_table = $table_name;
						}
						if(isset($w['where_field']) && isset($w['where_key']) && isset($w['is_or_where']))
						{
							$this->db->or_where($where_table.'.'.$w['where_field'],$w['where_key']);
						}
						if(isset($w['where_field']) && isset($w['where_key']) && !isset($w['is_or_where']))
						{
							
							$this->db->where($where_table.'.'.$w['where_field'],$w['where_key']);
						}
						if(isset($w['where_in_field']) && isset($w['where_in_key']))
						{
							$this->db->where_in($w['where_in_field'],$w['where_in_key']);
						}					
					}
				}			
				$query = $this->get_result($table_name);
			}
			if($query)
			{
				return $query;
			}
			return false;
		}


		function get_header($table_name)
		{
			//$this->db->select('*');
			$this->db->from($table_name);
			$query = $this->db->get();
			return $query;
		}
		
		/** 
		 * Getting data match with $where from your selected table .
		 *  It intends to use for getting a certain row 
		 * 
		 * Accepts three variables 
		 * 
		 * @param $table_name a name of table from which you want to get data .
		 * @param $where an array to match with it when getting data 
		 * @param $join an array to join with the your another selected table
		 * @param $select a string which contains field name to get				 
		 * @return data match with $rule
		 */ 		
		
		function get_byKey($table_name,$where = array(),$join = array(),$select)
		{
			$this->db->select($select);				
			if(isset($join))
			{		
				foreach($join as $j)
				{
					if(isset($j['target_field']) && isset($j['target_table']) && isset($j['parent_field']))
					{
						if(isset($j['parent_table']))
						{
							$parent_table = $j['parent_table'];
						}
						else
						{
							$parent_table = $table_name;
						}						
						$this->db->join($j['target_table'],$j['target_table'].'.'.$j['target_field'].'='.$parent_table.'.'.$j['parent_field']);
					}
				}
			}

			if(isset($where))
			{
				foreach($where as $w)
				{
					if(isset($w['where_table']))
					{
						$where_table = $w['where_table'];
					}
					else
					{
						$where_table = $table_name;
					}					
					if(isset($w['where_field']) && isset($w['where_key']) && isset($w['is_or_where']))
					{
						$this->db->or_where($where_table.'.'.$w['where_field'],$w['where_key']);
					}
					if(isset($w['where_field']) && isset($w['where_key']) && !isset($w['is_or_where']))
					{
						
						$this->db->where($where_table.'.'.$w['where_field'],$w['where_key']);
					}					
				}
			}
			$query = $this->get_result($table_name);
			if($query)
			{
				return array_shift($query);
			}
			return false;
		}
		
		/** 
		 * Getting data as your provided format in config file
		 * 
		 * Accepts one variable
		 * 
		 * @param $table_name a name of table from which you want to get data .
		 * @return data from your target table
		 */		
		
		function get_result($table_name)
		{
			if($this->config->item('result_type'))
			{
				if($this->config->item('result_type') == 'array')
				{
					return $this->db->get($table_name)->result_array();
				}
				if($this->config->item('result_type') == 'object')
				{
					return $this->db->get($table_name)->result();	
				}
			}
			return $this->db->get($table_name)->result_array();
			
		}


		function bind_dropdown($data,$key,$value,$label)
		{
			$result = null;

			if(is_array($data))
			{
				if($label)
				{
					$result[0] = '-- Select '.ucfirst($value).' --';
				}					
				foreach($data as $d)
				{
					$result[$d[$key]] = $d[$value];
				}			
			}
			return $result;
		}
		
		function count_all($table_name,$where)
		{
			if(isset($where))
			{
				foreach($where as $w)
				{
					if(isset($w['where_table']))
					{
						$where_table = $w['where_table'];
					}
					else
					{
						$where_table = $table_name;
					}					
					if(isset($w['where_field']) && isset($w['where_key']) && isset($w['is_or_where']))
					{
						$this->db->or_where($where_table.'.'.$w['where_field'],$w['where_key']);
					}
					if(isset($w['where_field']) && isset($w['where_key']) && !isset($w['is_or_where']))
					{
						
						$this->db->where($where_table.'.'.$w['where_field'],$w['where_key']);
					}					
				}
			}

			return $this->db->count_all_results($table_name);
		}
	}
?>
