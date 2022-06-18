<?php
session_start();

  include("config.php");
  include("functions.php");
  mysqli_select_db($link,'animalshelter');
  $user_data = check_login($link);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <style type="text/css">
        .wrapper{
            display: flex;
            justify-content: flex-start;
            width: 100%;
            margin: 0 auto;
            overflow-x: auto;
        }
        .page-header h2{
            margin-top: 0;
        }

        .tablebox {
          height: 400px;
          overflow-y: auto;
          overflow-x: auto;
        }

        th {
          top: 0;
          z-index: 2;
          position: sticky;
          background-color: white;
        }

        .logo {
          display: flex;
          justify-content: center;
        }

        table tr td:last-child a{
            margin-right: 15px;
        }

        @import url(https://fonts.googleapis.com/css?family=Oswald:400);

        .navigation {
          width: 100%;
          background-color: black;
        }

        img {
          width: 25px;
          border-radius: 50px;
          float: left;
        }

        .logout {
          font-size: .8em;
          font-family: 'Oswald', sans-serif;
        	position: relative;
          right: -18px;
          bottom: -4px;
          overflow: hidden;
          letter-spacing: 3px;
          opacity: 0;
          transition: opacity .45s;
          -webkit-transition: opacity .35s;

        }

        .button {
        	text-decoration: none;
        	float: left;
          padding: 12px;
          margin: 15px;
          color: white;
          width: 50px;
          background-color: black;
          transition: width .35s;
          -webkit-transition: width .35s;
          overflow: hidden;
        }

        a:hover {
          width: 150px;
        }

        a:hover .logout{
          opacity: .9;
          font-Color: white;
        }

        a {
          text-decoration: none;
        }


    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>
<body>


  <a href="logout.php" class="btn btn-success pull-left">Logout</a>


  </div>
  <br><br>
  HELLO, <?php echo $user_data['user_name']; ?>

  <div class="logo"><img alt="My Image" src="Grazioso_Salvare_Logo.png" style="width:300px;height:300px;" /></div>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h2 class="pull-left">Animal Records</h2>
                        <a href="create.php" class="btn btn-success pull-right">Add Animal Record</a>
                        <a href="filter.php" class="btn btn-success pull-right">Filter Records</a>
                    </div>
                    <div class="tablebox">
                    <?php
                    // Include config file
                    require_once "config.php";

                    // Attempt select query execution
                    $sql = "SELECT * FROM animals_txt";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo "<table class='table table-bordered table-striped'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>id</th>";
                                        echo "<th>Age Upon Outcome</th>";
                                        //echo "<th>Animal ID</th>";
                                        echo "<th>Animal Type</th>";
                                        echo "<th>Breed</th>";
                                        echo "<th>Color</th>";
                                        echo "<th>Date of Birth</th>";
                                        //echo "<th>Date Time</th>";
                                        //echo "<th>Month Year</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Outcome Subtype</th>";
                                        echo "<th>Outcome Type</th>";
                                        echo "<th>Sex Upon Outcome</th>";
                                        //echo "<th>Location Lat.</th>";
                                        //echo "<th>Location Lon.</th>";
                                        //echo "<th>Age Upon Outcome in Weeks</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_assoc($result)){
                                    echo "<tr>";
                                        echo "<td>". $row['id'] ."</td>";
                                        echo "<td>$row[age_upon_outcome]</td>";
                                        //echo "<td>$row[animal_id]</td>";
                                        echo "<td>$row[animal_type]</td>";
                                        echo "<td>$row[breed]</td>";
                                        echo "<td>$row[color]</td>";
                                        echo "<td>$row[date_of_birth]</td>";
                                        //echo "<td>$row[datetime]</td>";
                                        //echo "<td>$row[monthyear]</td>";
                                        echo "<td>$row[name]</td>";
                                        echo "<td>$row[outcome_subtype]</td>";
                                        echo "<td>$row[outcome_type]</td>";
                                        echo "<td>$row[sex_upon_outcome]</td>";
                                        //echo "<td>$row[location_lat]</td>";
                                        //echo "<td>$row[location_long]</td>";
                                        //echo "<td>$row[age_upon_outcome_in_weeks]</td>";

                                        echo "<td>";
                                            echo "<a href='read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo "<p class='lead'><em>No records were found.</em></p>";
                        }
                    } else{
                        echo "ERROR: not able to execute $sql. " . mysqli_error($link);
                    }


                    ?>
                  </div>
                </div>
            </div>
        </div>
    </div>

<?php
// Close connection
mysqli_close($link);
?>
</body>
</html>
