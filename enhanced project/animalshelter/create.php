<?php
// Include config file
require_once "config.php";

// Define variables and initialize with empty values
$age_upon_outcome = $animal_id = $animal_type = $breed = $color = $date_of_birth = $datetime = $monthyear = $name = $outcome_subtype = $outcome_type = $sex_upon_outcome = $location_lat = $location_long = $age_upon_outcome_in_weeks = "";
$age_upon_outcome_err = $animal_id_err = $animal_type_err = $breed_err = $color_err = $date_of_birth_err = $datetime_err = $monthyear_err = $name_err = $outcome_subtype_err = $outcome_type_err = $sex_upon_outcome_err = $location_lat_err = $location_long_err = $age_upon_outcome_in_weeks_err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate $age_upon_outcome
    $input_age_upon_outcome = trim($_POST["age_upon_outcome"]);
    if(empty($input_age_upon_outcome)){
        $age_upon_outcome_err = "Please enter an age_upon_outcome.";
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
        $date_of_birth_err = "Please enter date_of_birth.";
    } else{
        $date_of_birth = $input_date_of_birth;
    }

    // Validate DateTime
    $input_datetime = trim($_POST["datetime"]);
    if(empty($input_datetime)){
        $datetime_err = "Please enter datetime.";
    } else{
        $datetime = $input_datetime;
    }

    // Validate monthyear
    $input_monthyear = trim($_POST["monthyear"]);
    if(empty($input_monthyear)){
        $monthyear_err = "Please enter monthyear.";
    } else{
        $monthyear = $input_monthyear;
    }

    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter name.";
    } else{
        $name = $input_name;
    }

    // Validate outcome_subtype
    $input_outcome_subtype = trim($_POST["outcome_subtype"]);
    if(empty($input_outcome_subtype)){
        $outcome_subtype_err = "Please enter outcome_subtype.";
    } else{
        $outcome_subtype = $input_outcome_subtype;
    }

    // Validate outcome_type
    $input_outcome_type = trim($_POST["outcome_type"]);
    if(empty($input_outcome_type)){
        $outcome_type_err = "Please enter outcome_type.";
    } else{
        $outcome_type = $input_outcome_type;
    }

    // Validate sex_upon_outcome
    $input_sex_upon_outcome = trim($_POST["sex_upon_outcome"]);
    if(empty($input_sex_upon_outcome)){
        $sex_upon_outcome_err = "Please enter sex_upon_outcome.";
    } else{
        $sex_upon_outcome = $input_sex_upon_outcome;
    }

    // Validate location_lat
    $input_location_lat = trim($_POST["location_lat"]);
    if(empty($input_location_lat)){
        $location_lat_err = "Please enter location_lat.";
    } else{
        $location_lat = $input_location_lat;
    }

    // Validate location_long
    $input_location_long = trim($_POST["location_long"]);
    if(empty($input_location_long)){
        $location_long_err = "Please enter location_long.";
    } else{
        $location_long = $input_location_long;
    }

    // Validate age_upon_outcome_in_weeks
    $input_age_upon_outcome_in_weeks = trim($_POST["age_upon_outcome_in_weeks"]);
    if(empty($input_age_upon_outcome_in_weeks)){
        $age_upon_outcome_in_weeks_err = "Please enter age_upon_outcome_in_weeks.";
    } else{
        $age_upon_outcome_in_weeks = $input_age_upon_outcome_in_weeks;
    }

    // Check input errors before inserting in database
    if(empty($age_upon_outcome_err) && empty($animal_id_err) && empty($animal_type_err) && empty($breed_err) && empty($color_err) && empty($date_of_birth_err) && empty($datetime_err) && empty($monthyear_err) && empty($name_err) && empty($outcome_subtype_err) && empty($outcome_type_err) && empty($sex_upon_outcome_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO animals_txt (age_upon_outcome,animal_id,animal_type,breed,color,date_of_birth,datetime,monthyear,name,outcome_subtype,outcome_type,sex_upon_outcome,location_lat,location_long,age_upon_outcome_in_weeks) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssssssssss", $param_age_upon_outcome, $param_animal_id, $param_animal_type, $param_breed, $param_color, $param_date_of_birth, $param_datetime, $param_monthyear, $param_name, $param_outcome_subtype, $param_outcome_type, $param_sex_upon_outcome, $param_location_lat, $param_location_long, $param_age_upon_outcome_in_weeks);

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

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
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
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
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
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add animal record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
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
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-default">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
