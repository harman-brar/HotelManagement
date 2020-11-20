<!--
  The script assumes you already have a server set up
  All OCI commands are commands to the Oracle libraries
  To get the file to work, you must place it somewhere where your
  Apache server can run it, and you must rename it to have a ".php"
  extension.  You must also change the username and password on the 
  OCILogon below to be your ORACLE username and password 
-->

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

            <form method="POST" action="hotel.php#pageEnd">
                <!-- if you want another page to load after the button is clicked, you have to specify that page in the action parameter -->
                <input type="hidden" id="createTablesRequest" name="createTablesRequest">
                <p><input type="submit" class="btn btn-dark btn-lg" value="Go" name="reset"></p>
            </form>

            <hr />

            <h2>Populate Tables With Mock Data</h2>
            <form method="POST" action="hotel.php#pageEnd"> <!--refresh page when submitted-->
                <input type="hidden" id="insertQueryRequest" name="insertQueryRequest">
                Number: <input type="text" name="insNo"> <br /><br />
                Name: <input type="text" name="insName"> <br /><br />

                <input type="submit" class="btn btn-dark btn-lg" value="Go" name="insertSubmit"></p>
            </form>

            <hr />

            <h2>Drop All Tables</h2>

            <form method="POST" action="hotel.php#pageEnd">
                <!-- if you want another page to load after the button is clicked, you have to specify that page in the action parameter -->
                <input type="hidden" id="deleteTablesRequest" name="deleteTablesRequest">
                <p><input type="submit" class="btn btn-dark btn-lg" value="Go" name="reset"></p>
            </form>

            <hr />

            <h2>Get Contents of a Specific Table</h2>
            <p>Check legend for table names</p>

            <form method="POST" action="hotel.php#pageEnd"> <!--refresh page when submitted-->
                <input type="hidden" id="updateQueryRequest" name="updateQueryRequest">
                Table Name: <input type="text" name="tableName"> <br /><br />

                <input type="submit" class="btn btn-dark btn-lg" value="Go" name="updateSubmit"></p>
            </form>

            <hr />

            <h2>Insert Query</h2>
            <p>Create a Hotel</p>
            <form method="GET" action="hotel.php#pageEnd"> <!--refresh page when submitted-->
                <input type="hidden" id="countTupleRequest" name="countTupleRequest">
                Id: <input type="text" name="insNo"> <br /><br />
                Name: <input type="text" name="insNo"> <br /><br />
                Address: <input type="text" name="insNo"> <br /><br />
                Phone: <input type="text" name="insNo"> <br /><br />
                <input type="submit" class="btn btn-dark btn-lg" value="Go" name="countTuples"></p>
            </form>

            <hr />

            <h2>Update Query</h2>
            <p>Set the suite isInUse to false after the guest leaves.</p>
            <form method="POST" action="hotel.php#pageEnd"> <!--refresh page when submitted-->
                <input type="hidden" id="updateQueryRequest" name="updateQueryRequest">
                Hotel Id: <input type="text" name="tableName"> <br /><br />
                Suite number: <input type="text" name="tableName"> <br /><br />
                Is in use?: <input type="text" name="tableName" placeholder="true/false"> <br /><br />

                <input type="submit" class="btn btn-dark btn-lg" value="Go" name="updateSubmit"></p>
            </form>

            <hr />

            <h2>Delete Query</h2>
            <p>Delete pool with poolName in hotel X</p>
            <form method="POST" action="hotel.php#pageEnd"> <!--refresh page when submitted-->
                <input type="hidden" id="updateQueryRequest" name="updateQueryRequest">
                Hotel Id: <input type="text" name="tableName"> <br /><br />
                Pool name: <input type="text" name="tableName"> <br /><br />

                <input type="submit" class="btn btn-dark btn-lg" value="Go" name="updateSubmit"></p>
            </form>

            <hr />

            <h2>Projection Query</h2>
            <p>Get the name, email, and phone no. for guest with id.</p>
            <form method="POST" action="hotel.php#pageEnd"> <!--refresh page when submitted-->
                <input type="hidden" id="updateQueryRequest" name="updateQueryRequest">
                Id: <input type="text" name="tableName"> <br /><br />

                <input type="submit" class="btn btn-dark btn-lg" value="Go" name="updateSubmit"></p>
            </form>

            <hr />

            <h2>Selection Query</h2>
            <p>What is the phone # of the guest with email?</p>
            <form method="POST" action="hotel.php#pageEnd"> <!--refresh page when submitted-->
                <input type="hidden" id="updateQueryRequest" name="updateQueryRequest">
                Email: <input type="text" name="tableName"> <br /><br />

                <input type="submit" class="btn btn-dark btn-lg" value="Go" name="updateSubmit"></p>
            </form>

            <hr />

            <h2>Division Query</h2>
            <p>Which guests watched all of the performances?</p>
            <form method="POST" action="hotel.php#pageEnd"> <!--refresh page when submitted-->
                <input type="hidden" id="updateQueryRequest" name="updateQueryRequest">

                <input type="submit" class="btn btn-dark btn-lg" value="Go" name="updateSubmit"></p>
            </form>

            <hr />

            <h2>Join Query</h2>
            <p>Which gyms did the guest with Id work out in and what is the max capacity of these
gyms?</p>
            <form method="POST" action="hotel.php#pageEnd"> <!--refresh page when submitted-->
                <input type="hidden" id="updateQueryRequest" name="updateQueryRequest">
                Id: <input type="text" name="tableName"> <br /><br />

                <input type="submit" class="btn btn-dark btn-lg" value="Go" name="updateSubmit"></p>
            </form>
        </div>

        <div id="pageEnd"></div>

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
            $db_conn = OCILogon("ora_hb4", "a70958632", "dbhost.students.cs.ubc.ca:1522/stu");

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

        function handleDropRequest() {
            global $db_conn;
            
            executePlainSQL("DROP TABLE TreatmentPricing");
            echo "Dropped TreatmentPricing Table <br>";
            
            executePlainSQL("DROP TABLE RelaxesIn");
            echo "Dropped RelaxesIn Table <br>";

            executePlainSQL("DROP TABLE Spa");
            echo "Dropped Spa Table <br>";

            executePlainSQL("DROP TABLE WorksOutAt");
            echo "Dropped WorksOutAt Table <br>";

            executePlainSQL("DROP TABLE Gym");
            echo "Dropped Gym Table <br>";

            executePlainSQL("DROP TABLE SwimsAt");
            echo "Dropped SwimsAt Table <br>";

            executePlainSQL("DROP TABLE Pool");
            echo "Dropped Pool Table <br>";

            executePlainSQL("DROP TABLE MenuItemPrices");
            echo "Dropped MenuItemPrices Table <br>";

            executePlainSQL("DROP TABLE EatsAt");
            echo "Dropped EatsAt Table <br>";

            executePlainSQL("DROP TABLE Restaurant");
            echo "Dropped Restaurant Table <br>";

            executePlainSQL("DROP TABLE Assigns");
            echo "Dropped Assigns Table <br>";

            executePlainSQL("DROP TABLE OperatorGroup");
            echo "Dropped OperatorGroup Table <br>";

            executePlainSQL("DROP TABLE FacilityEmployee");
            echo "Dropped FacilityEmployee Table <br>";

            executePlainSQL("DROP TABLE Employee");
            echo "Dropped Employee Table <br>";

            executePlainSQL("DROP TABLE Watches");
            echo "Dropped Watches Table <br>";

            executePlainSQL("DROP TABLE Performance");
            echo "Dropped Performance Table <br>";
            
            executePlainSQL("DROP TABLE PerformanceGroup");
            echo "Dropped PerformanceGroup Table <br>";
            
            executePlainSQL("DROP TABLE Hires");
            echo "Dropped Hires Table <br>";

            executePlainSQL("DROP TABLE PayrollGroup");
            echo "Dropped PayrollGroup Table <br>";

            executePlainSQL("DROP TABLE Business");
            echo "Dropped Business Table <br>";

            executePlainSQL("DROP TABLE Deluxe");
            echo "Dropped Deluxe Table <br>";

            executePlainSQL("DROP TABLE Standard");
            echo "Dropped Standard Table <br>";

            executePlainSQL("DROP TABLE Books");
            echo "Dropped Books Table <br>";

            executePlainSQL("DROP TABLE Suite");
            echo "Dropped Suite Table <br>";

            executePlainSQL("DROP TABLE Hotel");
            echo "Dropped Hotel Table <br>";

            executePlainSQL("DROP TABLE Guest");
            echo "Dropped Guest Table <br>";

            OCICommit($db_conn);
        }

        function handleCreateRequest() {
            global $db_conn;

            executePlainSQL("CREATE TABLE Guest(UserId INT, Name VARCHAR(255), Email VARCHAR(254), Phone VARCHAR(10), CONSTRAINT guest_pk PRIMARY KEY (UserId))");
            echo "Created Guest Table <br>";
            executePlainSQL("CREATE TABLE Hotel( HotelId INT, Name VARCHAR(255), Address VARCHAR(320), Phone VARCHAR(10), CONSTRAINT unique_phone UNIQUE(Phone), CONSTRAINT hotel_pk PRIMARY KEY (HotelId))");
            echo "Created Hotel Table <br>";
            executePlainSQL("CREATE TABLE Suite( HotelId INT, SuiteNo INT, IsInUse INT, BedCount INT, IsClean INT, CONSTRAINT suite_hotel FOREIGN KEY (HotelId) REFERENCES Hotel(HotelId) ON DELETE CASCADE, CONSTRAINT suite_pk PRIMARY KEY (HotelId, SuiteNo))");
            echo "Created Suite Table <br>";
            executePlainSQL("CREATE TABLE Books( UserId INT, HotelId INT, SuiteNo INT, BookingDate DATE, StayLength INT, Price INT, CONSTRAINT books_guest FOREIGN KEY (UserId) REFERENCES Guest(UserId), CONSTRAINT books_suite FOREIGN KEY (HotelId, SuiteNo) REFERENCES Suite(HotelId, SuiteNo), CONSTRAINT books_pk PRIMARY KEY (UserId, HotelId, SuiteNo))");
            echo "Created Books Table <br>";
            executePlainSQL("CREATE TABLE Standard( HotelId INT, SuiteNo INT, HasSofaBed INT, CONSTRAINT standard_suite FOREIGN KEY (HotelId, SuiteNo) REFERENCES Suite(HotelId, SuiteNo), CONSTRAINT standard_pk PRIMARY KEY(HotelId, SuiteNo))");
            echo "Created Standard Table <br>";
            executePlainSQL("CREATE TABLE Deluxe( HotelId INT, SuiteNo INT, NoOfRooms INT, CONSTRAINT deluxe_suite FOREIGN KEY (HotelId, SuiteNo) REFERENCES Suite(HotelId, SuiteNo), CONSTRAINT deluxe_pk PRIMARY KEY(HotelId, SuiteNo))");
            echo "Created Deluxe Table <br>";
            executePlainSQL("CREATE TABLE Business( HotelId INT, SuiteNo INT, HasLivingRoom INT, CONSTRAINT business_suite FOREIGN KEY (HotelId, SuiteNo) REFERENCES Suite(HotelId, SuiteNo), CONSTRAINT business_pk PRIMARY KEY(HotelId, SuiteNo))");
            echo "Created Business Table <br>";
            executePlainSQL("CREATE TABLE PayrollGroup( PGID Int, Name VARCHAR(255), CONSTRAINT pg_pk PRIMARY KEY(PGID))");
            echo "Created PayrollGroup Table <br>";
            executePlainSQL("CREATE TABLE Hires( HotelId INT, PGID Int, CONSTRAINT hiring_hotel_fk FOREIGN KEY (HotelId) REFERENCES Hotel(HotelId) ON DELETE CASCADE, CONSTRAINT ph_hired_fk FOREIGN KEY (PGID) REFERENCES PayrollGroup(PGID), CONSTRAINT hires_pk PRIMARY KEY(HotelId, PGID))");
            echo "Created Hires Table <br>";
            executePlainSQL("CREATE TABLE PerformanceGroup( PGID Int, ContractStartDate DATE, ContractEndDate DATE, ChargeRate INT, CONSTRAINT pg_fk FOREIGN KEY (PGID) REFERENCES PayrollGroup(PGID) ON DELETE CASCADE, CONSTRAINT pf_pk PRIMARY KEY (PGID))");
            echo "Created PerformanceGroup Table <br>";
            executePlainSQL("CREATE TABLE Performance( PID INT, PGID INT NOT NULL, PerformanceDate DATE, Attendance INT, CONSTRAINT unique_pgid UNIQUE(PGID), CONSTRAINT perf_pg_fk FOREIGN KEY (PGID) REFERENCES PerformanceGroup(PGID), CONSTRAINT perf_pk PRIMARY KEY(PID))");
            echo "Created Performance Table <br>";
            executePlainSQL("CREATE TABLE Watches( UserId INT, PID Int, CONSTRAINT watches_guest_fk FOREIGN KEY (UserId) REFERENCES Guest(UserId), CONSTRAINT watches_perf_fk FOREIGN KEY (PID) REFERENCES Performance(PID), CONSTRAINT watches_pk PRIMARY KEY(UserId, PID))");
            echo "Created Watches Table <br>";
            executePlainSQL("CREATE TABLE Employee( PGID INT, StartDate DATE, Salary INT, JobDescription VARCHAR(1000), IsCurrentlyEmployed INT, EndDate DATE, CONSTRAINT empl_pg_fk FOREIGN KEY (PGID) REFERENCES PayrollGroup(PGID) ON DELETE CASCADE, CONSTRAINT employee_pk PRIMARY KEY (PGID))");
            echo "Created Employee Table <br>";
            executePlainSQL("CREATE TABLE FacilityEmployee( PGID Int, StartDate DATE, Salary INT, CONSTRAINT f_empl_pg_fk FOREIGN KEY (PGID) REFERENCES PayrollGroup(PGID) ON DELETE CASCADE, CONSTRAINT f_empl_pk PRIMARY KEY (PGID))");
            echo "Created FacilityEmployee Table <br>";
            executePlainSQL("CREATE TABLE OperatorGroup( GroupId Int, MemberCount INT, CONSTRAINT og_pk PRIMARY KEY (GroupId))");
            echo "Created OperatorGroup Table <br>";
            executePlainSQL("CREATE TABLE Assigns( GroupId Int, PGID Int, AssignmentDate DATE, CONSTRAINT assigns_og_fk FOREIGN KEY (GroupId) REFERENCES OperatorGroup(GroupId) ON DELETE CASCADE, CONSTRAINT assigns_pg_fk FOREIGN KEY (PGID) REFERENCES PayrollGroup(PGID), CONSTRAINT assigns_pk PRIMARY KEY (GroupId, PGID))");
            echo "Created Assigns Table <br>";
            executePlainSQL("CREATE TABLE Restaurant( HotelId INT, RestaurantName VARCHAR(255), GroupId INT Not NULL, MaxCapacity INT, CONSTRAINT unique_groupid_res UNIQUE(GroupId), CONSTRAINT res_hotel_fk FOREIGN KEY (HotelId) REFERENCES Hotel(HotelId) ON DELETE CASCADE, CONSTRAINT res_og_fk FOREIGN KEY (GroupId) REFERENCES OperatorGroup(GroupId), CONSTRAINT res_pk PRIMARY KEY (HotelId, RestaurantName))");
            echo "Created Restaurant Table <br>";
            executePlainSQL("CREATE TABLE EatsAt( UserId INT, HotelId INT, RestaurantName VARCHAR(255), MenuItem VARCHAR(100), CONSTRAINT ea_guest_fk FOREIGN KEY (UserId) REFERENCES Guest(UserId), CONSTRAINT ea_res_fk FOREIGN KEY (HotelId, RestaurantName) REFERENCES Restaurant(HotelId, RestaurantName) ON DELETE CASCADE, CONSTRAINT ea_pk PRIMARY KEY (UserId, HotelId, RestaurantName))");
            echo "Created EatsAt Table <br>";
            executePlainSQL("CREATE TABLE MenuItemPrices( HotelId INT, RestaurantName VARCHAR(255), MenuItem VARCHAR(255), Price INT, CONSTRAINT mip_res_fk FOREIGN KEY (HotelId, RestaurantName) REFERENCES Restaurant(HotelId, RestaurantName) ON DELETE CASCADE, CONSTRAINT mip_pk PRIMARY KEY (HotelId, RestaurantName, MenuItem))");
            echo "Created MenuItemPrices Table <br>";
            executePlainSQL("CREATE TABLE Pool( HotelId INT, PoolName VARCHAR(255), GroupId INT Not NULL, IsDrained INT, CONSTRAINT unique_groupid_pool UNIQUE(GroupId), CONSTRAINT pool_hotel_fk FOREIGN KEY (HotelId) REFERENCES Hotel(HotelId) ON DELETE CASCADE, CONSTRAINT pool_og_fk FOREIGN KEY (GroupId) REFERENCES OperatorGroup(GroupId), CONSTRAINT pool_pk PRIMARY KEY (HotelId, PoolName))");
            echo "Created Pool Table <br>";
            executePlainSQL("CREATE TABLE SwimsAt( UserId INT, HotelId INT, PoolName VARCHAR(255), CONSTRAINT sa_guest_fk FOREIGN KEY (UserId) REFERENCES Guest(UserId), CONSTRAINT sa_pool_fk FOREIGN KEY (HotelId, PoolName) REFERENCES Pool(HotelId, PoolName) ON DELETE CASCADE, CONSTRAINT sa_pk PRIMARY KEY (UserId, HotelId, PoolName))");
            echo "Created SwimsAt Table <br>";
            executePlainSQL("CREATE TABLE Gym( HotelId INT, GymName VARCHAR(255), GroupId INT Not NULL, MaxCapacity INT, CONSTRAINT unique_groupid_gym UNIQUE(GroupId), CONSTRAINT gym_hotel_fk FOREIGN KEY (HotelId) REFERENCES Hotel(HotelId) ON DELETE CASCADE, CONSTRAINT gmy_og_fk FOREIGN KEY (GroupId) REFERENCES OperatorGroup(GroupId), CONSTRAINT gym_pk PRIMARY KEY (HotelId, GymName))");
            echo "Created Gym Table <br>";
            executePlainSQL("CREATE TABLE WorksOutAt( UserId INT, HotelId INT, GymName VARCHAR(255), MaxCapacity INT, CONSTRAINT woa_guest_fk FOREIGN KEY (UserId) REFERENCES Guest(UserId), CONSTRAINT woa_gym_fk FOREIGN KEY (HotelId, GymName) REFERENCES Gym(HotelId, GymName) ON DELETE CASCADE, CONSTRAINT woa_pk PRIMARY KEY (UserId, HotelId, GymName))");
            echo "Created WorksOutAt Table <br>";
            executePlainSQL("CREATE TABLE Spa( HotelId INT, SpaName VARCHAR(255), GroupId INT Not NULL, MaxCapacity INT, CONSTRAINT unique_groupid_spa UNIQUE(GroupId), CONSTRAINT spa_hotel_fk FOREIGN KEY (HotelId) REFERENCES Hotel(HotelId) ON DELETE CASCADE, CONSTRAINT spa_og_fk FOREIGN KEY (GroupId) REFERENCES OperatorGroup(GroupId), CONSTRAINT spa_pk PRIMARY KEY (HotelId, SpaName))");
            echo "Created Spa Table <br>";
            executePlainSQL("CREATE TABLE RelaxesIn( UserId INT, HotelId INT, SpaName VARCHAR(255), TreatmentRating INT, CONSTRAINT ri_guest_fk FOREIGN KEY (UserId) REFERENCES Guest(UserId), CONSTRAINT ri_spa_fk FOREIGN KEY (HotelId, SpaName) REFERENCES Spa(HotelId, SpaName) ON DELETE CASCADE, CONSTRAINT ri_pk PRIMARY KEY (UserId, HotelId, SpaName))");
            echo "Created RelaxesIn Table <br>";
            executePlainSQL("CREATE TABLE TreatmentPricing( HotelId INT, SpaName VARCHAR(255), TreatmentRating INT, Price INT, CONSTRAINT tp_spa_fk FOREIGN KEY (HotelId, SpaName) REFERENCES Spa(HotelId, SpaName) ON DELETE CASCADE, CONSTRAINT tp_pk PRIMARY KEY (HotelId, SpaName, TreatmentRating))");
            echo "Created TreatmentPricing Table <br>";

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
                if (array_key_exists('createTablesRequest', $_POST)) {
                    handleCreateRequest();
                } else if (array_key_exists('deleteTablesRequest', $_POST)) {
                    handleDropRequest();
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

