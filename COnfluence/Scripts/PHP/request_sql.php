<!DOCTYPE html>
<html>
<head></head>
<body>
    <?php		
				//Error display / debug
				ini_set('display_errors', '1');
				ini_set('error_reporting', E_ALL); 
				
				$name = $_REQUEST['name'];
				$agency = $_REQUEST['agency'];
				$email = $_REQUEST['email'];
				$service = $_REQUEST['service'];
				$desc = $_REQUEST['desc'];
				//Credentials 
				$uid = "confluence";
				$pwd = "C0nF!u3N9eG1$";
				$dbhost = "10.12.1.28"; /*most of the time it's localhost*/
				$timestamp = date('Y-m-d G:i:s');
				//database 


				$dbname = "App_Support";
				$connectionInfo = array("UID"=>$uid,
                         				"PWD"=>$pwd,
										"Database"=>$dbname); 

				//Establish connection to SQL Server
				$mssql = sqlsrv_connect($dbhost,$connectionInfo);
				
				// gets ip then creates an array and breaks after ":" ... workaround for receiving proxy ip

				//Connection debug
				/*
				if($mssql) {
					echo "Connection established.<br />";
				}else{
					echo "Connection could not be established.<br />";
					die( print_r( sqlsrv_errors(), true));
				} 
				*/
				// Insert into db, add table you need to put in  // broadband_provider, technology_type, advertised_speed, monthly_cost, street_address, city, state, zipcode, provider_list)
				$query = "INSERT INTO dbo.ConfluenceRequest (name, agency, email, service, description, date_submitted)
				VALUES ('$name', '$agency', '$email', '$service','$desc', '$timestamp')";
				
				$test = sqlsrv_query($mssql,$query);
				/*
				if( $test === true ) {
     					die( print_r( sqlsrv_errors(), true));
				
				} else{ 
					echo "Thank you.  Your data has successfully been submitted.";
				
				}
				*/
					
    ?> 
</body>
</html>
