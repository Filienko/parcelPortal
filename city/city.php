<?php require_once('config.php');?>
<!-- Assignment 4 Template -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Investment Opportunities</title>
        <!-- add a reference to the external stylesheet -->
        <link rel="stylesheet" href="https://bootswatch.com/4/solar/bootstrap.min.css">
    </head>
    <body>
        <!-- START -- Add HTML code for the top menu section (navigation bar) -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark"> 
            <a class="navbar-brand" href="#">Navbar</a> 
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria- 
                    controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation"> 
                <span class="navbar-toggler-icon"></span> 
            </button> 

            <div class="collapse navbar-collapse" id="navbarColor02"> 
                <ul class="navbar-nav mr-auto"> 
                </li> 
                    <li class="nav-item"> 
                        <a class="nav-link active" href="employee.php">Invest</a> 
                    </li> 
                    <li class="nav-item"> 
                        <a class="nav-link" href="department.php">Evaluate your House</a> 
                    </li> 
                    <li class="nav-item"> 
                        <a class="nav-link" href="project.php">Buy new House</a> 
                    </li> 
                    <li class="nav-item"> 
                        <a class="nav-link" href="project.php">City Staff</a> 
                    </li> 
                   <!-- <li class="nav-item dropdown"> 
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria- 
                           haspopup="true" aria-expanded="false">Dropdown</a> 
                        <div class="dropdown-menu"> 
                            <a class="dropdown-item" href="#">Action</a> 
                            <a class="dropdown-item" href="#">Another action</a> 
                            <a class="dropdown-item" href="#">Something else here</a> 
                            <div class="dropdown-divider"></div> 
                            <a class="dropdown-item" href="#">Separated link</a> 
                        </div> 
                    </li> -->
                </ul> 
                <form class="form-inline my-2 my-lg-0"> 
                    <input class="form-control mr-sm-2" type="text" placeholder="Search"> 
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button> 
                </form> 
            </div> 
        </nav>
        <!-- END -- Add HTML code for the top menu section (navigation bar) -->
        <div class="jumbotron"> 
            <p class="lead">You can use this website to execute SQL queries on COMPANY Database <p> 
            <hr class="my-4"> 
            <form method="GET" action="city.php"> 
                <select name="emp" onchange='this.form.submit()'> 
                    <option selected>Select a name</option> 

                    <?php 
                    //Saving the connection through a set of global variables from config file
                    //establishing the credentials and testuser name necessery for connecting to the DB hosted on VM
                    //if mistake is found in connection process, the connection is not continued
                    $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME); 
                    if ( mysqli_connect_errno() )  
                    { 
                        die( mysqli_connect_error() );   
                    } 
                    $sql = "select Lname, Fname, SSN from EMPLOYEE"; 
                    //Saving the location of the project after the sql statement through storing it in a row variable
                    // where $ is analogous to a var keyword from JS in php-->

                    if ($result = mysqli_query($connection, $sql))  
                    { 
                        //Stores query results as part of a row variable
                        // loop through the data 
                        while($row = mysqli_fetch_assoc($result)) 
                        { 
                            echo '<option value="' . $row['SSN'] . '">'; 
                            echo $row['Lname']. ', '. $row['Fname'];  
                            echo "</option>"; 
                        } 
                        // release the memory used by the result set 
                        mysqli_free_result($result);  
                    }  
                    ?>  
                </select> 
                <?php 
                if ($_SERVER["REQUEST_METHOD"] == "GET")  
                { 
                    if (isset($_GET['emp']) )  
                    { 
                ?> 
                <p>&nbsp;</p> 
                <table class="table table-hover"> 
                    <thead> 
                        <tr class="table-success"> 
                            <th scope="col">Last Name</th> 
                            <th scope="col">First Name</th> 
                            <th scope="col">Social Security #</th> 
                            <th scope="col">Salary</th> 
                            <th scope="col">Birth Date</th> 
                            <th scope="col">Department</th> 
                        </tr> 
                    </thead> 
                    <?php            
                        if ( mysqli_connect_errno() )  
                        { 
                            die( mysqli_connect_error() );   
                        } 
                        $sql = "  SELECT *  
                            FROM EMPLOYEE, DEPARTMENT  
                            WHERE SSN = {$_GET['emp']} AND     
                                  EMPLOYEE.Dno = DEPARTMENT.Dnumber"; 

                        if ($result = mysqli_query($connection, $sql))  
                        { 
                            while($row = mysqli_fetch_assoc($result)) 
                            { 
                    ?> 
                    <tr> 
                        <td><?php echo $row['Lname'] ?></td> 
                        <td><?php echo $row['Fname'] ?></td> 
                        <td><?php echo $row['Ssn'] ?></td> 
                        <td><?php echo $row['Salary'] ?></td> 
                        <td><?php echo $row['Bdate'] ?></td> 
                        <td><?php echo $row['Dname'] ?></td> 
                    </tr> 
                    <?php 
                            } 
                            // release the memory used by the result set 
                            mysqli_free_result($result);  
                        }  
                    } // end if (isset) 
                } // end if ($_SERVER) 
                    ?> 
                </table> 
            </form> 
        </div>
    </body>
</html>
