<?php

session_start();

  include("config.php");
  include("functions.php");
  mysqli_select_db($link,'animalshelter');
  $user_data = check_login($link);


// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$age_upon_outcome = $animal_id = $animal_type = $breed = $color = $date_of_birth = $datetime = $monthyear = $name = $outcome_subtype = $outcome_type = $sex_upon_outcome = $location_lat = $location_long = $age_upon_outcome_in_weeks = "";
$age_upon_outcome_err = $animal_id_err = $animal_type_err = $breed_err = $color_err = $date_of_birth_err = $datetime_err = $monthyear_err = $name_err = $outcome_subtype_err = $outcome_type_err = $sex_upon_outcome_err = $location_lat_err = $location_long_err = $age_upon_outcome_in_weeks_err = "";

// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

    // Validate $age_upon_outcome
    $input_age_upon_outcome = trim($_POST["age_upon_outcome"]);
    if(empty($input_age_upon_outcome)){
        $age_upon_outcome_err = "Please enter an age_upon_outcome or NA.";
    } else{
        $age_upon_outcome = $input_age_upon_outcome;
    }

    // Validate animal_id
    $input_animal_id = trim($_POST["animal_id"]);
    if(empty($input_animal_id)){
        $animal_id_err = "Please enter an animal_id.";
    } else{
        $animal_id = $input_animal_id;
    }

    // Validate animal_type
    $input_animal_type = trim($_POST["animal_type"]);
    if(empty($input_animal_type)){
        $animal_type_err = "Please enter animal_type.";
    } else{
        $animal_type = $input_animal_type;
    }

    // Validate breed
    $input_breed = trim($_POST["breed"]);
    if(empty($input_breed)){
        $breed_err = "Please enter breed.";
    } else{
        $breed = $input_breed;
    }

    // Validate color
    $input_color = trim($_POST["color"]);
    if(empty($input_color)){
        $color_err = "Please enter color.";
    } else{
        $color = $input_color;
    }

    // Validate date_of_birth
    $input_date_of_birth = trim($_POST["date_of_birth"]);
    if(empty($input_date_of_birth)){
        $date_of_birth_err = "Please enter date_of_birth or NA.";
    } else{
        $date_of_birth = $input_date_of_birth;
    }

    // Validate DateTime
    $input_datetime = trim($_POST["datetime"]);
    if(empty($input_datetime)){
        $datetime_err = "Please enter datetime or NA.";
    } else{
        $datetime = $input_datetime;
    }

    // Validate monthyear
    $input_monthyear = trim($_POST["monthyear"]);
    if(empty($input_monthyear)){
        $monthyear_err = "Please enter monthyear or NA.";
    } else{
        $monthyear = $input_monthyear;
    }

    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter name or NA.";
    } else{
        $name = $input_name;
    }

    // Validate outcome_subtype
    $input_outcome_subtype = trim($_POST["outcome_subtype"]);
    if(empty($input_outcome_subtype)){
        $outcome_subtype_err = "Please enter outcome_subtype or NA.";
    } else{
        $outcome_subtype = $input_outcome_subtype;
    }

    // Validate outcome_type
    $input_outcome_type = trim($_POST["outcome_type"]);
    if(empty($input_outcome_type)){
        $outcome_type_err = "Please enter outcome_type or NA.";
    } else{
        $outcome_type = $input_outcome_type;
    }

    // Validate sex_upon_outcome
    $input_sex_upon_outcome = trim($_POST["sex_upon_outcome"]);
    if(empty($input_sex_upon_outcome)){
        $sex_upon_outcome_err = "Please enter sex_upon_outcome or NA.";
    } else{
        $sex_upon_outcome = $input_sex_upon_outcome;
    }

    // Validate location_lat
    $input_location_lat = trim($_POST["location_lat"]);
    if(empty($input_location_lat)){
        $location_lat_err = "Please enter location_lat or NA.";
    } else{
        $location_lat = $input_location_lat;
    }

    // Validate location_long
    $input_location_long = trim($_POST["location_long"]);
    if(empty($input_location_long)){
        $location_long_err = "Please enter location_long or NA.";
    } else{
        $location_long = $input_location_long;
    }

    // Validate age_upon_outcome_in_weeks
    $input_age_upon_outcome_in_weeks = trim($_POST["age_upon_outcome_in_weeks"]);
    if(empty($input_age_upon_outcome_in_weeks)){
        $age_upon_outcome_in_weeks_err = "Please enter age_upon_outcome_in_weeks or NA.";
    } else{
        $age_upon_outcome_in_weeks = $input_age_upon_outcome_in_weeks;
    }

    // Check input errors before inserting in database
    if(empty($age_upon_outcome_err) && empty($animal_id_err) && empty($animal_type_err) && empty($breed_err) && empty($color_err) && empty($date_of_birth_err) && empty($datetime_err) && empty($monthyear_err) && empty($name_err) && empty($outcome_subtype_err) && empty($outcome_type_err) && empty($sex_upon_outcome_err)){
        // Prepare an update statement
        $sql = "UPDATE animals_txt SET age_upon_outcome=?, animal_id=?, animal_type=?, breed=?, color=?, date_of_birth=?, datetime=?, monthyear=?, name=?, outcome_subtype=?, outcome_type=?, sex_upon_outcome=?, location_lat=?, location_long=?, age_upon_outcome_in_weeks=? WHERE id=?";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssssssssssi", $param_age_upon_outcome, $param_animal_id, $param_animal_type, $param_breed, $param_color, $param_date_of_birth, $param_datetime, $param_monthyear, $param_name, $param_outcome_subtype, $param_outcome_type, $param_sex_upon_outcome, $param_location_lat, $param_location_long, $param_age_upon_outcome_in_weeks, $param_id);

            // Set parameters
            $param_age_upon_outcome = $age_upon_outcome;
            $param_animal_id = $animal_id;
            $param_animal_type = $animal_type;
            $param_breed = $breed;
            $param_color = $color;
            $param_date_of_birth = $date_of_birth;
            $param_datetime = $datetime;
            $param_monthyear = $monthyear;
            $param_name = $name;
            $param_outcome_subtype = $outcome_subtype;
            $param_outcome_type = $outcome_type;
            $param_sex_upon_outcome = $sex_upon_outcome;
            $param_location_lat = $location_lat;
            $param_location_long = $location_long;
            $param_age_upon_outcome_in_weeks = $age_upon_outcome_in_weeks;
            $param_id = $id;

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }

        // Close statement
        mysqli_stmt_close($stmt);
    }

    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);

        // Prepare a select statement
        $sql = "SELECT * FROM animals_txt WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            // Set parameters
            $param_id = $id;

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
                    // URL doesn't contain valid id. Redirect to error page
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
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
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
                        <h2>Update Record</h2>
                    </div>
                    <p>Please edit the input values and submit to update the record.</p>
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group <?php echo (!empty($age_upon_outcome_err)) ? 'has-error' : ''; ?>">
                            <label>age_upon_outcome</label>
                            <input type="text" name="age_upon_outcome" class="form-control" value="<?php echo $age_upon_outcome; ?>">
                            <span class="help-block"><?php echo $age_upon_outcome_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($animal_id_err)) ? 'has-error' : ''; ?>">
                            <label>animal_id</label>
                            <input type="text" name="animal_id" class="form-control" value="<?php echo $animal_id; ?>">
                            <span class="help-block"><?php echo $animal_id_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($animal_type_err)) ? 'has-error' : ''; ?>">
                            <label>animal_type</label>
                            <input type="text" name="animal_type" class="form-control" value="<?php echo $animal_type; ?>">
                            <span class="help-block"><?php echo $animal_type_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($breed_err)) ? 'has-error' : ''; ?>">
                            <label>breed</label>
                            <input type="text" name="breed" class="form-control" value="<?php echo $breed; ?>">
                            <span class="help-block"><?php echo $breed_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($color_err)) ? 'has-error' : ''; ?>">
                            <label>color</label>
                            <input type="text" name="color" class="form-control" value="<?php echo $color; ?>">
                            <span class="help-block"><?php echo $color_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($date_of_birth_err)) ? 'has-error' : ''; ?>">
                            <label>date_of_birth</label>
                            <input type="text" name="date_of_birth" class="form-control" value="<?php echo $date_of_birth; ?>">
                            <span class="help-block"><?php echo $date_of_birth_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($datetime_err)) ? 'has-error' : ''; ?>">
                            <label>datetime</label>
                            <input type="text" name="datetime" class="form-control" value="<?php echo $datetime; ?>">
                            <span class="help-block"><?php echo $datetime_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($monthyear_err)) ? 'has-error' : ''; ?>">
                            <label>monthyear</label>
                            <input type="text" name="monthyear" class="form-control" value="<?php echo $monthyear; ?>">
                            <span class="help-block"><?php echo $monthyear_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($outcome_subtype_err)) ? 'has-error' : ''; ?>">
                            <label>outcome_subtype</label>
                            <input type="text" name="outcome_subtype" class="form-control" value="<?php echo $outcome_subtype; ?>">
                            <span class="help-block"><?php echo $outcome_subtype_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($outcome_type_err)) ? 'has-error' : ''; ?>">
                            <label>outcome_type</label>
                            <input type="text" name="outcome_type" class="form-control" value="<?php echo $outcome_type; ?>">
                            <span class="help-block"><?php echo $outcome_type_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($sex_upon_outcome_err)) ? 'has-error' : ''; ?>">
                            <label>sex_upon_outcome</label>
                            <input type="text" name="sex_upon_outcome" class="form-control" value="<?php echo $sex_upon_outcome; ?>">
                            <span class="help-block"><?php echo $sex_upon_outcome_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($location_lat_err)) ? 'has-error' : ''; ?>">
                            <label>location_lat</label>
                            <input type="text" name="location_lat" class="form-control" value="<?php echo $location_lat; ?>">
                            <span class="help-block"><?php echo $location_lat_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($location_long_err)) ? 'has-error' : ''; ?>">
                            <label>location_long</label>
                            <input type="text" name="location_long" class="form-control" value="<?php echo $location_long; ?>">
                            <span class="help-block"><?php echo $location_long_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($age_upon_outcome_in_weeks_err)) ? 'has-error' : ''; ?>">
                            <label>age_upon_outcome_in_weeks</label>
                            <input type="text" name="age_upon_outcome_in_weeks" class="form-control" value="<?php echo $age_upon_outcome_in_weeks; ?>">
                            <span class="help-block"><?php echo $age_upon_outcome_in_weeks_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
