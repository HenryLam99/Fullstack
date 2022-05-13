<?php 
    function DBconnect($host,$user, $pass, $name)
    {
    	try
    	{
    		$con = mysqli_connect($host,$user, $pass, $name);
            return $con;
    	}
    	catch (Error $e)
    	{
    		return 'Could not connect to server: '.$e->getMessage();
     
    	}
            
    } 
  

    function query($sql,$con)
    {
    	
    	try
    	{
    		$result = mysqli_query($con,$sql);
			$list =[];
			 
			while ($row = $result->fetch_assoc()) {
				$list[] = $row;
			}

			return $list;
              
    	}
    	catch (Error $e)
    	{
    		return 'Query failed: '.$e->getMessage().' SQL: '.$sql;
    	}
        	
        destruct($con);
    }
	function query_rows($sql,$con)
    { 
		$result = mysqli_query($con,$sql);
    	return mysqli_num_rows($result);  
    }
 
    function destruct($con){
            if ($con){
                mysqli_close($con);
            }
         } 
 

?>