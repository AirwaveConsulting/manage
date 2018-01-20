<?php
// THE DB_HANDLER.PHP FILE
// handles all db queries

class db_handler extends mysqli {

//setup db connection (again?)
public function __construct(){

    // db info
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = 'Qw3rty2$$';
    $db_name = 'timeapp';

		@parent::__construct($db_host, $db_user, $db_pass, $db_name);
   	if (mysqli_connect_error()) {
      header("Location: http://tools.airwaveconsult.com/time/ofuck.html");
      exit;
		 }

	}

// run_query function by EIU WEB OFFICE
public function run_query($query, $type, $params)
	{
		if ($stmt = parent::prepare($query)){
			//IF PARAMS ARE NOT EMPTY, BIND
			if($params){
				$ref    = new ReflectionClass('mysqli_stmt');
				$method = $ref->getMethod("bind_param");
				$method->invokeArgs($stmt,$params);
			}
			if(!$stmt->execute()){
				list($callee, $caller) = debug_backtrace(false);
				$calling_function = " <b>Function:</b> ".$caller['function']." <b>Line:</b> ".$callee['line'];
				trigger_error($this->error.$calling_function, E_USER_WARNING);
			}
			if(in_array($type, array('info','list'))){
				//FOR SELECT INFO AND LIST TYPES GET META DATA
				$meta = $stmt->result_metadata();
				//BUILD RETURN ARRAY
				while ( $field = $meta->fetch_field() ) {
					$parameters[] = &$row[$field->name];
				}

				call_user_func_array(array($stmt, 'bind_result'), $parameters);
			}
			elseif($type == 'keyless_list'){
				$stmt->bind_result($value);
			}
			switch($type){
				case 'list':
					//FOR INFO (SINGLE ARRAY)
					while($stmt->fetch()){
						$x = array();
						foreach( $row as $key => $val ) {
							$x[$key] = $val;
						}
						$results[] = $x;
					}
				break;
				case 'info':
					//FOR LIST (MULTI ARRAY)
					$stmt->fetch();
					$x = array();
					foreach( $row as $key => $val ) {
						$results[$key] = $val;
					}
				break;
				case 'insert':
					$results = $this->insert_id;
				break;
				case 'update':
				break;
				case 'delete':
				break;
				case 'keyless_list':
					//FOR INFO (SINGLE ARRAY)
					while($stmt->fetch()){
						$results[] = $value;
					}
				break;
			}
			//RETURN DATA AND CLOSE
			return $results;
			$stmt->close();
		}//END PREPARE
		else{
			list($callee, $caller) = debug_backtrace(false);
			$calling_function = " <b>Function:</b> ".$caller['function']." <b>Line:</b> ".$callee['line'];
			trigger_error($this->error.$calling_function, E_USER_WARNING);
		}
}

// test query runner
public function test_list(){
		$query = "
		SELECT
			*
		FROM
			test
		";
		//MUST PASS BY REFERENCE (&) infront of variables
		//$params = array('i',$id);
		$result = $this->run_query($query, 'list', $params);
		return $result;
}

} // end class

?>
