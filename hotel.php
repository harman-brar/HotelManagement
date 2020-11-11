<!--Test Oracle file for UBC CPSC304 2018 Winter Term 1
  Created by Jiemin Zhang
  Modified by Simona Radu
  Modified by Jessica Wong (2018-06-22)
  This file shows the very basics of how to execute PHP commands
  on Oracle.  
  Specifically, it will drop a table, create a table, insert values
  update values, and then query for values
 
  IF YOU HAVE A TABLE CALLED "demoTable" IT WILL BE DESTROYED

  The script assumes you already have a server set up
  All OCI commands are commands to the Oracle libraries
  To get the file to work, you must place it somewhere where your
  Apache server can run it, and you must rename it to have a ".php"
  extension.  You must also change the username and password on the 
  OCILogon below to be your ORACLE username and password -->

  <!-- run at https://www.students.cs.ubc.ca/~hb4/hotel.php -->
  
<!doctype html>
<html>
    <head>
        <title>Hotel Management</title>
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    </head>

    <body style="background-color: #ede1e1;">

        <nav class="navbar navbar-dark" style="background-color: #2f2626;">
            <a class="navbar-brand" href="#" style="margin-left: 8%;">
                <img src="assets/hotelLogo.png" width="90" height="90" class="d-inline-block align-middle" alt="" loading="lazy">
                Hotel Management System
            </a>
            <p style="color: white; margin-right: 10%;">CPSC 304 2020 WT1</p>
        </nav>

        <div class="jumbotron" style="padding-left: 10%;background-image: url('https://www.aroell.com/wp-content/uploads/2017/12/wallpapers-3d-hotel-design-hd-wallpaper-artistic-hd-wallpapers.jpg'); background-repeat: no-repeat; background-size: cover;">
            <br><br>
            <h1 class="display-4" style="color: black; text-shadow: -1px 0 white, 0 1px white, 1px 0 white, 0 -1px white;">Project Group 91 Demo</h1>
            <p class="lead" style="color: white; font-weight: bold; text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">Harman Brar | Sahil Bansal</p>
            <hr class="my-4">
            <br>
            <button type="button" class="btn btn-dark btn-lg" data-toggle="modal" data-target="#exampleModal">
                Legend
            </button>
            <br>
            <br>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
        </div>

        <h4 style="margin-left:10%; color: #2f2626;">Results will appear at the bottom of the page</h4>

        <div class="content" style="margin-left: 10%; margin-right: 10%; margin-top: 5%;">
            <hr>
            <h2>Create All Required Tables</h2>

            <form method="POST" action="hotel.php">
                <!-- if you want another page to load after the button is clicked, you have to specify that page in the action parameter -->
                <input type="hidden" id="createTablesRequest" name="createTablesRequest">
                <p><input type="submit" class="btn btn-dark btn-lg" value="Go" name="reset"></p>
            </form>

            <hr />

            <h2>Populate Tables With Mock Data</h2>
            <form method="POST" action="hotel.php"> <!--refresh page when submitted-->
                <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
                Number: <input type="text" name="insNo"> <br /><br />
                Name: <input type="text" name="insName"> <br /><br />

                <input type="submit" class="btn btn-dark btn-lg" value="Go" name="insertSubmit"></p>
            </form>

            <hr />

            <h2>Get Contents of a Specific Table</h2>
            <p>Check legend for table names</p>

            <form method="POST" action="hotel.php"> <!--refresh page when submitted-->
                <input type="hidden" id="updateQueryRequest" name="updateQueryRequest">
                Table Name: <input type="text" name="tableName"> <br /><br />

                <input type="submit" class="btn btn-dark btn-lg" value="Go" name="updateSubmit"></p>
            </form>

            <hr />

            <h2>Insert Query</h2>
            <p>Create a booking for Guest X at Hotel Y for Suite # N</p>
            <form method="GET" action="hotel.php"> <!--refresh page when submitted-->
                <input type="hidden" id="countTupleRequest" name="countTupleRequest">
                <input type="submit" class="btn btn-dark btn-lg" value="Go" name="countTuples"></p>
            </form>

            <hr />

            <h2>Update Query</h2>
            <p>Set the suite isInUse to false after the guest leaves.</p>
            <form method="POST" action="hotel.php"> <!--refresh page when submitted-->
                <input type="hidden" id="updateQueryRequest" name="updateQueryRequest">
                New value: <input type="text" name="tableName"> <br /><br />

                <input type="submit" class="btn btn-dark btn-lg" value="Go" name="updateSubmit"></p>
            </form>

            <hr />

            <h2>Delete Query</h2>
            <p>Delete pool with poolName in hotel X</p>
            <form method="POST" action="hotel.php"> <!--refresh page when submitted-->
                <input type="hidden" id="updateQueryRequest" name="updateQueryRequest">
                New value: <input type="text" name="tableName"> <br /><br />

                <input type="submit" class="btn btn-dark btn-lg" value="Go" name="updateSubmit"></p>
            </form>

            <hr />

            <h2>Projection Query</h2>
            <p>Get the name, email, and phone no. for guest X.</p>
            <form method="POST" action="hotel.php"> <!--refresh page when submitted-->
                <input type="hidden" id="updateQueryRequest" name="updateQueryRequest">
                New value: <input type="text" name="tableName"> <br /><br />

                <input type="submit" class="btn btn-dark btn-lg" value="Go" name="updateSubmit"></p>
            </form>

            <hr />

            <h2>Selection Query</h2>
            <p>What is the phone # of the guest with email E?</p>
            <form method="POST" action="hotel.php"> <!--refresh page when submitted-->
                <input type="hidden" id="updateQueryRequest" name="updateQueryRequest">
                New value: <input type="text" name="tableName"> <br /><br />

                <input type="submit" class="btn btn-dark btn-lg" value="Go" name="updateSubmit"></p>
            </form>

            <hr />

            <h2>Division Query</h2>
            <p>Which guests watched the same performances as guest X?</p>
            <form method="POST" action="hotel.php"> <!--refresh page when submitted-->
                <input type="hidden" id="updateQueryRequest" name="updateQueryRequest">
                New value: <input type="text" name="tableName"> <br /><br />

                <input type="submit" class="btn btn-dark btn-lg" value="Go" name="updateSubmit"></p>
            </form>

            <hr />

            <h2>Join Query</h2>
            <p>Which gyms did the guest X work out in and what is the max capacity of these
gyms?</p>
            <form method="POST" action="hotel.php"> <!--refresh page when submitted-->
                <input type="hidden" id="updateQueryRequest" name="updateQueryRequest">
                New value: <input type="text" name="tableName"> <br /><br />

                <input type="submit" class="btn btn-dark btn-lg" value="Go" name="updateSubmit"></p>
            </form>
        </div>

        <?php
		//this tells the system that it's no longer just parsing html; it's now parsing PHP

        $success = True; //keep track of errors so it redirects the page only if there are no errors
        $db_conn = NULL; // edit the login credentials in connectToDB()
        $show_debug_alert_messages = False; // set to True if you want alerts to show you which methods are being triggered (see how it is used in debugAlertMessage())

        function debugAlertMessage($message) {
            global $show_debug_alert_messages;

            if ($show_debug_alert_messages) {
                echo "<script type='text/javascript'>alert('" . $message . "');</script>";
            }
        }

        function executePlainSQL($cmdstr) { //takes a plain (no bound variables) SQL command and executes it
            //echo "<br>running ".$cmdstr."<br>";
            global $db_conn, $success;

            $statement = OCIParse($db_conn, $cmdstr); 
            //There are a set of comments at the end of the file that describe some of the OCI specific functions and how they work

            if (!$statement) {
                echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
                $e = OCI_Error($db_conn); // For OCIParse errors pass the connection handle
                echo htmlentities($e['message']);
                $success = False;
            }

            $r = OCIExecute($statement, OCI_DEFAULT);
            if (!$r) {
                echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                $e = oci_error($statement); // For OCIExecute errors pass the statementhandle
                echo htmlentities($e['message']);
                $success = False;
            }

			return $statement;
		}

        function executeBoundSQL($cmdstr, $list) {
            /* Sometimes the same statement will be executed several times with different values for the variables involved in the query.
		In this case you don't need to create the statement several times. Bound variables cause a statement to only be
		parsed once and you can reuse the statement. This is also very useful in protecting against SQL injection. 
		See the sample code below for how this function is used */

			global $db_conn, $success;
			$statement = OCIParse($db_conn, $cmdstr);

            if (!$statement) {
                echo "<br>Cannot parse the following command: " . $cmdstr . "<br>";
                $e = OCI_Error($db_conn);
                echo htmlentities($e['message']);
                $success = False;
            }

            foreach ($list as $tuple) {
                foreach ($tuple as $bind => $val) {
                    //echo $val;
                    //echo "<br>".$bind."<br>";
                    OCIBindByName($statement, $bind, $val);
                    unset ($val); //make sure you do not remove this. Otherwise $val will remain in an array object wrapper which will not be recognized by Oracle as a proper datatype
				}

                $r = OCIExecute($statement, OCI_DEFAULT);
                if (!$r) {
                    echo "<br>Cannot execute the following command: " . $cmdstr . "<br>";
                    $e = OCI_Error($statement); // For OCIExecute errors, pass the statementhandle
                    echo htmlentities($e['message']);
                    echo "<br>";
                    $success = False;
                }
            }
        }

        function printResult($result) { //prints results from a select statement
            echo "<br>Retrieved data from table demoTable:<br>";
            echo "<table>";
            echo "<tr><th>ID</th><th>Name</th></tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row["NID"] . "</td><td>" . $row["NAME"] . "</td></tr>"; //or just use "echo $row[0]" 
            }

            echo "</table>";
        }

        function connectToDB() {
            global $db_conn;

            // Your username is ora_(CWL_ID) and the password is a(student number). For example, 
			// ora_platypus is the username and a12345678 is the password.
            $db_conn = OCILogon("ora_", "", "dbhost.students.cs.ubc.ca:1522/stu");

            if ($db_conn) {
                debugAlertMessage("Database is Connected");
                return true;
            } else {
                debugAlertMessage("Cannot connect to Database");
                $e = OCI_Error(); // For OCILogon errors pass no handle
                echo htmlentities($e['message']);
                return false;
            }
        }

        function disconnectFromDB() {
            global $db_conn;

            debugAlertMessage("Disconnect from Database");
            OCILogoff($db_conn);
        }

        function handleUpdateRequest() {
            global $db_conn;

            $old_name = $_POST['oldName'];
            $new_name = $_POST['newName'];

            // you need the wrap the old name and new name values with single quotations
            executePlainSQL("UPDATE demoTable SET name='" . $new_name . "' WHERE name='" . $old_name . "'");
            OCICommit($db_conn);
        }

        function handleResetRequest() {
            global $db_conn;
            // Drop old table
            executePlainSQL("DROP TABLE demoTable");

            // Create new table
            echo "<br> creating new table <br>";
            executePlainSQL("CREATE TABLE demoTable (id int PRIMARY KEY, name char(30))");
            OCICommit($db_conn);
        }

        function handleInsertRequest() {
            global $db_conn;

            //Getting the values from user and insert data into the table
            $tuple = array (
                ":bind1" => $_POST['insNo'],
                ":bind2" => $_POST['insName']
            );

            $alltuples = array (
                $tuple
            );

            executeBoundSQL("insert into demoTable values (:bind1, :bind2)", $alltuples);
            OCICommit($db_conn);
        }

        function handleCountRequest() {
            global $db_conn;

            $result = executePlainSQL("SELECT Count(*) FROM demoTable");

            if (($row = oci_fetch_row($result)) != false) {
                echo "<br> The number of tuples in demoTable: " . $row[0] . "<br>";
            }
        }

        function handleDisplayOutputReq() {
            global $db_conn;
            
            $result = executePlainSQL("SELECT * FROM demoTable");
            
            echo "<br>Retrieved data from table demoTable:<br>";
            echo "<table>";
            echo "<tr><th>ID</th><th>Name</th></tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row["ID"] . "</td><td>" . $row["NAME"] . "</td></tr>"; //or just use "echo $row[0]" 
            }

            echo "</table>";
        }

        // HANDLE ALL POST ROUTES
	// A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
        function handlePOSTRequest() {
            if (connectToDB()) {
                if (array_key_exists('resetTablesRequest', $_POST)) {
                    handleResetRequest();
                } else if (array_key_exists('updateQueryRequest', $_POST)) {
                    handleUpdateRequest();
                } else if (array_key_exists('insertQueryRequest', $_POST)) {
                    handleInsertRequest();
                }

                disconnectFromDB();
            }
        }

        // HANDLE ALL GET ROUTES
	// A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
        function handleGETRequest() {
            if (connectToDB()) {
                if (array_key_exists('countTuples', $_GET)) {
                    handleCountRequest();
                }

                if (array_key_exists('displayOutput', $_GET)) {
                    handleDisplayOutputReq();
                }

                disconnectFromDB();
            }
        }

		if (isset($_POST['reset']) || isset($_POST['updateSubmit']) || isset($_POST['insertSubmit'])) {
            handlePOSTRequest();
        } else if (isset($_GET['countTupleRequest']) || isset($_GET['displayOutputRequest'])) {
            handleGETRequest();
        }
		?>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	</body>
</html>

