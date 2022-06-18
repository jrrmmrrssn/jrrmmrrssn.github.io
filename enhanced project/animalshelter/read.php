<?php
session_start();

  include("config.php");
  include("functions.php");
  mysqli_select_db($link,'animalshelter');
  $user_data = check_login($link);


// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "config.php";

    // Prepare a select statement
    $sql = "SELECT * FROM animals_txt WHERE id = ?";

    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        // Set parameters
        $param_id = trim($_GET["id"]);

        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                // Retrieve individual field value
                $age_upon_outcome = $row["age_upon_outcome"];
                $animal_id = $row["animal_id"];
                $animal_type = $row["animal_type"];
                $breed = $row["breed"];
                $color = $row["color"];
                $date_of_birth = $row["date_of_birth"];
                $datetime = $row["datetime"];
                $monthyear = $row["monthyear"];
                $name = $row["name"];
                $outcome_subtype = $row["outcome_subtype"];
                $outcome_type = $row["outcome_type"];
                $sex_upon_outcome = $row["sex_upon_outcome"];
                $location_lat = $row["location_lat"];
                $location_long = $row["location_long"];
                $age_upon_outcome_in_weeks = $row["age_upon_outcome_in_weeks"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }

        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    // Close statement
    mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style type="text/css">
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>View Record</h1>
                    </div>
                    <div class="form-group">
                        <label>age_upon_outcome</label>
                        <p class="form-control-static"><?php echo $row["age_upon_outcome"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>animal_id</label>
                        <p class="form-control-static"><?php echo $row["animal_id"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>animal_type</label>
                        <p class="form-control-static"><?php echo $row["animal_type"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>breed</label>
                        <p class="form-control-static"><?php echo $row["breed"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>color</label>
                        <p class="form-control-static"><?php echo $row["color"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>date_of_birth</label>
                        <p class="form-control-static"><?php echo $row["date_of_birth"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>datetime</label>
                        <p class="form-control-static"><?php echo $row["datetime"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>monthyear</label>
                        <p class="form-control-static"><?php echo $row["monthyear"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>name</label>
                        <p class="form-control-static"><?php echo $row["name"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>outcome_subtype</label>
                        <p class="form-control-static"><?php echo $row["outcome_subtype"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>outcome_type</label>
                        <p class="form-control-static"><?php echo $row["outcome_type"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>sex_upon_outcome</label>
                        <p class="form-control-static"><?php echo $row["sex_upon_outcome"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>location_lat</label>
                        <p class="form-control-static"><?php echo $row["location_lat"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>location_long</label>
                        <p class="form-control-static"><?php echo $row["location_long"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>age_upon_outcome_in_weeks</label>
                        <p class="form-control-static"><?php echo $row["age_upon_outcome_in_weeks"]; ?></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
