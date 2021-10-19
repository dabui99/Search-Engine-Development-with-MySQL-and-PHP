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
        For better search, please enter what you want like movie:... , genre:... (for example: movie:adventure time)
            <form id="ageLimitForm" method="post" action="">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search..." name="input" id="input">
                    <button class="btn btn-outline-secondary" type="submit" name="submitted" id="button-addon2">Search</button>
                    <button class="btn btn-outline-secondary" type="submit" name="submitted2" id="button-addon2">View All Films</button>
                    <button class="btn btn-outline-secondary" type="submit" name="submitted3" id="button-addon2">View All Actors</button>
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
                    <th class='col-md-2'>Show Name</th>
                    <th class='col-md-2'>Rating</th>
                    <th class='col-md-2'>Production</th>
                    <th class='col-md-2'>Budget</th>
                    <th class='col-md-2'>Genre</th>
                    <th class='col-md-2'>Actor</th>
                    <th class='col-md-2'>Role</th>
                    
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
                        $stmt = $conn->prepare("SELECT m.name, rating, production, budget, g.genre_name, p.pname, r1.role_name 
                        FROM MotionPicture as m 
                        INNER JOIN Role AS r1 ON r1.mpid=m.id 
                        INNER JOIN People AS p ON r1.pid=p.id 
                        INNER JOIN Genre AS g ON g.mpid=m.id
                        ORDER BY m.name ASC");
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
                        $stmt = $conn->prepare("SELECT pname, nationality, dob, gender FROM People");
                        
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
                elseif (isset($_POST['submitted'])){

                
                    $input = $_POST["input"]; 
                     
                    
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
                        if (substr(strtolower($input),0,5)=="movie"){
                            $input2 = substr($input,6);
                            echo "<table class='table table-md table-bordered'>";
                            echo "<thead class='thead-dark' style='text-align: center'>";
                            echo "<tr>
                            <th class='col-md-2'>Show Name</th>
                            <th class='col-md-2'>Rating</th>
                            <th class='col-md-2'>Production</th>
                            <th class='col-md-2'>Budget</th>
                            <th class='col-md-2'>Actor</th>
                            <th class='col-md-2'>Role</th>
                            <th class='col-md-2'>City</th>
                            <th class='col-md-2'>Zip</th>
                            <th class='col-md-2'>Country</th>
                            </tr></thead>";
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // SQL
                            $stmt = $conn->prepare("SELECT m.name, m.rating, m.production, m.budget, p.pname, r1.role_name, l.city, l.zip,l.country
                            FROM Movie as mo 
                            INNER JOIN MotionPicture AS m ON m.id=mo.mpid
                            INNER JOIN Role AS r1 ON r1.mpid=m.id 
                            INNER JOIN People AS p ON r1.pid=p.id  
                            INNER JOIN Location AS l on l.mpid = m.id
                            WHERE m.name LIKE  '%".$input2."%' 
                            ORDER BY m.name ASC");
                            $stmt->execute();

                            // set the resulting array to associative
                            $stmt->setFetchMode(PDO::FETCH_ASSOC);
                            foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                                echo $v;
                            }
                        }
                        elseif (substr(strtolower($input),0,6)=="series"){
                            $input2 = substr($input,7);
                            echo "<table class='table table-md table-bordered'>";
                            echo "<thead class='thead-dark' style='text-align: center'>";
                            echo "<tr>
                            <th class='col-md-2'>Show Name</th>
                            <th class='col-md-2'>Rating</th>
                            <th class='col-md-2'>Production</th>
                            <th class='col-md-2'>Budget</th>
                            <th class='col-md-2'>Actor</th>
                            <th class='col-md-2'>Role</th>
                            <th class='col-md-2'>City</th>
                            <th class='col-md-2'>Zip</th>
                            <th class='col-md-2'>Country</th>
                            </tr></thead>";
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // SQL
                            $stmt = $conn->prepare("SELECT m.name, m.rating, m.production, m.budget, p.pname, r1.role_name, l.city, l.zip,l.country 
                            FROM Series as s 
                            INNER JOIN MotionPicture AS m ON m.id=s.mpid
                            INNER JOIN Role AS r1 ON r1.mpid=m.id 
                            INNER JOIN People AS p ON r1.pid=p.id
                            INNER JOIN Location AS l on l.mpid = m.id 
                            WHERE m.name LIKE  '%".$input2."%'         
                            ORDER BY m.name ASC");
                            $stmt->execute();

                            // set the resulting array to associative
                            $stmt->setFetchMode(PDO::FETCH_ASSOC);
                            foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                                echo $v;
                            }
                        }
                        elseif (substr(strtolower($input),0,5)=="award"){
                            $input2 = substr($input,6);
                            echo "<table class='table table-md table-bordered'>";
                            echo "<thead class='thead-dark' style='text-align: center'>";
                            echo "<tr>
                            <th class='col-md-2'>Show Name</th>
                            <th class='col-md-2'>Actor</th>
                            <th class='col-md-2'>Award Name</th>
                            <th class='col-md-2'>Award year</th>
                            </tr></thead>";
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // SQL
                            $stmt = $conn->prepare("SELECT m.name, p.pname,a.award_name,a.award_year 
                            FROM Award AS a
                            INNER JOIN MotionPicture AS m ON m.id=a.mpid
                            INNER JOIN People AS p ON p.id=a.pid
                            WHERE a.award_name LIKE '%".$input2."%'
                            ORDER BY m.name ASC");
                            $stmt->execute();

                            // set the resulting array to associative
                            $stmt->setFetchMode(PDO::FETCH_ASSOC);
                            foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                                echo $v;
                            }
                        }
                        elseif (substr(strtolower($input),0,5)=="genre"){
                            $input2 = substr($input,6);
                            echo "<table class='table table-md table-bordered'>";
                            echo "<thead class='thead-dark' style='text-align: center'>";
                            echo "<tr>
                            <th class='col-md-2'>Show Name</th>
                            <th class='col-md-2'>Genre Name</th>
                            
                            </tr></thead>";
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // SQL
                            $stmt = $conn->prepare("SELECT m.name,g.genre_name 
                            FROM MotionPicture AS m
                            INNER JOIN Genre AS g ON m.id=g.mpid
                            WHERE g.genre_name LIKE '%".$input2."%' 
                            ORDER BY m.name ASC");
                            $stmt->execute();

                            // set the resulting array to associative
                            $stmt->setFetchMode(PDO::FETCH_ASSOC);
                            foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                                echo $v;
                            }     
                        }
                        elseif (substr(strtolower($input),0,6)=="people"){
                            $input2 = substr($input,7);
                            echo "<table class='table table-md table-bordered'>";
                            echo "<thead class='thead-dark' style='text-align: center'>";
                            echo "<tr>
                            <th class='col-md-2'>Name</th>
                            <th class='col-md-2'>Country</th>
                            <th class='col-md-2'>Date of Birth</th>
                            <th class='col-md-2'>Gender</th>
                            </tr></thead>";
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                            // SQL
                            $stmt = $conn->prepare("SELECT pname, nationality, dob, gender 
                            FROM People
                            WHERE pname LIKE '%".$input2."%' 
                            ORDER BY pname ASC");
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