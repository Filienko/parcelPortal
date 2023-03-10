<?php require_once('config.php');?>
<!-- Assignment 4 Template -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Investment Opportunities</title>
        <!-- add a reference to the external stylesheet -->
        <link rel="stylesheet" href="https://bootswatch.com/4/journal/bootstrap.min.css">
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>

            body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
            .myLink {display: none}
        </style>
    </head>
    <body>
        <!-- START -- Add HTML code for the top menu section (navigation bar) -->
<div class="w3-bar w3-white w3-border-bottom w3-xlarge">
  <a href="index.php" class="w3-bar-item w3-button w3-text-red w3-hover-red"><b>ParcelPortal</b></a>
</div>

    <!-- END -- Add HTML code for the top menu section (navigation bar) -->
    <div class="jumbotron"> 
        <p class="lead"> We found the following data to be of value for investors <p> 
        <hr class="my-4"> 
        <form method="GET" action="investor.php"> 
            <select name="emp" onchange='this.form.submit()'> 
                <option selected> Select City </option> 

                <?php 
                //Saving the connection through a set of global variables from config file
                //establishing the credentials and testuser name necessery for connecting to the DB hosted on VM
                //if mistake is found in connection process, the connection is not continued
                $connection = mysqli_connect(DBHOST, DBUSER, DBPASS, DBNAME); 
                if ( mysqli_connect_errno() )  
                { 
                    die( mysqli_connect_error() );   
                } 
                $sql = "SELECT DISTINCT city FROM city"; 
                //Saving the location of the project after the sql statement through storing it in a row variable
                // where $ is analogous to a var keyword from JS in php-->

                if ($result = mysqli_query($connection, $sql))  
                { 
                    //Stores query results as part of a row variable
                    // loop through the data 
                    while($row = mysqli_fetch_assoc($result)) 
                    { 
                        echo '<option value="' . $row['city'] . '">'; 
                        echo $row['city'];  
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
                        <th scope="col">Parcel ID </th> 
                        <th scope="col">Parcel City </th> 
                        <th scope="col">Parcel County </th> 
                        <th scope="col">Current Land Value </th> 
                    </tr> 
                </thead> 
                <?php            
                    if ( mysqli_connect_errno() )  
                    { 
                        die( mysqli_connect_error() );   
                    } 


                    $sql =  "SELECT P.Parcel_ID PID, P.City PC, CT.County PCC, TX.Assessed_Land_Val TXA
                    FROM county CT, taxinfo TX, landparcel P
                    WHERE P.County = CT.County AND P.Parcel_ID = TX.Parcel_ID AND P.City = '{$_GET['emp']}'
                    AND CT.Pct_Age_Over_65 <=
                    (SELECT AVG(Pct_Age_Over_65)
                    FROM county)
                    AND TX.Assessed_Land_Val <
                    (SELECT AVG(Assessed_Land_Val)
                    FROM taxinfo)
                    GROUP BY CT.COUNTY
                    ORDER BY TX.Assessed_Land_Val DESC";

                                if ($result = mysqli_query($connection, $sql))  
                                { 
                        while($row = mysqli_fetch_assoc($result)) 
                        { 
                ?> 
                <tr> 
                    <td><?php echo $row['PID'] ?></td> 
                    <td><?php echo $row['PC'] ?></td> 
                    <td><?php echo $row['PCC'] ?></td> 
                    <td><?php echo $row['TXA'] ?></td> 
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
