<!-- Assignment 4 Template -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ParcelPortal</title>
        <!-- add a reference to the external stylesheet -->
        <link rel="stylesheet" href="https://bootswatch.com/4/simplex/bootstrap.min.css">
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
                    <li class="nav-item"> 
                        <a class="nav-link active" href="index.php">Home 
                            <span class="sr-only">(current)</span> 
                        </a> 
                    </li> 
                    <li class="nav-item"> 
                        <a class="nav-link" href="investor.php">Invest</a> 
                    </li> 
                    <li class="nav-item"> 
                        <a class="nav-link" href="owner.php">Evaluate your House</a> 
                    </li> 
                    <li class="nav-item"> 
                        <a class="nav-link" href="buyer.php">Buy new House</a> 
                    </li> 
                    <li class="nav-item"> 
                        <a class="nav-link" href="city.php">City Staff</a> 
                    </li> 

                </ul> 
                <form class="form-inline my-2 my-lg-0"> 
                    <input class="form-control mr-sm-2" type="text" placeholder="Search"> 
                    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button> 
                </form> 
            </div> 
        </nav>
        <!-- END -- Add HTML code for the top menu section (navigation bar) -->
        <div class="jumbotron"> 
            <h1 class="display-3">Welcome to parcelPortal!</h1> 
            <p class="lead">You can use this website as an investment tool for evlauating the real estate offerings in Washington <p> 
            <hr class="my-4"> 
            <p>It uses PHP and MySQL DMBS to execute commands on our databse.</p> 
            <p class="lead"> 
                <a class="btn btn-primary btn-lg" href="#" role="button">Thank you for visiting</a> 
            </p> 
        </div>
    </body>
</html>