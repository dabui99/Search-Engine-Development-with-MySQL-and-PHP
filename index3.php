<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </head>

    <body>

        <div class="container">
            <h1 style="text-align:center"> CS460 Project</h1><br>
            <h3 style="text-align:center"> Project 1 </h3><br>
        </div>
        
        <div class = "container">
        For better search, please specify query *: X and Y (if needed parameters, else just specify query *)
        <br>
            <form id="ageLimitForm" method="post" action="">
                <button class="btn btn-outline-secondary" type="submit" name="submitted2" id="button-addon2">View All Motion Picture</button>
                <button class="btn btn-outline-secondary" type="submit" name="submitted3" id="button-addon2">View All Actors</button>
                <button class="btn btn-outline-secondary" type="submit" name="submitted4" id="button-addon2">View All Award</button>
                <button class="btn btn-outline-secondary" type="submit" name="submitted5" id="button-addon2">View All Genre</button>
                <button class="btn btn-outline-secondary" type="submit" name="submitted6" id="button-addon2">View All Likes</button>
                <button class="btn btn-outline-secondary" type="submit" name="submitted7" id="button-addon2">View All Location</button>
                <button class="btn btn-outline-secondary" type="submit" name="submitted8" id="button-addon2">View All Movies</button>
                <button class="btn btn-outline-secondary" type="submit" name="submitted9" id="button-addon2">View All Series</button>
                <button class="btn btn-outline-secondary" type="submit" name="submitted10" id="button-addon2">View All Role</button>
                <button class="btn btn-outline-secondary" type="submit" name="submitted11" id="button-addon2">View All User</button>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Query *: X..." name="input" id="input">
                    <input type="text" class="form-control" placeholder="Y..." name="input2" id="input">
                    <button class="btn btn-outline-secondary" type="submit" name="submitted12" id="button-addon2">Query</button>
                </div>
            </form>
        </div>

        <div class="container">
            <?php
                if(isset($_POST['submitted2']))
                {
                    echo "<table class='table table-md table-bordered'>";
                    echo "<thead class='thead-dark' style='text-align: center'>";
                    echo "<tr>
                    <th class='col-md-2'>ID</th>
                    <th class='col-md-2'>Name</th>
                    <th class='col-md-2'>Rating</th>
                    <th class='col-md-2'>Production</th>
                    <th class='col-md-2'>Budget</th>                   
                    </tr></thead>";

                    class TableRows extends RecursiveIteratorIterator {
                        function __construct($it) {
                            parent::__construct($it, self::LEAVES_ONLY);
                        }

                        function current() {
                            // return "<td style='width: 30px; border: 1px solid black;'>" . parent::current(). "</td>";
                            return "<td style='text-align:center'>" . parent::current(). "</td>";
                        }

                        function beginChildren() {
                            echo "<tr>";
                        }

                        function endChildren() {
                            echo "</tr>" . "\n";
                        }
                    }

                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "cs460_project1";

                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // SQL
                        $stmt = $conn->prepare("SELECT * FROM MotionPicture");
                        $stmt->execute();

                        // set the resulting array to associative
                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                            echo $v;
                        }
                        
                    }
                    catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                    $conn = null;
                    echo "</table>";
                }
                elseif (isset($_POST['submitted3'])) 
                {
                    echo "<table class='table table-md table-bordered'>";
                    echo "<thead class='thead-dark' style='text-align: center'>";
                    echo "<tr>
                    <th class='col-md-2'>ID</th>
                    <th class='col-md-2'>Name</th>
                    <th class='col-md-2'>Nationality</th>
                    <th class='col-md-2'>Date of Birth</th>
                    <th class='col-md-2'>Gender</th>
                    </tr></thead>";

                    class TableRows extends RecursiveIteratorIterator {
                        function __construct($it) {
                            parent::__construct($it, self::LEAVES_ONLY);
                        }

                        function current() {
                            // return "<td style='width: 30px; border: 1px solid black;'>" . parent::current(). "</td>";
                            return "<td style='text-align:center'>" . parent::current(). "</td>";
                        }

                        function beginChildren() {
                            echo "<tr>";
                        }

                        function endChildren() {
                            echo "</tr>" . "\n";
                        }
                    }

                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "cs460_project1";

                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // SQL
                        $stmt = $conn->prepare("SELECT * FROM People");
                        
                        $stmt->execute();
          
                        // set the resulting array to associative
                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                            echo $v;
                        }
                    }
                    catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                    $conn = null;
                    echo "</table>";
                }
                elseif (isset($_POST['submitted4'])) 
                {
                    echo "<table class='table table-md table-bordered'>";
                    echo "<thead class='thead-dark' style='text-align: center'>";
                    echo "<tr>
                    <th class='col-md-2'>mpid</th>
                    <th class='col-md-2'>pid</th>
                    <th class='col-md-2'>award name</th>
                    <th class='col-md-2'>award year</th>
                    </tr></thead>";

                    class TableRows extends RecursiveIteratorIterator {
                        function __construct($it) {
                            parent::__construct($it, self::LEAVES_ONLY);
                        }

                        function current() {
                            // return "<td style='width: 30px; border: 1px solid black;'>" . parent::current(). "</td>";
                            return "<td style='text-align:center'>" . parent::current(). "</td>";
                        }

                        function beginChildren() {
                            echo "<tr>";
                        }

                        function endChildren() {
                            echo "</tr>" . "\n";
                        }
                    }

                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "cs460_project1";

                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // SQL
                        $stmt = $conn->prepare("SELECT * FROM Award");
                        
                        $stmt->execute();
          
                        // set the resulting array to associative
                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                            echo $v;
                        }
                    }
                    catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                    $conn = null;
                    echo "</table>";
                }
                elseif (isset($_POST['submitted5'])) 
                {
                    echo "<table class='table table-md table-bordered'>";
                    echo "<thead class='thead-dark' style='text-align: center'>";
                    echo "<tr>
                    <th class='col-md-2'>mpid</th>
                    <th class='col-md-2'>Genre</th>
                    
                    </tr></thead>";

                    class TableRows extends RecursiveIteratorIterator {
                        function __construct($it) {
                            parent::__construct($it, self::LEAVES_ONLY);
                        }

                        function current() {
                            // return "<td style='width: 30px; border: 1px solid black;'>" . parent::current(). "</td>";
                            return "<td style='text-align:center'>" . parent::current(). "</td>";
                        }

                        function beginChildren() {
                            echo "<tr>";
                        }

                        function endChildren() {
                            echo "</tr>" . "\n";
                        }
                    }

                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "cs460_project1";

                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // SQL
                        $stmt = $conn->prepare("SELECT * FROM Genre");
                        
                        $stmt->execute();
          
                        // set the resulting array to associative
                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                            echo $v;
                        }
                    }
                    catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                    $conn = null;
                    echo "</table>";
                }
                elseif (isset($_POST['submitted6'])) 
                {
                    echo "<table class='table table-md table-bordered'>";
                    echo "<thead class='thead-dark' style='text-align: center'>";
                    echo "<tr>
                    <th class='col-md-2'>mpid</th>
                    <th class='col-md-2'>Email</th>
                    
                    </tr></thead>";

                    class TableRows extends RecursiveIteratorIterator {
                        function __construct($it) {
                            parent::__construct($it, self::LEAVES_ONLY);
                        }

                        function current() {
                            // return "<td style='width: 30px; border: 1px solid black;'>" . parent::current(). "</td>";
                            return "<td style='text-align:center'>" . parent::current(). "</td>";
                        }

                        function beginChildren() {
                            echo "<tr>";
                        }

                        function endChildren() {
                            echo "</tr>" . "\n";
                        }
                    }

                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "cs460_project1";

                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // SQL
                        $stmt = $conn->prepare("SELECT * FROM Likes");
                        
                        $stmt->execute();
          
                        // set the resulting array to associative
                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                            echo $v;
                        }
                    }
                    catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                    $conn = null;
                    echo "</table>";
                }
                elseif (isset($_POST['submitted7'])) 
                {
                    echo "<table class='table table-md table-bordered'>";
                    echo "<thead class='thead-dark' style='text-align: center'>";
                    echo "<tr>
                    <th class='col-md-2'>mpid</th>
                    <th class='col-md-2'>zip</th>
                    <th class='col-md-2'>City</th>
                    <th class='col-md-2'>Country</th>
                    </tr></thead>";

                    class TableRows extends RecursiveIteratorIterator {
                        function __construct($it) {
                            parent::__construct($it, self::LEAVES_ONLY);
                        }

                        function current() {
                            // return "<td style='width: 30px; border: 1px solid black;'>" . parent::current(). "</td>";
                            return "<td style='text-align:center'>" . parent::current(). "</td>";
                        }

                        function beginChildren() {
                            echo "<tr>";
                        }

                        function endChildren() {
                            echo "</tr>" . "\n";
                        }
                    }

                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "cs460_project1";

                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // SQL
                        $stmt = $conn->prepare("SELECT * FROM Location");
                        
                        $stmt->execute();
          
                        // set the resulting array to associative
                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                            echo $v;
                        }
                    }
                    catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                    $conn = null;
                    echo "</table>";
                }
                elseif (isset($_POST['submitted8'])) 
                {
                    echo "<table class='table table-md table-bordered'>";
                    echo "<thead class='thead-dark' style='text-align: center'>";
                    echo "<tr>
                    <th class='col-md-2'>mpid</th>
                    <th class='col-md-2'>Boxoffice Location</th>
                    
                    </tr></thead>";

                    class TableRows extends RecursiveIteratorIterator {
                        function __construct($it) {
                            parent::__construct($it, self::LEAVES_ONLY);
                        }

                        function current() {
                            // return "<td style='width: 30px; border: 1px solid black;'>" . parent::current(). "</td>";
                            return "<td style='text-align:center'>" . parent::current(). "</td>";
                        }

                        function beginChildren() {
                            echo "<tr>";
                        }

                        function endChildren() {
                            echo "</tr>" . "\n";
                        }
                    }

                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "cs460_project1";

                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // SQL
                        $stmt = $conn->prepare("SELECT * FROM movie");
                        
                        $stmt->execute();
          
                        // set the resulting array to associative
                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                            echo $v;
                        }
                    }
                    catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                    $conn = null;
                    echo "</table>";
                }
                elseif (isset($_POST['submitted9'])) 
                {
                    echo "<table class='table table-md table-bordered'>";
                    echo "<thead class='thead-dark' style='text-align: center'>";
                    echo "<tr>
                    <th class='col-md-2'>mpid</th>
                    <th class='col-md-2'>Number of Season</th>
                    
                    </tr></thead>";

                    class TableRows extends RecursiveIteratorIterator {
                        function __construct($it) {
                            parent::__construct($it, self::LEAVES_ONLY);
                        }

                        function current() {
                            // return "<td style='width: 30px; border: 1px solid black;'>" . parent::current(). "</td>";
                            return "<td style='text-align:center'>" . parent::current(). "</td>";
                        }

                        function beginChildren() {
                            echo "<tr>";
                        }

                        function endChildren() {
                            echo "</tr>" . "\n";
                        }
                    }

                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "cs460_project1";

                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // SQL
                        $stmt = $conn->prepare("SELECT * FROM Series");
                        
                        $stmt->execute();
          
                        // set the resulting array to associative
                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                            echo $v;
                        }
                    }
                    catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                    $conn = null;
                    echo "</table>";
                }
                elseif (isset($_POST['submitted10'])) 
                {
                    echo "<table class='table table-md table-bordered'>";
                    echo "<thead class='thead-dark' style='text-align: center'>";
                    echo "<tr>
                    <th class='col-md-2'>mpid</th>
                    <th class='col-md-2'>pid</th>
                    <th class='col-md-2'>Role name</th>
                    
                    </tr></thead>";

                    class TableRows extends RecursiveIteratorIterator {
                        function __construct($it) {
                            parent::__construct($it, self::LEAVES_ONLY);
                        }

                        function current() {
                            // return "<td style='width: 30px; border: 1px solid black;'>" . parent::current(). "</td>";
                            return "<td style='text-align:center'>" . parent::current(). "</td>";
                        }

                        function beginChildren() {
                            echo "<tr>";
                        }

                        function endChildren() {
                            echo "</tr>" . "\n";
                        }
                    }

                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "cs460_project1";

                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // SQL
                        $stmt = $conn->prepare("SELECT * FROM Role");
                        
                        $stmt->execute();
          
                        // set the resulting array to associative
                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                            echo $v;
                        }
                    }
                    catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                    $conn = null;
                    echo "</table>";
                }
                elseif (isset($_POST['submitted11'])) 
                {
                    echo "<table class='table table-md table-bordered'>";
                    echo "<thead class='thead-dark' style='text-align: center'>";
                    echo "<tr>
                    <th class='col-md-2'>Email</th>
                    <th class='col-md-2'>Name</th>
                    <th class='col-md-2'>Age</th>
                   
                    </tr></thead>";

                    class TableRows extends RecursiveIteratorIterator {
                        function __construct($it) {
                            parent::__construct($it, self::LEAVES_ONLY);
                        }

                        function current() {
                            // return "<td style='width: 30px; border: 1px solid black;'>" . parent::current(). "</td>";
                            return "<td style='text-align:center'>" . parent::current(). "</td>";
                        }

                        function beginChildren() {
                            echo "<tr>";
                        }

                        function endChildren() {
                            echo "</tr>" . "\n";
                        }
                    }

                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "cs460_project1";

                    try {
                        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                        // SQL
                        $stmt = $conn->prepare("SELECT * FROM User");
                        
                        $stmt->execute();
          
                        // set the resulting array to associative
                        $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                            echo $v;
                        }
                    }
                    catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                    $conn = null;
                    echo "</table>";
                }
                elseif (isset($_POST['submitted12'])){

                
                    $input = $_POST["input"]; 
                    $input2= $_POST["input2"];
                    
                    class TableRows extends RecursiveIteratorIterator {
                        function __construct($it) {
                            parent::__construct($it, self::LEAVES_ONLY);
                        }

                        function current() {
                            // return "<td style='width: 30px; border: 1px solid black;'>" . parent::current(). "</td>";
                            return "<td style='text-align:center'>" . parent::current(). "</td>";
                        }

                        function beginChildren() {
                            echo "<tr>";
                        }

                        function endChildren() {
                            echo "</tr>" . "\n";
                        }
                    }

                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "cs460_project1";

                    try {
                        if (substr(strtolower($input),0,7)=="query 2"){
                            $input2 = substr($input,9);
                            echo "<table class='table table-md table-bordered'>";
                            echo "<thead class='thead-dark' style='text-align: center'>";
                            echo "<tr>
                            <th class='col-md-2'>Show Name</th>
                            <th class='col-md-2'>Rating</th>
                            <th class='col-md-2'>Production</th>
                            <th class='col-md-2'>Budget</th>
                            </tr></thead>";
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // SQL
                            $stmt = $conn->prepare("SELECT name, rating, production, budget
                            FROM MotionPicture
                            WHERE name LIKE  '%".$input2."%' 
                            ");
                            $stmt->execute();

                            // set the resulting array to associative
                            $stmt->setFetchMode(PDO::FETCH_ASSOC);
                            foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                                echo $v;
                            }
                        }
                        elseif (substr(strtolower($input),0,7)=="query 3"){
                            $input2 = substr($input,9);
                            echo "<table class='table table-md table-bordered'>";
                            echo "<thead class='thead-dark' style='text-align: center'>";
                            echo "<tr>
                            <th class='col-md-2'>Name</th>
                            <th class='col-md-2'>Rating</th>
                            <th class='col-md-2'>Production</th>
                            <th class='col-md-2'>Budget</th>
                            
                            </tr></thead>";
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // SQL
                            $stmt = $conn->prepare("SELECT mp.name, mp.rating, mp.production, mp.budget
                            FROM Likes as l
                            INNER JOIN MotionPicture as mp ON l.mpid=mp.id
                            WHERE l.uemail LIKE  '%".$input2."%'         
                            ");
                            $stmt->execute();

                            // set the resulting array to associative
                            $stmt->setFetchMode(PDO::FETCH_ASSOC);
                            foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                                echo $v;
                            }
                        }
                        elseif (substr(strtolower($input),0,7)=="query 4"){
                            $input2 = substr($input,9);
                            echo "<table class='table table-md table-bordered'>";
                            echo "<thead class='thead-dark' style='text-align: center'>";
                            echo "<tr>
                            <th class='col-md-2'>Show Name</th>
                            
                            </tr></thead>";
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // SQL
                            $stmt = $conn->prepare("SELECT DISTINCT mp.name 
                            FROM Location as l
                            INNER JOIN MotionPicture AS mp on mp.id=l.mpid
                            WHERE l.country LIKE '%".$input2."%'
                            ");
                            $stmt->execute();

                            // set the resulting array to associative
                            $stmt->setFetchMode(PDO::FETCH_ASSOC);
                            foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                                echo $v;
                            }
                        }
                        elseif (substr(strtolower($input),0,7)=="query 5"){
                            $input2 = substr($input,9);
                            echo "<table class='table table-md table-bordered'>";
                            echo "<thead class='thead-dark' style='text-align: center'>";
                            echo "<tr>
                            <th class='col-md-2'>Director Name</th>
                            <th class='col-md-2'>TV Series Name</th>
                            
                            </tr></thead>";
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // SQL
                            $stmt = $conn->prepare("SELECT p.pname,mp.name
                            FROM Location as l
                            INNER JOIN Series AS s ON s.mpid=l.mpid
                            INNER JOIN MotionPicture AS mp ON mp.id=s.mpid
                            INNER JOIN Role AS r ON r.mpid=mp.id
                            INNER JOIN People AS p ON p.id=r.pid
                           
                            WHERE l.zip=$input2 AND r.role_name='Director'
                            ");
                            $stmt->execute();

                            // set the resulting array to associative
                            $stmt->setFetchMode(PDO::FETCH_ASSOC);
                            foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                                echo $v;
                            }     
                        }
                        elseif (substr(strtolower($input),0,7)=="query 6"){
                            $input2 = substr($input,9);
                            echo "<table class='table table-md table-bordered'>";
                            echo "<thead class='thead-dark' style='text-align: center'>";
                            echo "<tr>
                            <th class='col-md-2'>Name</th>
                            <th class='col-md-2'>Show Name</th>
                            <th class='col-md-2'>Award Year</th>
                            <th class='col-md-2'>Award Count</th>
                            </tr></thead>";
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // SQL
                            $stmt = $conn->prepare("SELECT mp.name, p.pname, a.award_year, COUNT(pid) 
                            FROM Award as a
                            INNER JOIN MotionPicture AS mp ON mp.id=a.mpid
                            INNER JOIN People AS p ON p.id=a.pid
                            GROUP BY mpid, pid, award_year
                            HAVING COUNT(pid) >  $input2");
                            $stmt->execute();

                            // set the resulting array to associative
                            $stmt->setFetchMode(PDO::FETCH_ASSOC);
                            foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                                echo $v;
                            }     
                        }
                        elseif (substr(strtolower($input),0,7)=="query 7"){
                            
                            echo "<table class='table table-md table-bordered'>";
                            echo "<thead class='thead-dark' style='text-align: center'>";
                            echo "<tr>
                            <th class='col-md-2'>Name</th>
                            <th class='col-md-2'>Age</th>
                            
                            </tr></thead>";
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // SQL
                            $stmt = $conn->prepare("SELECT DISTINCT p.pname, a.award_year-YEAR(dob) as age
                            FROM Award as a 
                            INNER JOIN People AS p ON a.pid=p.id
                            INNER JOIN Role AS r ON r.pid=p.id
                            WHERE r.role_name='Actor'
                                AND a.award_year-YEAR(dob)= 
                                    (
                                    SELECT MIN(a.award_year-YEAR(dob))
                                    FROM Award as a 
                                    INNER JOIN People AS p ON a.pid=p.id
                                    INNER JOIN Role AS r ON r.pid=p.id
                                    WHERE r.role_name='Actor')
                                    
                            UNION
                            SELECT DISTINCT p.pname, a.award_year-YEAR(dob) as age
                            FROM Award as a 
                            INNER JOIN People AS p ON a.pid=p.id
                            INNER JOIN Role AS r ON r.pid=p.id
                            WHERE r.role_name='Actor'
                                AND a.award_year-YEAR(dob)= 
                                    (
                                    SELECT MAX(a.award_year-YEAR(dob))
                                    FROM Award as a 
                                    INNER JOIN People AS p ON a.pid=p.id
                                    INNER JOIN Role AS r ON r.pid=p.id
                                    WHERE r.role_name='Actor')");
                            $stmt->execute();

                            // set the resulting array to associative
                            $stmt->setFetchMode(PDO::FETCH_ASSOC);
                            foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                                echo $v;
                            }     
                        }
                        elseif (substr(strtolower($input),0,7)=="query 8"){
                            $input3 = substr($input,9);
                            
                            echo "<table class='table table-md table-bordered'>";
                            echo "<thead class='thead-dark' style='text-align: center'>";
                            echo "<tr>
                            <th class='col-md-2'>Director Name</th>
                            <th class='col-md-2'>Show Name</th>
                            <th class='col-md-2'>Boxoffice Collection</th>
                            <th class='col-md-2'>Budget</th>
                            </tr></thead>";
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // SQL
                            $stmt = $conn->prepare("SELECT p.pname,mp.name,m.boxoffice_collection,mp.budget 
                            FROM Role AS r
                            INNER JOIN movie AS m ON m.mpid=r.mpid
                            INNER JOIN People AS p ON p.id=r.pid
                            INNER JOIN MotionPicture AS mp ON mp.id=r.mpid
                            WHERE p.nationality='USA' 
                                AND r.role_name='Director'
                            HAVING m.boxoffice_collection >= $input3 AND mp.budget <= $input2
                            ");
                            $stmt->execute();

                            // set the resulting array to associative
                            $stmt->setFetchMode(PDO::FETCH_ASSOC);
                            foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                                echo $v;
                            }     
                        }
                        elseif (substr(strtolower($input),0,7)=="query 9"){
                            $input3 = substr($input,9);
                            echo "<table class='table table-md table-bordered'>";
                            echo "<thead class='thead-dark' style='text-align: center'>";
                            echo "<tr>
                            <th class='col-md-2'>Person's Name</th>
                            <th class='col-md-2'>Show Name</th>
                            <th class='col-md-2'>Role Count</th>
                            
                            </tr></thead>";
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // SQL
                            $stmt = $conn->prepare("SELECT  p.pname, mp.name, count(pid) AS count
                            FROM Role AS r
                            INNER JOIN MotionPicture AS mp ON mp.id=r.mpid
                            INNER JOIN People AS p ON p.id=r.pid
                            WHERE mp.rating > $input3
                            GROUP BY mpid, pid
                            HAVING COUNT(pid)>1");
                            $stmt->execute();

                            // set the resulting array to associative
                            $stmt->setFetchMode(PDO::FETCH_ASSOC);
                            foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                                echo $v;
                            }     
                        }
                        elseif (substr(strtolower($input),0,8)=="query 10"){
                            
                            echo "<table class='table table-md table-bordered'>";
                            echo "<thead class='thead-dark' style='text-align: center'>";
                            echo "<tr>
                            <th class='col-md-2'>Movie</th>
                            <th class='col-md-2'>Rating</th>
                            
                            </tr></thead>";
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // SQL
                            $stmt = $conn->prepare("SELECT DISTINCT mp.name, mp.rating
                            FROM Genre AS g
                            INNER JOIN Location AS l on g.mpid=l.mpid
                            INNER JOIN MotionPicture AS mp ON mp.id=g.mpid
                            INNER JOIN movie AS m ON m.mpid=mp.id
                            WHERE g.genre_name='Thriller' AND l.city='Boston' 
                            ORDER BY mp.rating DESC LIMIT 2
                            ");
                            $stmt->execute();

                            // set the resulting array to associative
                            $stmt->setFetchMode(PDO::FETCH_ASSOC);
                            foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                                echo $v;
                            }     
                        }
                        elseif (substr(strtolower($input),0,8)=="query 11"){
                            $input3 = substr($input,10);
                            echo "<table class='table table-md table-bordered'>";
                            echo "<thead class='thead-dark' style='text-align: center'>";
                            echo "<tr>
                            <th class='col-md-2'>Movie</th>
                            
                            <th class='col-md-2'>Age</th>
                            
                            </tr></thead>";
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // SQL
                            $stmt = $conn->prepare("SELECT mp.name, u.age
                            FROM Likes AS l 
                            INNER JOIN User AS u ON u.email=l.uemail
                            INNER JOIN MotionPicture AS mp ON mp.id=l.mpid
                            WHERE u.age<$input2
                            GROUP BY mpid
                            HAVING COUNT(mpid) > $input3");
                            $stmt->execute();

                            // set the resulting array to associative
                            $stmt->setFetchMode(PDO::FETCH_ASSOC);
                            foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                                echo $v;
                            }     
                        }
                        elseif (substr(strtolower($input),0,8)=="query 12"){
                            
                            echo "<table class='table table-md table-bordered'>";
                            echo "<thead class='thead-dark' style='text-align: center'>";
                            echo "<tr>
                            <th class='col-md-2'>Movie</th>
                            
                            <th class='col-md-2'>Age</th>
                            
                            </tr></thead>";
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // SQL
                            $stmt = $conn->prepare("SELECT p.pname, mp.name
                            FROM MotionPicture AS mp 
                            INNER JOIN Role AS r ON r.mpid=mp.id 
                            INNER JOIN People AS p ON p.id=r.pid 
                            WHERE r.role_name='Actor'AND p.id = (
                                        SELECT p.id
                                        FROM MotionPicture AS mp 
                                        INNER JOIN Role AS r ON r.mpid=mp.id 
                                        INNER JOIN People AS p ON p.id=r.pid 
                                        WHERE mp.production='Warner Bros' 
                                            AND p.id IN (SELECT p.id
                                                        FROM MotionPicture AS mp 
                                                        INNER JOIN Role AS r ON r.mpid=mp.id 
                                                        INNER JOIN People AS p ON p.id=r.pid 
                                                        WHERE mp.production='Marvel')
                                        )");
                            $stmt->execute();

                            // set the resulting array to associative
                            $stmt->setFetchMode(PDO::FETCH_ASSOC);
                            foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                                echo $v;
                            }     
                        }
                        elseif (substr(strtolower($input),0,8)=="query 13"){
                            
                            echo "<table class='table table-md table-bordered'>";
                            echo "<thead class='thead-dark' style='text-align: center'>";
                            echo "<tr>
                            <th class='col-md-2'>Movie</th>
                            
                            <th class='col-md-2'>Age</th>
                            
                            </tr></thead>";
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // SQL
                            $stmt = $conn->prepare("SELECT mp.name, mp.rating
                            FROM MotionPicture as mp
                            INNER JOIN Genre AS g ON g.mpid=mp.id
                            WHERE mp.rating > (SELECT avg(mp.rating) 
                                                 FROM MotionPicture AS mp 
                                                 INNER JOIN Genre AS g ON g.mpid=mp.id
                                                 WHERE g.genre_name='Comedy')
                            ORDER BY mp.rating DESC");
                            $stmt->execute();

                            // set the resulting array to associative
                            $stmt->setFetchMode(PDO::FETCH_ASSOC);
                            foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                                echo $v;
                            }     
                        }
                        elseif (substr(strtolower($input),0,8)=="query 14"){
                            
                            echo "<table class='table table-md table-bordered'>";
                            echo "<thead class='thead-dark' style='text-align: center'>";
                            echo "<tr>
                            <th class='col-md-2'>Show Name</th>
                            <th class='col-md-2'>People Count</th>
                            <th class='col-md-2'>Role Count</th>
                            
                            </tr></thead>";
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // SQL
                            $stmt = $conn->prepare("SELECT mp.name, COUNT(r.mpid), COUNT(DISTINCT r.role_name)
                            FROM Role AS r 
                            INNER JOIN MotionPicture AS mp ON mp.id=r.mpid
                            GROUP BY r.mpid
                            HAVING COUNT(r.mpid)
                            ORDER BY COUNT(r.mpid) DESC LIMIT 5
                                        ");
                            $stmt->execute();

                            // set the resulting array to associative
                            $stmt->setFetchMode(PDO::FETCH_ASSOC);
                            foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                                echo $v;
                            }     
                        }
                        elseif (substr(strtolower($input),0,8)=="query 15"){
                            
                            echo "<table class='table table-md table-bordered'>";
                            echo "<thead class='thead-dark' style='text-align: center'>";
                            echo "<tr>
                            <th class='col-md-2'>Person 1</th>
                            <th class='col-md-2'>Person 2</th>
                            
                            
                            </tr></thead>";
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // SQL
                            $stmt = $conn->prepare("SELECT DISTINCT p1.pname AS p1, p2.pname AS p2
                            FROM People AS p1
                            INNER JOIN People AS p2
                            ON p1.dob=p2.dob AND p1.id>p2.id
                            INNER JOIN Role AS r
                            ON r.pid=p1.id
                            WHERE r.role_name='Actor' ");
                            $stmt->execute();

                            // set the resulting array to associative
                            $stmt->setFetchMode(PDO::FETCH_ASSOC);
                            foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                                echo $v;
                            }     
                        }
                        else{
                            echo "<table class='table table-md table-bordered'>";
                            echo "<thead class='thead-dark' style='text-align: center'>";
                            echo "<tr>
                            <th class='col-md-2'>Show Name</th>
                            <th class='col-md-2'>Rating</th>
                            <th class='col-md-2'>Production</th>
                            <th class='col-md-2'>Budget</th>
                            <th class='col-md-2'>Actor</th>
                            <th class='col-md-2'>Role</th>
                            </tr></thead>";
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // SQL
                            $stmt = $conn->prepare("SELECT m.name, rating, production, budget, p.pname, r1.role_name 
                            FROM MotionPicture as m 
                            INNER JOIN Role AS r1 ON r1.mpid=m.id 
                            INNER JOIN People AS p ON r1.pid=p.id 
                            WHERE m.name LIKE '%".$input."%' OR p.pname LIKE '%".$input."%' 
                            ORDER BY m.name ASC");
                            $stmt->execute();

                            // set the resulting array to associative
                            $stmt->setFetchMode(PDO::FETCH_ASSOC);
                            foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                                echo $v;
                            }
                        }
                        
                    }
                    catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                    $conn = null;
                    echo "</table>";
                }
                else {
                    echo "unable to search for current input";
                }
                
            ?>
        </div>
    </body>
</html>