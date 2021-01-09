<html>
    <head>
        <title>SignUp</title>
        <link rel="stylesheet" href="style.css">
    </head>
    
    <body>

        <form action="" method="post">
            <label for="firstname">FirstName:</label>
            <input type="text" name="fname" id="firstname" required>
            <br>

            <label for="lastname">LastName:</label>
            <input type="text" name="lname" id="lastname" required>
            <br>

            <label for="dob">DOB:</label>
            <input type="date" name="dob" id="dob" required>
            <br>

            <label for="gender">Gender:</label>
            <input type="text" name="gender" id="gender" required>
            <br>

            <label for="email">Email:</label>
            <input type="text" name="email" id="email" required> 
            <br>

            <label for="pswd">Password:</label>
            <input type="password" name="pswd" id="pswd" required>
            <br>

            <label for="address">Address:</label>
            <input type="text" name="addr" id="address" required>
            <br>

            <label for="rno">Register No:</label>
            <input type="text" name="regno" id="rno" required>
            <br>

            <input type="submit" value="Submit" name="submit">

        </form>

        <?php         

            function displayMessage($bottomMessage) {
                echo  "<h2>$bottomMessage</h2>";
            }

            function performPostRequest($conn) {
                $fname =   $_POST['fname'];
                $lname = $_POST['lname'];
                $dob = $_POST['dob'];
                $gender = $_POST['gender'];
                $email = $_POST['email'];
                $pswd = $_POST['pswd'];
                $addr = $_POST['addr'];
                $regno = $_POST['regno'];

                $query = "INSERT INTO data (FirstName, LastName, DOB, Gender, Email, Password, Address, Register)    
                            VALUES ('$fname','$lname','$dob','$gender','$email','$pswd','$addr','$regno')";

                $checkUserExist_query = "SELECT * FROM data WHERE Email='$email'";
                $checkUserExist_result = mysqli_query($conn, $checkUserExist_query);

                if(mysqli_num_rows($checkUserExist_result) > 0) {
                    displayMessage("User Existed Already!...");
                }
                else{
                     
                    if($conn->query($query) == TRUE){
                        displayMessage("Record Inserted Successfully!....");
                        echo "<a href='login.php' style='text-decoration:none;'>Login </a>";
                    }
                    else{
                        // displayMessage("No Record Entered..");
                    }
                }
            }

            function closeConnection($conn) {
                mysqli_close($conn);
            }


            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpassword = '';
            $dbname = 'assignment';
            $conn = mysqli_connect($dbhost, $dbuser, $dbpassword,$dbname);

            if(! $conn ) {
                die('Could not connect:  '.mysqli_error());
            }

            if(isset($_POST['submit'])){
                performPostRequest($conn);
                closeConnection($conn);
            } 
        ?>
        
    </body>
    
</html>