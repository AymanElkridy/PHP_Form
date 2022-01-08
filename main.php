<html>
    <body>

        <?php
            $redTextName = $redTextEmail = $redTextGender = $redTextAgree = '';
            if (!empty($_POST['course'])) {
                if (empty($_POST["name"])) {
                    $redTextName = "Name is required";
                }
                if (empty($_POST["email"])) {
                    $redTextEmail = "Email is required";
                }
                if (empty($_POST["gender"])) {
                    $redTextGender = "Gender is required";
                }
                if (empty($_POST["agree"])) {
                    $redTextAgree = "You must agree to terms";
                }
            }

            function checkSel($opt) {
                if (!empty($_POST['course'])) {
                    foreach ($_POST['course'] as $value) {
                        if ($value != $opt){
                            echo "";
                        } else {
                            echo "selected";
                        }
                    } 
                }
            }
            
        ?>

        <h1>Application name: AAST_BIS class registration</h1>
        <p style = "color: red"><span style = "font-weight: bold">*</span> Required field</p>
        <form action = "<?php $_PHP_SELF ?>" method = "POST">
            <table>
                <tr>
                    <td>Name:</td>
                    <td><input type = "text" name = "name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : '' ?>"/><span style = "color: red; font-weight: bold"> *<?php echo $redTextName ?></span></td>
                </tr>
                <tr>
                    <td>E-mail:</td>
                    <td><input type = "email" name = "email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : '' ?>"/><span style = "color: red; font-weight: bold"> *<?php echo $redTextEmail ?></span></td>
                </tr>
                <tr>
                    <td>Group #:</td>
                    <td><input type = "number" name = "groupNo" value="<?php echo isset($_POST['groupNo']) ? $_POST['groupNo'] : '' ?>"/></td>
                </tr>
                <tr>
                    <td>Class details:</td>
                    <td><textarea name="classDetails" cols="40" rows="5"><?php echo isset($_POST['classDetails']) ? $_POST['classDetails'] : '' ?></textarea></td>
                </tr>
                <tr>
                    <td>Gender:</td>
                    <td><input type = "radio" name = "gender" value="Female" <?php if ($_POST['gender'] == 'Female') echo 'checked'; ?>/>Female
                    <input type = "radio" name = "gender" value="Male" <?php if ($_POST['gender'] == 'Male') echo 'checked'; ?>/>Male<span style = "color: red; font-weight: bold"> *<?php echo $redTextGender ?></span></td>
                </tr>
                <tr>
                    <td>Select Courses:</td>
                    <td>
                        <select name="course[]" size="4" multiple>
                            <option value="PHP" <?php checkSel("PHP"); ?> >PHP</option>
                            <option value="JavaScript" <?php checkSel("JavaScript"); ?>>JavaScript</option>
                            <option value="MySQL" <?php checkSel("MySQL"); ?>>MySQL</option>
                            <option value="HTML" <?php checkSel("HTML"); ?>>HTML</option>
                            <option value="Python" <?php checkSel("Python"); ?>>Python</option>
                            <option value="C++" <?php checkSel("C++"); ?>>C++</option>
                            <option value="None" hidden selected></option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Agree</td>
                    <td><input type = "checkbox" name = "agree" value = "agreed" <?php if ($_POST['agree'] == 'agreed') echo 'checked'; ?>/><span style = "color: red; font-weight: bold"> *<?php echo $redTextAgree ?></span></td>
                </tr>
                <tr>
                    <td><input type = "submit" name = "submit"/></td>
                </tr>
            </table>
        </form>
    </body>
</html>
<?php

    if (!empty($_POST['name']) &&
        !empty($_POST['email']) &&
        !empty($_POST['gender'])) {
            $nameEcho = "Name: ". $_POST['name']. "<br>";
            $emailEcho = "Email: ". $_POST['email']. "<br>";
            $genderEcho = "Gender: ". $_POST['gender']. "<br>";
    }

    if (!empty($_POST['groupNo'])) {
        $groupNoEcho = "Group #: ". $_POST['groupNo']. "<br>";
    } else {
        $groupNoEcho = "Group # was not registered <br>";;
    }
    
    if (!empty($_POST['classDetails'])) {
        $classDetailsEcho = "Class details: ". $_POST['classDetails']. "<br>";
    } else {
        $classDetailsEcho = "Class details was not registed<br>";
    }

    if (!empty($_POST['course'])) {
        $courseEcho = "Your courses are: ";
        foreach ($_POST['course'] as $value) {
            $courseEcho .= $value. " ";
        }
        if ($courseEcho == "Your courses are: None ") {
            $courseEcho = "Courses were not selected";
        } elseif (str_ends_with($courseEcho,"None ")) {
            $courseEcho = substr($courseEcho, 0, -6);
        }
    }

    if (!empty($_POST["name"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["gender"]) &&
        !empty($_POST["agree"])) {
            echo "<h2>Your given values are as:</h2><p>".
            $nameEcho.$emailEcho.$groupNoEcho.$classDetailsEcho.$genderEcho.$courseEcho."</p>";
    }
?>
