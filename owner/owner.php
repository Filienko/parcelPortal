<?php require_once('config.php');?>
<!-- TCSS 445 Project Phase III -->
<!-- Edited by Chloe Duncan -->
<!-- 9 March 2023 -->

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
            <form method="GET" action="owner.php"> 
                <select name="parcel" onchange='this.form.submit()'>
                    <option selected>Select a name</option> 

                    <?php 
                    //Saving the connection through a set of global variables from config file
                    //establishing the credentials and testuser name necessery for connecting to the DB hosted on VM
                    //if mistake is found in connection process, the connection is not continued

                    // Drop Down Menu Query:
                    // As a parcel owner, chose your parcel address (street, city, zip, county) to see tax information.
                    $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME); 
                    if ( mysqli_connect_errno() )  
                    { 
                        die( mysqli_connect_error() );   
                    } 
                    $sql = "select Parcel_ID, Street, City, Zip, County from landparcel";
                    //Saving the location of the project after the sql statement through storing it in a row variable
                    // where $ is analogous to a var keyword from JS in php-->

                    // Result Query From Drop Down Menu Query:
                    // Show relevant tax information from chosen parcel.
                    if ($result = mysqli_query($connection, $sql))  
                    { 
                        //Stores query results as part of a row variable
                        // loop through the data 
                        while($row = mysqli_fetch_assoc($result)) 
                        { 
                            echo '<option value="' . $row['Parcel_ID'] . '">';
                            echo $row['Street']. ' '. $row['City']. ' ' . $row['Zip'] . ' ' . $row['County'] . ', WA';
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
                    if (isset($_GET['parcel']) )
                    { 
                ?> 
                <p>&nbsp;</p> 
                <table class="table table-hover"> 
                    <thead> 
                        <tr class="table-success"> 
                            <th scope="col">Parcel ID</th>
                            <th scope="col">Street</th>
                            <th scope="col">City</th>
                            <th scope="col">Zip</th>
                            <th scope="col">Assessed Land Value</th>
                            <th scope="col">Assessed Improvements Value</th>
                            <th scope="col">Total Assessed Value</th>
                            <th scope="col">Tax Year</th>
                            <th scope="col">% Tax Incr. From Previous Year</th>
                        </tr> 
                    </thead> 
                    <?php            
                        if ( mysqli_connect_errno() )  
                        { 
                            die( mysqli_connect_error() );   
                        } 
                        $sql = "  
                            SELECT Parcel_ID PID, Street, City, Zip, 
                                    Assessed_Land_Val LAND, Assessed_Improvements_Val IMP, 
                                    (Assessed_Land_Val + Assessed_Improvements_Val) TOT,
                                    Tax_Yr TY, Pct_Tax_Incr TINC
                            FROM landparcel LP JOIN taxinfo TI ON LP.Parcel_ID = TI.Parcel_ID
                            WHERE LP.Parcel_ID = {$_GET['parcel']}";

                        if ($result = mysqli_query($connection, $sql))  
                        { 
                            while($row = mysqli_fetch_assoc($result)) 
                            { 
                    ?> 
                    <tr> 
                        <td><?php echo $row['PID'] ?></td>
                        <td><?php echo $row['Street'] ?></td>
                        <td><?php echo $row['City'] ?></td>
                        <td><?php echo $row['Zip'] ?></td>
                        <td><?php echo $row['LAND'] ?></td>
                        <td><?php echo $row['IMP'] ?></td>
                        <td><?php echo $row['TOT'] ?></td>
                        <td><?php echo $row['TINC'] ?></td>
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
