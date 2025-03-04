<!DOCTYPE HTML>
<?php

$totalCal = 0;
function validate($var) 
{
    return is_numeric($var); //simple input validation that checks if is number 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") { //patience, all will be validated upon the form's submission.

    $breakfastCal = $_POST["breakfast"];
    $lunchCal = $_POST["lunch"];
    $dinnerCal = $_POST["dinner"];
    $miscCal = $_POST["misc"];

    $validFast; //start of input validation
    if (validate($breakfastCal))
    {
        $validFast = true;
    }
    

}

?>

<html>


    
        <form action="CalorieCounter.php?Submit=true" method="post"> 
            <fieldset>
                <legend> Today's Calories </legend>
                <label> Breakfast: <input type="text" size="7" maxlength="5" name="breakfast" value="<?php echo isset($_SESSION['validName']) ? $_SESSION['validName'] : ''; ?>"/> <br/>
                <label> Lunch: <input type="text" size="10" maxlength="5" name="lunch" value="<?php echo isset($_SESSION['validName']) ? $_SESSION['validName'] : ''; ?>"/> <br/>
                
                <label> Dinner: <input type="text" size="10" maxlength="5" name="dinner" value="<?php echo isset($_SESSION['validPhone']) ? $_SESSION['validPhone'] : ''; ?>">  <br/>
                <label> Miscellaneous: <input type="text" size="3.2" maxlength="4" name="misc" value="<?php echo isset($_SESSION['validEmail']) ? $_SESSION['validEmail'] : ''; ?>"> </label> <br /> 
            </fieldset>
            <label><input type="submit" value="Add" name ="add"> </label>
        </form>
        <!--TODO -->
        <!-- Have a total for the day dynamically sum all Calorie Counts -->
        <!-- Make number validation -->
        <!-- Keep a current date and time, and figure out how/if that would interact with the database --> 


</html>