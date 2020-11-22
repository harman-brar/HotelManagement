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
                    <a href="https://docs.google.com/document/d/10eI8MnIRRizElAkLevzY1MwmJLShgYybtpjP54nmu6o/edit?usp=sharing">Reference Document</a>
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

            <h2>Insert Query</h2>
            <p>Create a Hotel (with id > 4)</p>
            <form method="POST" action="hotel.php#pageEnd"> <!--refresh page when submitted-->
                <input type="hidden" id="insertRequest" name="insertRequest">
                Id: <input type="text" name="hotelId"> <br /><br />
                Name: <input type="text" name="name"> <br /><br />
                Address: <input type="text" name="address"> <br /><br />
                Phone: <input type="text" name="phone"> <br /><br />
                <input type="submit" class="btn btn-dark btn-lg" value="Go" name="insertSubmit"></p>
            </form>

            <hr />

            <h2>Update Query</h2>
            <p>Set the suite isInUse to false after the guest leaves.</p>
            <form method="POST" action="hotel.php#pageEnd"> <!--refresh page when submitted-->
                <input type="hidden" id="updateQueryRequest" name="updateQueryRequest">
                Hotel Id: <input type="text" name="hotelId"> <br /><br />
                Suite number: <input type="text" name="suiteNo"> <br /><br />
                Is in use?: <input type="text" name="isInUse" placeholder="0 (false) | 1 (true)"> <br /><br />

                <input type="submit" class="btn btn-dark btn-lg" value="Go" name="updateQueryRequest"></p>
            </form>

            <hr />

            <h2>Delete Query</h2>
            <p>Delete pool with poolName in hotel X</p>
            <form method="POST" action="hotel.php#pageEnd"> <!--refresh page when submitted-->
                <input type="hidden" id="deleteQueryRequest" name="deleteQueryRequest">
                Hotel Id: <input type="text" name="hotelId"> <br /><br />
                Pool name: <input type="text" name="poolName"> <br /><br />

                <input type="submit" class="btn btn-dark btn-lg" value="Go" name="deleteQueryRequest"></p>
            </form>

            <hr />

            <h2>Projection Query</h2>
            <p>Get the name, email, and phone no. of guests.</p>
            <form method="GET" action="hotel.php#pageEnd"> <!--refresh page when submitted-->
                <input type="hidden" id="projectionRequest" name="projectionRequest">
                <input type="submit" class="btn btn-dark btn-lg" value="Go" name="projectionRequest"></p>
            </form>

            <hr />

            <h2>Selection Query</h2>
            <p>What is the email of the guest with phone #</p>
            <form method="GET" action="hotel.php#pageEnd"> <!--refresh page when submitted-->
                <input type="hidden" id="selectRequest" name="selectRequest">
                phoneNo: <input type="text" name="guestEmail"> <br /><br />

                <input type="submit" class="btn btn-dark btn-lg" value="Go" name="selectRequest"></p>
            </form>

            <hr />

            <h2>Division Query</h2>
            <p>Which guests watched all of the performances?</p>
            <form method="GET" action="hotel.php#pageEnd"> <!--refresh page when submitted-->
                <input type="hidden" id="divisionRequest" name="divisionRequest">

                <input type="submit" class="btn btn-dark btn-lg" value="Go" name="divisionRequest"></p>
            </form>

            <hr />

            <h2>Join Query</h2>
            <p>Which gyms did the guest with Id work out in and what is the max capacity of these
gyms?</p>
            <form method="GET" action="hotel.php#pageEnd"> <!--refresh page when submitted-->
                <input type="hidden" id="joinRequest" name="joinRequest">
                Id: <input type="text" name="guestId"> <br /><br />

                <input type="submit" class="btn btn-dark btn-lg" value="Go" name="joinRequest"></p>
            </form>

            <hr />

            <h2>Aggregation with Group By</h2>
            <p>Group by HotelId, GymName</p>
            <form method="GET" action="hotel.php#pageEnd"> <!--refresh page when submitted-->
                <input type="hidden" id="agg1Request" name="agg1Request">
                <input type="submit" class="btn btn-dark btn-lg" value="Go" name="agg1Request"></p>
            </form>

            <hr />

            <h2>Aggregation with Having</h2>
            <p>Get HotelIds for Hotels that have a minimum gym max capacity of 21</p>
            <form method="GET" action="hotel.php#pageEnd"> <!--refresh page when submitted-->
                <input type="hidden" id="agg2Request" name="agg2Request">
                <input type="submit" class="btn btn-dark btn-lg" value="Go" name="agg2Request"></p>
            </form>

            <hr />

            <h2>Nested Aggregation</h2>
            <p>Get the names, phone numbers, and ids of hotels with an average booking price less than 200.</p>
            <form method="GET" action="hotel.php#pageEnd"> <!--refresh page when submitted-->
                <input type="hidden" id="agg3Request" name="agg3Request">
                <input type="submit" class="btn btn-dark btn-lg" value="Go" name="agg3Request"></p>
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

            global $db_conn;

            $tuple = array (
                ":bind1" => $_POST['hotelId'],
                ":bind2" => $_POST['suiteNo'],
                ":bind3" => $_POST['isInUse']
            );

            $alltuples = array (
                $tuple
            );

            $result = executeBoundSQL("UPDATE Suite SET IsInUse = (:bind3) WHERE SuiteNo = (:bind2) AND HotelId = (:bind1)", $alltuples);
            
            echo "IsInUse Updated for Suite.";
            
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

        function handleCreateMockDataRequest() {
            global $db_conn;
            echo "Mock data for Guest table <br>";
            executePlainSQL("INSERT INTO Guest(UserId, Name, Email, Phone) VALUES (0, 'Harman Brar', 'hb@g.com', 7780010000)");
            executePlainSQL("INSERT INTO Guest(UserId, Name, Email, Phone) VALUES (1, 'Sahil Bansal', 'sb@g.com', 7781012949)");
            executePlainSQL("INSERT INTO Guest(UserId, Name, Email, Phone) VALUES (2, 'Muaz Abrar', 'ma@g.com', 7780010001)");
            executePlainSQL("INSERT INTO Guest(UserId, Name, Email, Phone) VALUES (3, 'Michael Jackson', 'mj@g.com', 7780010002)");
            executePlainSQL("INSERT INTO Guest(UserId, Name, Email, Phone) VALUES (4, 'Larry', 'larry@dairy.com', 7780010003)");
            executePlainSQL("INSERT INTO Guest(UserId, Name, Email, Phone) VALUES (5, 'John Doe', 'jd@g.com', 7780010011)");
            executePlainSQL("INSERT INTO Guest(UserId, Name, Email, Phone) VALUES (6, 'John Snow', 'js@g.com', 7781012912)");
            executePlainSQL("INSERT INTO Guest(UserId, Name, Email, Phone) VALUES (7, 'Harry Wizard', 'hw@g.com', 7780010013)");
            executePlainSQL("INSERT INTO Guest(UserId, Name, Email, Phone) VALUES (8, 'Ed Knorr', 'ek@g.com', 7780010014)");
            executePlainSQL("INSERT INTO Guest(UserId, Name, Email, Phone) VALUES (9, 'Parry', 'parry@dairy.com', 7780010015)");

            echo "Mock data for Hotel table <br>";
            executePlainSQL("INSERT INTO Hotel(HotelId, Name, Address, Phone) VALUES (0, 'Marriot', '1234 A St.', 7781110000)");
            executePlainSQL("INSERT INTO Hotel(HotelId, Name, Address, Phone) VALUES (1, 'Best Western', '1234 b St.', 7781110001)");
            executePlainSQL("INSERT INTO Hotel(HotelId, Name, Address, Phone) VALUES (2, 'Days Inn', '1234 C St.', 7781110002)");
            executePlainSQL("INSERT INTO Hotel(HotelId, Name, Address, Phone) VALUES (3, 'Hilton', '1234 D St.', 7781110003)");
            executePlainSQL("INSERT INTO Hotel(HotelId, Name, Address, Phone) VALUES (4, 'Ramada', '1234 E St.', 7781110004)");

            executePlainSQL("INSERT INTO Hotel(HotelId, Name, Address, Phone) VALUES (5, 'Holiday Inn', '1234 F St.', 7781110011)");
            executePlainSQL("INSERT INTO Hotel(HotelId, Name, Address, Phone) VALUES (6, 'Canadian Inn', '1234 G St.', 7781110012)");
            executePlainSQL("INSERT INTO Hotel(HotelId, Name, Address, Phone) VALUES (7, 'American Inn', '1234 H St.', 7781110013)");
            executePlainSQL("INSERT INTO Hotel(HotelId, Name, Address, Phone) VALUES (8, 'Vancouver Inn', '1234 I St.', 7781110014)");
            executePlainSQL("INSERT INTO Hotel(HotelId, Name, Address, Phone) VALUES (9, 'Toronto Inn', '1234 J St.', 7781110015)");



            echo "Mock data for Suite table <br>";
            executePlainSQL("INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (1, 1, 0, 2, 1)");
            executePlainSQL("INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (1, 2, 0, 2, 1)");
            executePlainSQL("INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (4, 1, 0, 2, 1)");
            executePlainSQL("INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (2, 5, 0, 2, 1)");
            executePlainSQL("INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (3, 91, 0, 2, 1)");
            executePlainSQL("INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (1, 99, 0, 1, 1)");
            executePlainSQL("INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (2, 1, 0, 3, 1)");
            executePlainSQL("INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (1, 98, 1, 2, 0)");
            executePlainSQL("INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (3, 1, 1, 2, 0)");
            executePlainSQL("INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (1, 97, 1, 1, 0)");
            executePlainSQL("INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (4, 2, 1, 1, 0)");
            executePlainSQL("INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (2, 2, 1, 2, 0)");
            executePlainSQL("INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (2, 3, 1, 1, 0)");
            executePlainSQL("INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (2, 4, 1, 1, 0)");
            executePlainSQL("INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (4, 67, 0, 2, 1)");

            executePlainSQL("INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (5, 1, 0, 2, 1)");
            executePlainSQL("INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (5, 2, 0, 2, 1)");
            executePlainSQL("INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (8, 1, 0, 2, 1)");
            executePlainSQL("INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (6, 5, 0, 2, 1)");
            executePlainSQL("INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (7, 91, 0, 2, 1)");
            executePlainSQL("INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (5, 99, 0, 1, 1)");
            executePlainSQL("INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (6, 1, 0, 3, 1)");
            executePlainSQL("INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (5, 98, 1, 2, 0)");
            executePlainSQL("INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (7, 1, 1, 2, 0)");
            executePlainSQL("INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (5, 97, 1, 1, 0)");
            executePlainSQL("INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (8, 2, 1, 1, 0)");
            executePlainSQL("INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (6, 2, 1, 2, 0)");
            executePlainSQL("INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (6, 3, 1, 1, 0)");
            executePlainSQL("INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (6, 4, 1, 1, 0)");
            executePlainSQL("INSERT INTO Suite(HotelId, SuiteNo, IsInUse, BedCount, IsClean) VALUES (8, 67, 0, 2, 1)");

            echo "Mock data for Books table <br>";
            executePlainSQL("INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (0, 1, 1, TO_DATE('2020-10-18', 'YYYY-MM-DD'), 3, 110)");
            executePlainSQL("INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (1, 1, 2, TO_DATE('2020-10-19', 'YYYY-MM-DD'), 1, 130)");
            executePlainSQL("INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (2, 4, 1, TO_DATE('2020-10-20', 'YYYY-MM-DD'), 2, 120)");
            executePlainSQL("INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (3, 2, 5, TO_DATE('2020-10-21', 'YYYY-MM-DD'), 3, 110)");
            executePlainSQL("INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (4, 3, 91, TO_DATE('2020-11-10', 'YYYY-MM-DD'), 7, 600)");

            executePlainSQL("INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (5, 1, 1, TO_DATE('2019-10-18', 'YYYY-MM-DD'), 13, 56)");
            executePlainSQL("INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (6, 1, 2, TO_DATE('2019-10-19', 'YYYY-MM-DD'), 10, 40)");
            executePlainSQL("INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (7, 4, 1, TO_DATE('2019-10-20', 'YYYY-MM-DD'), 21, 200)");
            executePlainSQL("INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (8, 2, 5, TO_DATE('2019-10-21', 'YYYY-MM-DD'), 32, 30)");
            executePlainSQL("INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (9, 3, 91, TO_DATE('2019-11-10', 'YYYY-MM-DD'), 17, 200)");

            executePlainSQL("INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (9, 1, 1, TO_DATE('2018-10-18', 'YYYY-MM-DD'), 3, 1002)");
            executePlainSQL("INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (8, 1, 2, TO_DATE('2018-10-19', 'YYYY-MM-DD'), 1, 400)");
            executePlainSQL("INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (6, 4, 1, TO_DATE('2018-10-20', 'YYYY-MM-DD'), 2, 45)");
            executePlainSQL("INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (7, 2, 5, TO_DATE('2018-10-21', 'YYYY-MM-DD'), 3, 15)");
            executePlainSQL("INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (5, 3, 91, TO_DATE('2018-11-10', 'YYYY-MM-DD'), 7, 60)");

            executePlainSQL("INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (4, 1, 1, TO_DATE('2017-10-18', 'YYYY-MM-DD'), 13, 156)");
            executePlainSQL("INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (3, 1, 2, TO_DATE('2017-10-19', 'YYYY-MM-DD'), 10, 36)");
            executePlainSQL("INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (1, 4, 1, TO_DATE('2017-10-20', 'YYYY-MM-DD'), 21, 300)");
            executePlainSQL("INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (2, 2, 5, TO_DATE('2017-10-21', 'YYYY-MM-DD'), 32, 560)");
            executePlainSQL("INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (0, 3, 91, TO_DATE('2017-11-10', 'YYYY-MM-DD'), 17, 900)");

            executePlainSQL("INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (0, 5, 1, TO_DATE('2016-10-18', 'YYYY-MM-DD'), 3, 110)");
            executePlainSQL("INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (1, 5, 2, TO_DATE('2016-10-19', 'YYYY-MM-DD'), 1, 130)");
            executePlainSQL("INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (2, 8, 1, TO_DATE('2016-10-20', 'YYYY-MM-DD'), 2, 120)");
            executePlainSQL("INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (3, 6, 5, TO_DATE('2016-10-21', 'YYYY-MM-DD'), 3, 110)");
            executePlainSQL("INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (4, 7, 91, TO_DATE('2016-11-10', 'YYYY-MM-DD'), 7, 600)");

            executePlainSQL("INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (5, 5, 1, TO_DATE('2015-10-18', 'YYYY-MM-DD'), 13, 56)");
            executePlainSQL("INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (6, 5, 2, TO_DATE('2015-10-19', 'YYYY-MM-DD'), 10, 40)");
            executePlainSQL("INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (7, 8, 1, TO_DATE('2015-10-20', 'YYYY-MM-DD'), 21, 200)");
            executePlainSQL("INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (8, 6, 5, TO_DATE('2015-10-21', 'YYYY-MM-DD'), 32, 30)");
            executePlainSQL("INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (9, 7, 91, TO_DATE('2015-11-10', 'YYYY-MM-DD'), 17, 200)");

            executePlainSQL("INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (9, 5, 1, TO_DATE('2014-10-18', 'YYYY-MM-DD'), 3, 1002)");
            executePlainSQL("INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (7, 5, 2, TO_DATE('2014-10-19', 'YYYY-MM-DD'), 1, 400)");
            executePlainSQL("INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (8, 8, 1, TO_DATE('2014-10-20', 'YYYY-MM-DD'), 2, 45)");
            executePlainSQL("INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (6, 6, 5, TO_DATE('2014-10-21', 'YYYY-MM-DD'), 3, 15)");
            executePlainSQL("INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (5, 7, 91, TO_DATE('2014-11-10', 'YYYY-MM-DD'), 7, 60)");

            executePlainSQL("INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (4, 5, 1, TO_DATE('2013-10-18', 'YYYY-MM-DD'), 13, 156)");
            executePlainSQL("INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (3, 5, 2, TO_DATE('2013-10-19', 'YYYY-MM-DD'), 10, 36)");
            executePlainSQL("INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (1, 8, 1, TO_DATE('2013-10-20', 'YYYY-MM-DD'), 21, 300)");
            executePlainSQL("INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (2, 6, 5, TO_DATE('2013-10-21', 'YYYY-MM-DD'), 32, 560)");
            executePlainSQL("INSERT INTO Books(UserId, HotelId, SuiteNo, BookingDate, StayLength, Price) VALUES (0, 7, 91, TO_DATE('2013-11-10', 'YYYY-MM-DD'), 17, 900)");



            echo "Mock data for Standard table <br>";
            executePlainSQL("INSERT INTO Standard(HotelId, SuiteNo, HasSofaBed) VALUES (1, 1, 0)");
            executePlainSQL("INSERT INTO Standard(HotelId, SuiteNo, HasSofaBed) VALUES (1, 2, 0)");
            executePlainSQL("INSERT INTO Standard(HotelId, SuiteNo, HasSofaBed) VALUES (4, 1, 0)");
            executePlainSQL("INSERT INTO Standard(HotelId, SuiteNo, HasSofaBed) VALUES (2, 5, 1)");
            executePlainSQL("INSERT INTO Standard(HotelId, SuiteNo, HasSofaBed) VALUES (3, 91, 1)");

            echo "Mock data for Deluxe table <br>";
            executePlainSQL("INSERT INTO Deluxe(HotelId, SuiteNo, NoOfRooms) VALUES (1, 99, 1)");
            executePlainSQL("INSERT INTO Deluxe(HotelId, SuiteNo, NoOfRooms) VALUES (2, 1, 1)");
            executePlainSQL("INSERT INTO Deluxe(HotelId, SuiteNo, NoOfRooms) VALUES (1, 98, 1)");
            executePlainSQL("INSERT INTO Deluxe(HotelId, SuiteNo, NoOfRooms) VALUES (3, 1, 1)");
            executePlainSQL("INSERT INTO Deluxe(HotelId, SuiteNo, NoOfRooms) VALUES (1, 97, 2)");

            echo "Mock data for Business table <br>";
            executePlainSQL("INSERT INTO Business(HotelId, SuiteNo, HasLivingRoom) VALUES (4, 2, 0)");
            executePlainSQL("INSERT INTO Business(HotelId, SuiteNo, HasLivingRoom) VALUES (2, 2, 0)");
            executePlainSQL("INSERT INTO Business(HotelId, SuiteNo, HasLivingRoom) VALUES (2, 3, 0)");
            executePlainSQL("INSERT INTO Business(HotelId, SuiteNo, HasLivingRoom) VALUES (2, 4, 0)");
            executePlainSQL("INSERT INTO Business(HotelId, SuiteNo, HasLivingRoom) VALUES (4, 67, 1)");

            echo "Mock data for PayrollGroup table <br>";
            executePlainSQL("INSERT INTO PayrollGroup(PGID, Name) VALUES (0, 'John Doe')");
            executePlainSQL("INSERT INTO PayrollGroup(PGID, Name) VALUES (1, 'Jinny Dee')");
            executePlainSQL("INSERT INTO PayrollGroup(PGID, Name) VALUES (2, 'Johnny Appleseed')");
            executePlainSQL("INSERT INTO PayrollGroup(PGID, Name) VALUES (3, 'Jinnina Regina')");
            executePlainSQL("INSERT INTO PayrollGroup(PGID, Name) VALUES (4, 'John Doe')");
            executePlainSQL("INSERT INTO PayrollGroup(PGID, Name) VALUES (5, 'The Boondocks')");
            executePlainSQL("INSERT INTO PayrollGroup(PGID, Name) VALUES (6, 'Queen')");
            executePlainSQL("INSERT INTO PayrollGroup(PGID, Name) VALUES (7, 'Coldplay')");
            executePlainSQL("INSERT INTO PayrollGroup(PGID, Name) VALUES (8, 'Travis Scott')");
            executePlainSQL("INSERT INTO PayrollGroup(PGID, Name) VALUES (9, 'The Beatles')");
            executePlainSQL("INSERT INTO PayrollGroup(PGID, Name) VALUES (10, 'Johnny Appleseed')");
            executePlainSQL("INSERT INTO PayrollGroup(PGID, Name) VALUES (11, 'Jinny Dee')");
            executePlainSQL("INSERT INTO PayrollGroup(PGID, Name) VALUES (12, 'John Doe')");
            executePlainSQL("INSERT INTO PayrollGroup(PGID, Name) VALUES (13, 'Jinnina Regina')");
            executePlainSQL("INSERT INTO PayrollGroup(PGID, Name) VALUES (14, 'Johnny Appleseed')");

            echo "Mock data for Hires table <br>";
            executePlainSQL("INSERT INTO Hires(HotelId, PGID) VALUES (0,0)");
            executePlainSQL("INSERT INTO Hires(HotelId, PGID) VALUES (1,0)");
            executePlainSQL("INSERT INTO Hires(HotelId, PGID) VALUES (2,0)");
            executePlainSQL("INSERT INTO Hires(HotelId, PGID) VALUES (3,0)");
            executePlainSQL("INSERT INTO Hires(HotelId, PGID) VALUES (4,0)");

            executePlainSQL("INSERT INTO Hires(HotelId, PGID) VALUES (0,1)");
            executePlainSQL("INSERT INTO Hires(HotelId, PGID) VALUES (1,1)");
            executePlainSQL("INSERT INTO Hires(HotelId, PGID) VALUES (2,1)");
            executePlainSQL("INSERT INTO Hires(HotelId, PGID) VALUES (3,1)");
            executePlainSQL("INSERT INTO Hires(HotelId, PGID) VALUES (4,1)");

            executePlainSQL("INSERT INTO Hires(HotelId, PGID) VALUES (0,2)");
            executePlainSQL("INSERT INTO Hires(HotelId, PGID) VALUES (1,2)");
            executePlainSQL("INSERT INTO Hires(HotelId, PGID) VALUES (2,2)");
            executePlainSQL("INSERT INTO Hires(HotelId, PGID) VALUES (3,2)");
            executePlainSQL("INSERT INTO Hires(HotelId, PGID) VALUES (4,2)");

            executePlainSQL("INSERT INTO Hires(HotelId, PGID) VALUES (0,3)");
            executePlainSQL("INSERT INTO Hires(HotelId, PGID) VALUES (1,3)");
            executePlainSQL("INSERT INTO Hires(HotelId, PGID) VALUES (2,3)");
            executePlainSQL("INSERT INTO Hires(HotelId, PGID) VALUES (3,3)");
            executePlainSQL("INSERT INTO Hires(HotelId, PGID) VALUES (4,3)");

            executePlainSQL("INSERT INTO Hires(HotelId, PGID) VALUES (0,4)");
            executePlainSQL("INSERT INTO Hires(HotelId, PGID) VALUES (1,4)");
            executePlainSQL("INSERT INTO Hires(HotelId, PGID) VALUES (2,4)");
            executePlainSQL("INSERT INTO Hires(HotelId, PGID) VALUES (3,4)");
            executePlainSQL("INSERT INTO Hires(HotelId, PGID) VALUES (4,4)");

            executePlainSQL("INSERT INTO Hires(HotelId, PGID) VALUES (0,5)");
            executePlainSQL("INSERT INTO Hires(HotelId, PGID) VALUES (1,5)");
            executePlainSQL("INSERT INTO Hires(HotelId, PGID) VALUES (2,5)");
            executePlainSQL("INSERT INTO Hires(HotelId, PGID) VALUES (3,5)");
            executePlainSQL("INSERT INTO Hires(HotelId, PGID) VALUES (4,5)");

            executePlainSQL("INSERT INTO Hires(HotelId, PGID) VALUES (0,6)");
            executePlainSQL("INSERT INTO Hires(HotelId, PGID) VALUES (1,6)");
            executePlainSQL("INSERT INTO Hires(HotelId, PGID) VALUES (2,6)");
            executePlainSQL("INSERT INTO Hires(HotelId, PGID) VALUES (3,6)");
            executePlainSQL("INSERT INTO Hires(HotelId, PGID) VALUES (4,6)");

            echo "Mock data for PerformanceGroup table <br>";
            executePlainSQL("INSERT INTO PerformanceGroup(PGID, ContractStartDate, ContractEndDate, ChargeRate) VALUES (5, TO_DATE('2017-09-01', 'YYYY-MM-DD'), TO_DATE('2018-09-05',
            'YYYY-MM-DD'), 1200)");
            executePlainSQL("INSERT INTO PerformanceGroup(PGID, ContractStartDate, ContractEndDate, ChargeRate) VALUES (6, TO_DATE('2018-12-23', 'YYYY-MM-DD'), TO_DATE('2019-12-26',
            'YYYY-MM-DD'), 3000)");
            executePlainSQL("INSERT INTO PerformanceGroup(PGID, ContractStartDate, ContractEndDate, ChargeRate) VALUES (7, TO_DATE('2019-07-07', 'YYYY-MM-DD'), TO_DATE('2019-07-09',
            'YYYY-MM-DD'), 4500)");
            executePlainSQL("INSERT INTO PerformanceGroup(PGID, ContractStartDate, ContractEndDate, ChargeRate) VALUES (8, TO_DATE('2020-04-22', 'YYYY-MM-DD'), TO_DATE('2020-04-23',
            'YYYY-MM-DD'), 8989)");
            executePlainSQL("INSERT INTO PerformanceGroup(PGID, ContractStartDate, ContractEndDate, ChargeRate) VALUES (9, TO_DATE('2020-10-25', 'YYYY-MM-DD'), TO_DATE('2020-10-23',
            'YYYY-MM-DD'), 2200)");

            echo "Mock data for Performance table <br>";
            executePlainSQL("INSERT INTO Performance(PID, PGID, PerformanceDate, Attendance) VALUES (0, 5, TO_DATE('2017-09-01', 'YYYY-MM-DD'), 28)");
            executePlainSQL("INSERT INTO Performance(PID, PGID, PerformanceDate, Attendance) VALUES (1, 6, TO_DATE('2018-12-23', 'YYYY-MM-DD'), 99)");
            executePlainSQL("INSERT INTO Performance(PID, PGID, PerformanceDate, Attendance) VALUES (2, 7, TO_DATE('2019-07-07', 'YYYY-MM-DD'), 300)");
            executePlainSQL("INSERT INTO Performance(PID, PGID, PerformanceDate, Attendance) VALUES (3, 8, TO_DATE('2020-04-22', 'YYYY-MM-DD'), 350)");
            executePlainSQL("INSERT INTO Performance(PID, PGID, PerformanceDate, Attendance) VALUES (4, 9, TO_DATE('2020-04-23', 'YYYY-MM-DD'), 600)");

            echo "Mock data for Watches table <br>";
            executePlainSQL("INSERT INTO Watches(UserId, PID) VALUES (0, 0)");
            executePlainSQL("INSERT INTO Watches(UserId, PID) VALUES (0, 1)");
            executePlainSQL("INSERT INTO Watches(UserId, PID) VALUES (0, 2)");
            executePlainSQL("INSERT INTO Watches(UserId, PID) VALUES (0, 3)");
            executePlainSQL("INSERT INTO Watches(UserId, PID) VALUES (0, 4)");
            executePlainSQL("INSERT INTO Watches(UserId, PID) VALUES (1, 1)");
            executePlainSQL("INSERT INTO Watches(UserId, PID) VALUES (2, 2)");
            executePlainSQL("INSERT INTO Watches(UserId, PID) VALUES (3, 3)");
            executePlainSQL("INSERT INTO Watches(UserId, PID) VALUES (2, 4)");
            executePlainSQL("INSERT INTO Watches(UserId, PID) VALUES (2, 0)");
            executePlainSQL("INSERT INTO Watches(UserId, PID) VALUES (2, 1)");
            executePlainSQL("INSERT INTO Watches(UserId, PID) VALUES (2, 3)");

            executePlainSQL("INSERT INTO Watches(UserId, PID) VALUES (4, 0)");
            executePlainSQL("INSERT INTO Watches(UserId, PID) VALUES (4, 1)");
            executePlainSQL("INSERT INTO Watches(UserId, PID) VALUES (4, 2)");
            executePlainSQL("INSERT INTO Watches(UserId, PID) VALUES (4, 3)");
            executePlainSQL("INSERT INTO Watches(UserId, PID) VALUES (4, 4)");
            executePlainSQL("INSERT INTO Watches(UserId, PID) VALUES (5, 1)");
            executePlainSQL("INSERT INTO Watches(UserId, PID) VALUES (6, 2)");
            executePlainSQL("INSERT INTO Watches(UserId, PID) VALUES (7, 3)");
            executePlainSQL("INSERT INTO Watches(UserId, PID) VALUES (6, 4)");
            executePlainSQL("INSERT INTO Watches(UserId, PID) VALUES (6, 0)");
            executePlainSQL("INSERT INTO Watches(UserId, PID) VALUES (6, 1)");
            executePlainSQL("INSERT INTO Watches(UserId, PID) VALUES (6, 3)");

            executePlainSQL("INSERT INTO Watches(UserId, PID) VALUES (8, 0)");
            executePlainSQL("INSERT INTO Watches(UserId, PID) VALUES (8, 1)");
            executePlainSQL("INSERT INTO Watches(UserId, PID) VALUES (8, 2)");
            executePlainSQL("INSERT INTO Watches(UserId, PID) VALUES (8, 3)");
            executePlainSQL("INSERT INTO Watches(UserId, PID) VALUES (8, 4)");
            executePlainSQL("INSERT INTO Watches(UserId, PID) VALUES (9, 2)");
            executePlainSQL("INSERT INTO Watches(UserId, PID) VALUES (9, 4)");
            executePlainSQL("INSERT INTO Watches(UserId, PID) VALUES (9, 0)");
            executePlainSQL("INSERT INTO Watches(UserId, PID) VALUES (9, 1)");
            executePlainSQL("INSERT INTO Watches(UserId, PID) VALUES (9, 3)");

            echo "Mock data for Employee table <br>";
            executePlainSQL("INSERT INTO Employee(PGID, StartDate, Salary, JobDescription, isCurrentlyEmployed, EndDate) VALUES (1, TO_DATE('2019-09-05', 'YYYY-MM-DD'), 3000,
            'Cook', 0, TO_DATE('2020-09-05', 'YYYY-MM-DD'))");
            executePlainSQL("INSERT INTO Employee(PGID, StartDate, Salary, JobDescription, isCurrentlyEmployed, EndDate) VALUES (2, TO_DATE('2019-08-26', 'YYYY-MM-DD'), 4000,
            'Janitor', 1, TO_DATE('2021-09-05', 'YYYY-MM-DD'))");
            executePlainSQL("INSERT INTO Employee(PGID, StartDate, Salary, JobDescription, isCurrentlyEmployed, EndDate) VALUES (3, TO_DATE('2019-10-30', 'YYYY-MM-DD'), 3300,
            'Plumber', 1, TO_DATE('2021-09-05', 'YYYY-MM-DD'))");
            executePlainSQL("INSERT INTO Employee(PGID, StartDate, Salary, JobDescription, isCurrentlyEmployed, EndDate) VALUES (4, TO_DATE('2019-01-06', 'YYYY-MM-DD'), 3500,
            'Receptionist', 1, TO_DATE('2021-09-05', 'YYYY-MM-DD'))");
            executePlainSQL("INSERT INTO Employee(PGID, StartDate, Salary, JobDescription, isCurrentlyEmployed, EndDate) VALUES (5, TO_DATE('2019-04-05', 'YYYY-MM-DD'), 3200,
            'HouseKeeper', 1, TO_DATE('2021-09-05', 'YYYY-MM-DD'))");

            echo "Mock data for FacilityEmployee table <br>";
            executePlainSQL("INSERT INTO FacilityEmployee(PGID, StartDate, Salary) VALUES (10, TO_DATE('2019-09-05', 'YYYY-MM-DD'), 3000)");
            executePlainSQL("INSERT INTO FacilityEmployee(PGID, StartDate, Salary) VALUES (11, TO_DATE('2019-08-26', 'YYYY-MM-DD'), 4000)");
            executePlainSQL("INSERT INTO FacilityEmployee(PGID, StartDate, Salary) VALUES (12, TO_DATE('2019-10-30', 'YYYY-MM-DD'), 3300)");
            executePlainSQL("INSERT INTO FacilityEmployee(PGID, StartDate, Salary) VALUES (13, TO_DATE('2019-01-06', 'YYYY-MM-DD'), 3500)");
            executePlainSQL("INSERT INTO FacilityEmployee(PGID, StartDate, Salary) VALUES (14, TO_DATE('2019-04-05', 'YYYY-MM-DD'), 3200)");

            echo "Mock data for OperatorGroup table <br>";
            executePlainSQL("INSERT INTO OperatorGroup(GroupId, MemberCount) VALUES (1, 10)");
            executePlainSQL("INSERT INTO OperatorGroup(GroupId, MemberCount) VALUES (2, 7)");
            executePlainSQL("INSERT INTO OperatorGroup(GroupId, MemberCount) VALUES (3, 5)");
            executePlainSQL("INSERT INTO OperatorGroup(GroupId, MemberCount) VALUES (4, 3)");
            executePlainSQL("INSERT INTO OperatorGroup(GroupId, MemberCount) VALUES (5, 12)");

            executePlainSQL("INSERT INTO OperatorGroup(GroupId, MemberCount) VALUES (6, 10)");
            executePlainSQL("INSERT INTO OperatorGroup(GroupId, MemberCount) VALUES (7, 7)");
            executePlainSQL("INSERT INTO OperatorGroup(GroupId, MemberCount) VALUES (8, 5)");
            executePlainSQL("INSERT INTO OperatorGroup(GroupId, MemberCount) VALUES (9, 3)");
            executePlainSQL("INSERT INTO OperatorGroup(GroupId, MemberCount) VALUES (10, 12)");

            executePlainSQL("INSERT INTO OperatorGroup(GroupId, MemberCount) VALUES (11, 10)");
            executePlainSQL("INSERT INTO OperatorGroup(GroupId, MemberCount) VALUES (12, 7)");
            executePlainSQL("INSERT INTO OperatorGroup(GroupId, MemberCount) VALUES (13, 5)");
            executePlainSQL("INSERT INTO OperatorGroup(GroupId, MemberCount) VALUES (14, 3)");
            executePlainSQL("INSERT INTO OperatorGroup(GroupId, MemberCount) VALUES (15, 12)");

            executePlainSQL("INSERT INTO OperatorGroup(GroupId, MemberCount) VALUES (16, 10)");
            executePlainSQL("INSERT INTO OperatorGroup(GroupId, MemberCount) VALUES (17, 7)");
            executePlainSQL("INSERT INTO OperatorGroup(GroupId, MemberCount) VALUES (18, 5)");
            executePlainSQL("INSERT INTO OperatorGroup(GroupId, MemberCount) VALUES (19, 3)");
            executePlainSQL("INSERT INTO OperatorGroup(GroupId, MemberCount) VALUES (29, 12)");

            echo "Mock data for Assigns table <br>";
            executePlainSQL("INSERT INTO Assigns(GroupId, PGID, AssignmentDate) VALUES (1, 3, TO_DATE('2019-09-05', 'YYYY-MM-DD'))");
            executePlainSQL("INSERT INTO Assigns(GroupId, PGID, AssignmentDate) VALUES (2, 6, TO_DATE('2019-08-26', 'YYYY-MM-DD'))");
            executePlainSQL("INSERT INTO Assigns(GroupId, PGID, AssignmentDate) VALUES (3, 12, TO_DATE('2019-10-30', 'YYYY-MM-DD'))");
            executePlainSQL("INSERT INTO Assigns(GroupId, PGID, AssignmentDate) VALUES (4, 4, TO_DATE('2019-01-06', 'YYYY-MM-DD'))");
            executePlainSQL("INSERT INTO Assigns(GroupId, PGID, AssignmentDate) VALUES (5, 8, TO_DATE('2019-04-05', 'YYYY-MM-DD'))");

            echo "Mock data for Restaurant table <br>";
            executePlainSQL("INSERT INTO Restaurant(HotelId, RestaurantName, GroupId, MaxCapacity) VALUES (0, 'McDonalds', 3, 30)");
            executePlainSQL("INSERT INTO Restaurant(HotelId, RestaurantName, GroupId, MaxCapacity) VALUES (1, 'KFC', 5, 24)");
            executePlainSQL("INSERT INTO Restaurant(HotelId, RestaurantName, GroupId, MaxCapacity) VALUES (2, 'Dominoz', 4, 5)");
            executePlainSQL("INSERT INTO Restaurant(HotelId, RestaurantName, GroupId, MaxCapacity) VALUES (3, 'A and W', 2, 20)");
            executePlainSQL("INSERT INTO Restaurant(HotelId, RestaurantName, GroupId, MaxCapacity) VALUES (4, 'Subway', 1, 15)");

            echo "Mock data for EatsAt table <br>";
            executePlainSQL("INSERT INTO EatsAt(UserId, HotelId, RestaurantName, MenuItem) VALUES (0, 0, 'McDonalds', 'Chicken Nuggets')");
            executePlainSQL("INSERT INTO EatsAt(UserId, HotelId, RestaurantName, MenuItem) VALUES (1, 1, 'KFC', 'Chicken')");
            executePlainSQL("INSERT INTO EatsAt(UserId, HotelId, RestaurantName, MenuItem) VALUES (2, 2, 'Dominoz', 'Pizza')");
            executePlainSQL("INSERT INTO EatsAt(UserId, HotelId, RestaurantName, MenuItem) VALUES (3, 3, 'A and W', 'Beyond Meat Burger')");
            executePlainSQL("INSERT INTO EatsAt(UserId, HotelId, RestaurantName, MenuItem) VALUES (4, 4, 'Subway', 'Sandwich')");

            echo "Mock data for MenuItemPrices table <br>";
            executePlainSQL("INSERT INTO MenuItemPrices(HotelId, RestaurantName, MenuItem, Price) VALUES (0,'McDonalds', 'Chicken Nuggets', 69)");
            executePlainSQL("INSERT INTO MenuItemPrices(HotelId, RestaurantName, MenuItem, Price) VALUES (1,'KFC', 'Chicken', 2)");
            executePlainSQL("INSERT INTO MenuItemPrices(HotelId, RestaurantName, MenuItem, Price) VALUES (2,'Dominoz', 'Pizza', 6)");
            executePlainSQL("INSERT INTO MenuItemPrices(HotelId, RestaurantName, MenuItem, Price) VALUES (4,'Subway', 'Sandwich', 1)");
            executePlainSQL("INSERT INTO MenuItemPrices(HotelId, RestaurantName, MenuItem, Price) VALUES (3,'A and W', 'Beyond Meat Burger', 1000)");

            echo "Mock data for Pool table <br>";
            executePlainSQL("INSERT INTO Pool(HotelId, PoolName, GroupId, isDrained) VALUES (0, 'Sahils Pool', 1, 1)");
            executePlainSQL("INSERT INTO Pool(HotelId, PoolName, GroupId, isDrained) VALUES (1, 'Johns Pool', 2, 0)");
            executePlainSQL("INSERT INTO Pool(HotelId, PoolName, GroupId, isDrained) VALUES (2, 'Harmans Pool', 3, 1)");
            executePlainSQL("INSERT INTO Pool(HotelId, PoolName, GroupId, isDrained) VALUES (3, 'Muazs Pool', 4, 0)");
            executePlainSQL("INSERT INTO Pool(HotelId, PoolName, GroupId, isDrained) VALUES (4, 'Jerrys Pool', 5, 0)");

            echo "Mock data for SwimsAt table <br>";
            executePlainSQL("INSERT INTO SwimsAt(UserId, HotelId, PoolName) VALUES (0, 0, 'Sahils Pool')");
            executePlainSQL("INSERT INTO SwimsAt(UserId, HotelId, PoolName) VALUES (1, 1, 'Johns Pool')");
            executePlainSQL("INSERT INTO SwimsAt(UserId, HotelId, PoolName) VALUES (2, 2, 'Harmans Pool')");
            executePlainSQL("INSERT INTO SwimsAt(UserId, HotelId, PoolName) VALUES (3, 3, 'Muazs Pool')");
            executePlainSQL("INSERT INTO SwimsAt(UserId, HotelId, PoolName) VALUES (4, 4, 'Jerrys Pool')");

            echo "Mock data for Gym table <br>";
            executePlainSQL("INSERT INTO Gym(HotelId, GymName, GroupId, MaxCapacity) VALUES (0, 'Sahils Gym', 1, 50)");
            executePlainSQL("INSERT INTO Gym(HotelId, GymName, GroupId, MaxCapacity) VALUES (1, 'Johns Gym', 2, 40)");
            executePlainSQL("INSERT INTO Gym(HotelId, GymName, GroupId, MaxCapacity) VALUES (2, 'Harmans Gym', 3, 45)");
            executePlainSQL("INSERT INTO Gym(HotelId, GymName, GroupId, MaxCapacity) VALUES (3, 'Muazs Gym', 4, 36)");
            executePlainSQL("INSERT INTO Gym(HotelId, GymName, GroupId, MaxCapacity) VALUES (4, 'Jerrys Gym', 5, 55)");

            executePlainSQL("INSERT INTO Gym(HotelId, GymName, GroupId, MaxCapacity) VALUES (5, 'Sahils Gym', 6, 50)");
            executePlainSQL("INSERT INTO Gym(HotelId, GymName, GroupId, MaxCapacity) VALUES (6, 'Johns Gym', 7, 40)");
            executePlainSQL("INSERT INTO Gym(HotelId, GymName, GroupId, MaxCapacity) VALUES (7, 'Harmans Gym', 8, 45)");
            executePlainSQL("INSERT INTO Gym(HotelId, GymName, GroupId, MaxCapacity) VALUES (8, 'Muazs Gym', 9, 36)");
            executePlainSQL("INSERT INTO Gym(HotelId, GymName, GroupId, MaxCapacity) VALUES (9, 'Jerrys Gym', 10, 55)");

            executePlainSQL("INSERT INTO Gym(HotelId, GymName, GroupId, MaxCapacity) VALUES (0, 'Gold Gym', 11, 50)");
            executePlainSQL("INSERT INTO Gym(HotelId, GymName, GroupId, MaxCapacity) VALUES (1, 'Anytime Gym', 12, 40)");
            executePlainSQL("INSERT INTO Gym(HotelId, GymName, GroupId, MaxCapacity) VALUES (2, 'Goodlife Gym', 13, 45)");
            executePlainSQL("INSERT INTO Gym(HotelId, GymName, GroupId, MaxCapacity) VALUES (3, 'Planet Gym', 14, 36)");
            executePlainSQL("INSERT INTO Gym(HotelId, GymName, GroupId, MaxCapacity) VALUES (4, 'Club99 Gym', 15, 55)");

            executePlainSQL("INSERT INTO Gym(HotelId, GymName, GroupId, MaxCapacity) VALUES (5, 'Gold Gym', 16, 50)");
            executePlainSQL("INSERT INTO Gym(HotelId, GymName, GroupId, MaxCapacity) VALUES (6, 'Anytime Gym', 17, 40)");
            executePlainSQL("INSERT INTO Gym(HotelId, GymName, GroupId, MaxCapacity) VALUES (7, 'Goodlife Gym', 18, 45)");
            executePlainSQL("INSERT INTO Gym(HotelId, GymName, GroupId, MaxCapacity) VALUES (8, 'Planet Gym', 19, 36)");

            echo "Mock data for WorksOutAt table <br>";
            executePlainSQL("INSERT INTO WorksOutAt(UserId, HotelId, GymName) VALUES (0, 0, 'Sahils Gym')");
            executePlainSQL("INSERT INTO WorksOutAt(UserId, HotelId, GymName) VALUES (1, 1, 'Johns Gym')");
            executePlainSQL("INSERT INTO WorksOutAt(UserId, HotelId, GymName) VALUES (2, 2, 'Harmans Gym')");
            executePlainSQL("INSERT INTO WorksOutAt(UserId, HotelId, GymName) VALUES (3, 3, 'Muazs Gym')");
            executePlainSQL("INSERT INTO WorksOutAt(UserId, HotelId, GymName) VALUES (4, 4, 'Jerrys Gym')");

            executePlainSQL("INSERT INTO WorksOutAt(UserId, HotelId, GymName) VALUES (0, 5, 'Sahils Gym')");
            executePlainSQL("INSERT INTO WorksOutAt(UserId, HotelId, GymName) VALUES (1, 6, 'Johns Gym')");
            executePlainSQL("INSERT INTO WorksOutAt(UserId, HotelId, GymName) VALUES (2, 7, 'Harmans Gym')");
            executePlainSQL("INSERT INTO WorksOutAt(UserId, HotelId, GymName) VALUES (3, 8, 'Muazs Gym')");
            executePlainSQL("INSERT INTO WorksOutAt(UserId, HotelId, GymName) VALUES (4, 9, 'Jerrys Gym')");

            executePlainSQL("INSERT INTO WorksOutAt(UserId, HotelId, GymName) VALUES (0, 0, 'Gold Gym')");
            executePlainSQL("INSERT INTO WorksOutAt(UserId, HotelId, GymName) VALUES (1, 1, 'Anytime Gym')");
            executePlainSQL("INSERT INTO WorksOutAt(UserId, HotelId, GymName) VALUES (2, 2, 'Goodlife Gym')");
            executePlainSQL("INSERT INTO WorksOutAt(UserId, HotelId, GymName) VALUES (3, 3, 'Planet Gym')");
            executePlainSQL("INSERT INTO WorksOutAt(UserId, HotelId, GymName) VALUES (4, 4, 'Club99 Gym')");

            executePlainSQL("INSERT INTO WorksOutAt(UserId, HotelId, GymName) VALUES (0, 5, 'Gold Gym')");
            executePlainSQL("INSERT INTO WorksOutAt(UserId, HotelId, GymName) VALUES (1, 6, 'Anytime Gym')");
            executePlainSQL("INSERT INTO WorksOutAt(UserId, HotelId, GymName) VALUES (2, 7, 'Goodlife Gym')");
            executePlainSQL("INSERT INTO WorksOutAt(UserId, HotelId, GymName) VALUES (3, 8, 'Planet Gym')");

            echo "Mock data for Spa table <br>";
            executePlainSQL("INSERT INTO Spa(HotelId, SpaName, GroupId, MaxCapacity) VALUES (0, 'Sahils Spa', 1, 50)");
            executePlainSQL("INSERT INTO Spa(HotelId, SpaName, GroupId, MaxCapacity) VALUES (1, 'Johns Spa', 2, 40)");
            executePlainSQL("INSERT INTO Spa(HotelId, SpaName, GroupId, MaxCapacity) VALUES (2, 'Harmans Spa', 3, 45)");
            executePlainSQL("INSERT INTO Spa(HotelId, SpaName, GroupId, MaxCapacity) VALUES (3, 'Muazs Spa', 4, 36)");
            executePlainSQL("INSERT INTO Spa(HotelId, SpaName, GroupId, MaxCapacity) VALUES (4, 'Jerrys Spa', 5, 55)");

            echo "Mock data for RelaxesIn table <br>";
            executePlainSQL("INSERT INTO RelaxesIn(UserId, HotelId, SpaName, TreatmentRating) VALUES (0, 0, 'Sahils Spa', 5)");
            executePlainSQL("INSERT INTO RelaxesIn(UserId, HotelId, SpaName, TreatmentRating) VALUES (1, 1, 'Johns Spa', 1)");
            executePlainSQL("INSERT INTO RelaxesIn(UserId, HotelId, SpaName, TreatmentRating) VALUES (2, 2, 'Harmans Spa', 5)");
            executePlainSQL("INSERT INTO RelaxesIn(UserId, HotelId, SpaName, TreatmentRating) VALUES (3, 3, 'Muazs Spa', 0)");
            executePlainSQL("INSERT INTO RelaxesIn(UserId, HotelId, SpaName, TreatmentRating) VALUES (4, 4, 'Jerrys Spa', 4)");

            echo "Mock data for TreatmentPricing table <br>";
            executePlainSQL("INSERT INTO TreatmentPricing(HotelId, SpaName, TreatmentRating, Price) VALUES (0, 'Sahils Spa', 5, 100)");
            executePlainSQL("INSERT INTO TreatmentPricing(HotelId, SpaName, TreatmentRating, Price) VALUES (1, 'Johns Spa', 1, 20)");
            executePlainSQL("INSERT INTO TreatmentPricing(HotelId, SpaName, TreatmentRating, Price) VALUES (2, 'Harmans Spa',5, 100)");
            executePlainSQL("INSERT INTO TreatmentPricing(HotelId, SpaName, TreatmentRating, Price) VALUES (3, 'Muazs Spa', 0, 0)");
            executePlainSQL("INSERT INTO TreatmentPricing(HotelId, SpaName, TreatmentRating, Price) VALUES (4, 'Jerrys Spa', 4, 80)");

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
            OCICommit($db_conn);
        }

        function handleProjectionRequest() {
            global $db_conn;

            $result = executePlainSQL("SELECT Name, Email, Phone FROM Guest");

            echo "<br>Retrieved data from table Guest:<br>";
            echo "<table>";
            echo "<tr><th>Name</th><th>Email</th><th>Phone</th></tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row["NAME"] . "</td><td>" . $row["EMAIL"] . "</td><td>" . $row["PHONE"] . "</td></tr>"; //or just use "echo $row[0]" 
            }

            echo "</table>";

            OCICommit($db_conn);
        }

        function handleDivisionRequest() {
            global $db_conn;

            $result = executePlainSQL("SELECT G.UserId, G.Name FROM Guest G WHERE NOT EXISTS( SELECT P.PID FROM Performance P Minus( SELECT W.PID FROM Watches W WHERE W.UserId = G.UserId))");

            echo "<br>Retrieved data from table:<br>";
            echo "<table>";
            echo "<tr><th>UserId</th><th>Name</th></tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row["USERID"] . "</td><td>" . $row["NAME"] . "</td></tr>"; //or just use "echo $row[0]" 
            }

            echo "</table>";

            OCICommit($db_conn);
        }

        function handleJoinRequest() {
            global $db_conn;

            $guestId = $_GET['guestId'];

            $request = "SELECT W.HotelId, W.GymName, G.MaxCapacity FROM WorksOutAt W, Gym G WHERE W.GymName = G.GymName AND W.UserId =" . $guestId;

            $result = executePlainSQL($request);

            echo "<br>Retrieved data from table:<br>";
            echo "<table>";
            echo "<tr><th>HotelId</th><th>GymName</th><th>MaxCapacity</th></tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row["HOTELID"] . "</td><td>" . $row["GYMNAME"] . "</td><td>" . $row["MAXCAPACITY"] . "</td></tr>"; //or just use "echo $row[0]" 
            }
            echo "</table>";

            OCICommit($db_conn);
        }

        function handleInsertHotelRequest() {
            global $db_conn;

            $tuple = array (
                ":bind1" => $_POST['hotelId'],
                ":bind2" => $_POST['name'],
                ":bind3" => $_POST['address'],
                ":bind4" => $_POST['phone']
            );

            $alltuples = array (
                $tuple
            );

            $result = executeBoundSQL("INSERT INTO Hotel (HotelId, Name, Address, Phone) values (:bind1, :bind2, :bind3, :bind4)", $alltuples);
            
            echo "Hotel Created.";
            
            OCICommit($db_conn);
        }

        function handleDeleteRequest() {
            global $db_conn;

            $tuple = array (
                ":bind1" => $_POST['hotelId'],
                ":bind2" => $_POST['poolName']
            );

            $alltuples = array (
                $tuple
            );

            $result = executeBoundSQL("DELETE FROM Pool WHERE HotelId = (:bind1) AND PoolName = (:bind2)", $alltuples);
            
            echo "Deleted Pool.";
            
            OCICommit($db_conn);
        }

        function handleSelectRequest() {
            global $db_conn;

            $request = "SELECT Email FROM Guest WHERE Phone ='". $_GET['guestEmail'] . "'";

            $result = executePlainSQL($request);
            
            echo "<br>Retrieved data from table Guest:<br>";
            echo "<table>";
            echo "<tr><th>Email</th></tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row["EMAIL"] . "</td></tr>"; //or just use "echo $row[0]" 
            }
            echo "</table>";
            
            OCICommit($db_conn);
        }

        function handleAgg1Request() {
            global $db_conn;

            $result = executePlainSQL("SELECT H.HotelId, G.GymName FROM Hotel H, Gym G GROUP BY H.HotelId, G.GymName");
            
            echo "<br>Retrieved data from table:<br>";
            echo "<table>";
            echo "<tr><th>HotelId</th><th>GymName</th></tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row["HOTELID"] . "</td><td>" . $row["GYMNAME"] . "</td></tr>"; //or just use "echo $row[0]" 
            }
            echo "</table>";
            
            OCICommit($db_conn);
        }


        function handleAgg2Request() {
            global $db_conn;

            $result = executePlainSQL("SELECT HotelId, Min(MaxCapacity) FROM Gym GROUP BY HotelId HAVING Min(MaxCapacity) > 20");
            
            echo "<br>Retrieved data from table:<br>";
            echo "<table>";
            echo "<tr><th>HotelId</th><th>MinMaxCapacity</th></tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row["HOTELID"] . "</td><td>" . $row["MIN(MAXCAPACITY)"] . "</td></tr>"; //or just use "echo $row[0]" 
            }
            echo "</table>";
            
            OCICommit($db_conn);
        }

        function handleAgg3Request() {
            global $db_conn;

            $result = executePlainSQL("SELECT H.HotelId, H.Name, H.Phone FROM Hotel H GROUP BY H.HotelId, H.Name, H.Phone HAVING 200 >= (SELECT AVG(B.Price) FROM Books B WHERE H.HotelId = B.HotelId)");
            
            echo "<br>Retrieved data from table:<br>";
            echo "<table>";
            echo "<tr><th>HotelId</th><th>HotelName</th><th>Phone</th></tr>";

            while ($row = OCI_Fetch_Array($result, OCI_BOTH)) {
                echo "<tr><td>" . $row["HOTELID"] . "</td><td>" . $row["NAME"] . "</td><td>" . $row["PHONE"] . "</td></tr>"; //or just use "echo $row[0]" 
            }
            echo "</table>";
            
            OCICommit($db_conn);
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
                } else if (array_key_exists('insertRequest', $_POST)) {
                    handleInsertHotelRequest();
                } else if (array_key_exists('deleteQueryRequest', $_POST)) {
                    handleDeleteRequest();
                } else if (array_key_exists('insertQueryRequest', $_POST)) {
                    handleCreateMockDataRequest();
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
                } else if (array_key_exists('displayOutput', $_GET)) {
                    handleDisplayOutputReq();
                } else if (array_key_exists('projectionRequest', $_GET)) {
                    handleProjectionRequest();
                } else if (array_key_exists('divisionRequest', $_GET)) {
                    handleDivisionRequest();
                } else if (array_key_exists('joinRequest', $_GET)) {
                    handleJoinRequest();
                } else if (array_key_exists('selectRequest', $_GET)) {
                    handleSelectRequest();
                } else if (array_key_exists('agg1Request', $_GET)) {
                    handleAgg1Request();
                } else if (array_key_exists('agg2Request', $_GET)) {
                    handleAgg2Request();
                } else if (array_key_exists('agg3Request', $_GET)) {
                    handleAgg3Request();
                }

                disconnectFromDB();
            }
        }

        if (isset($_POST['reset']) || isset($_POST['updateSubmit']) || isset($_POST['insertSubmit']) || isset($_POST['insertRequest']) || isset($_POST['updateQueryRequest']) || isset($_POST['deleteQueryRequest']) || isset($_POST['insertQueryRequest'])) {
            handlePOSTRequest();
        } else if (isset($_GET['countTupleRequest']) || isset($_GET['displayOutputRequest']) || isset($_GET['projectionRequest']) || isset($_GET['divisionRequest']) || isset($_GET['joinRequest']) || isset($_GET['selectRequest']) || isset($_GET['agg1Request']) || isset($_GET['agg2Request']) || isset($_GET['agg3Request'])) {
            handleGETRequest();
        }
		?>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	</body>
</html>

