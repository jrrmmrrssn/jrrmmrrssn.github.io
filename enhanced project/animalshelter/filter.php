<?php
session_start();

  include("config.php");
  include("functions.php");
  mysqli_select_db($link,'animalshelter');
  $user_data = check_login($link);

?>





<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <style type='text/css'>
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
    </style>

    <title>Filter</title>
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Animal Shelter Data Filter </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                        <a href="index.php" class="btn btn-success pull-right">Go Back</a>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
                  <div class="tablebox">
                  <?php
                  // Include config file
                  require_once "config.php";
                if(isset($_GET['search']))
                {
                  $filtervalues=$_GET['search'];
                  // Attempt select query execution
                  $sql = "SELECT * FROM animals_txt WHERE CONCAT(id, age_upon_outcome, animal_id, animal_type, breed, color, date_of_birth, name, outcome_subtype, outcome_type, sex_upon_outcome) LIKE '%$filtervalues%' ";
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
                }

                  ?>
                </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
