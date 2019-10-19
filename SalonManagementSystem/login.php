<?php
include_once ("php/connect.php");
include_once "php/phpValidation.php";
//////////////////////// HAS'NT ACCOUNT ///////////////////////
$errorMessage = "";
$firstName = "";
$lastName = "";
$email = "";
$pwd = "";
$verifyPwd = "";
$address = "";
$postCode = "";
$cardNo = "";

//////////////////////// HAS ACCOUNT //////////////////////////
$hasEmail = "";
$hasPwd = "";
$hasErrorMessage = "";

//////////////////////// BUTTON LOGIN /////////////////////
if (isset($_POST["btnLogin"]))
{
    $hasEmail = $_POST["txtEmail"];
    $hasPwd = $_POST["txtPwd"];

    /////////////////// QUERY EMAIL EXISTS ? ///////////////
    $query = "SELECT * FROM customer where email='$hasEmail'";
    $resultSet = mysqli_query($connection, $query);
    if (!$resultSet) die("<ERROR: Cannot execute $query>");
    $fetchedRow = mysqli_fetch_assoc($resultSet);
    /////////////////// END OF UERY EMAIL EXISTS ///////////

    if ($fetchedRow == null)
    {
        $hasErrorMessage = "ERROR: No such email exists in our database";
    }
    else
    {
        $salt = "*@!";
        $hashedPwd = md5($salt.$hasPwd.$salt);
        $query = "SELECT * FROM customer where email='$hasEmail' and password = '$hashedPwd'";
        $resultSet = mysqli_query($connection, $query);
        if (!$resultSet) die("<ERROR: Cannot execute $query>");
        $fetchedRow = mysqli_fetch_assoc($resultSet);

        if ($fetchedRow != null)
        {
            $firstName = $fetchedRow["firstName"];
            $lastName = $fetchedRow["lastName"];
            $custName = $firstName." ".$lastName;
            $hasAddress = $fetchedRow["address"];
            $hasPostCode = $fetchedRow["postCode"];
            $hasCardNo = $fetchedRow["cardNo"];
            $_SESSION["customer"] = array("firstName" => $firstName, "lastName" => $lastName, "name" => $custName, "email" => $hasEmail, "password" =>$hasPwd, "address" => "$hasAddress", "postCode" => "$hasPostCode", "cardNo" => "$hasCardNo");;
            header("Location: index.php");
        }
        else
        {
            $hasErrorMessage = "ERROR: Password is incorrect";;
        }
    }
}
//////////////////////// BUTTON REGISTER /////////////////////
if (isset($_POST["btnRegister"]))
{
    $firstName = $_POST["txtFirstName"];
    $lastName = $_POST["txtLastName"];
    $email = $_POST["txtEmail"];
    $pwd = $_POST["txtPwd"];
    $verifyPwd = $_POST["txtVerifyPwd"];
    $address = $_POST["txtAddress"];
    $postCode = $_POST["txtPostCode"];
    $cardNo = $_POST["txtCardNo"];

    $rdyAddress = preg_replace('/\s+/', '', $address);


    if (!preg_match("/^[A-Z]+$/i", $firstName) || strlen($firstName) > 30)
    {
        $errorMessage = "ERROR: First name must contain only letters";
        if (strlen($firstName) > 30)
        {
            $errorMessage = "ERROR: First name length must be less than 30 characters";
        }
    }
    else if (!preg_match("/^[A-Z]+$/i", $lastName) || strlen($lastName) > 30)
    {
        $errorMessage = "ERROR: Last name must contain only letters";
        if (strlen($lastName) > 30)
        {
            $errorMessage = "ERROR: Last name length must be less than 30 characters";
        }
    }
    else if (!isEmail($email) || strlen($email) > 50)
    {
        $errorMessage = "ERROR: Email is not valid email!";
        if (strlen($email) > 50)
        {
            $errorMessage = "ERROR: Email length must be less than 50 characters";
        }
    }
    else if (!preg_match("/^.*(?=.{8,})(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).*$/", $pwd) || strlen($pwd) > 30 || preg_match('/\s+/', $pwd))
    {
        $errorMessage = "ERROR: Password is invalid! password length must be 8, it must contain at least one upper case letter and one number";
        if (strlen($pwd) > 30)
        {
            $errorMessage = "ERROR: Password length must be less than 30 characters";
        }
        if(preg_match('/\s+/', $pwd))
        {
            $errorMessage = "ERROR: Password must not contain spaces";
        }
    }
    else if ($pwd != $verifyPwd)
    {
        $errorMessage = "ERROR: Passwords doesn't match!";
    }
    else if (!preg_match("/^([0-9]+)([A-Z',])+$/i", $rdyAddress) || strlen($rdyAddress) > 50)
    {
        $errorMessage = "ERROR: Address is invalid, it must be in the format: houseNo street city";
        if(strlen($rdyAddress) > 50)
        {
            $errorMessage = "ERROR: Address length must be less than 50 characters";
        }
    }
    else if ( strlen($postCode) > 8)
    {
        $errorMessage = "ERROR: Post code is invalid!";
        if(strlen($postCode) > 8)
        {
            $errorMessage = "ERROR: Post code length be less than 8 characters";
        }
    }

    else
    {
        /////////////////// QUERY EMAIL EXISTS ? ///////////////
        $query = "SELECT * FROM customer where email='$email'";
        $resultSet = mysqli_query($connection, $query);
        if (!$resultSet) die("<ERROR: Cannot execute $query>");
        $fetchedRow = mysqli_fetch_assoc($resultSet);
        /////////////////// END OF UERY EMAIL EXISTS ///////////

        if ($fetchedRow != null)
        {
            $errorMessage = "ERROR: Cannot register with this email, because it already exists in our system";
        }
        else
        {
            $salt = "*@!";
            $hashedPassword = md5($salt.$pwd.$salt);
            $createQuery = "INSERT INTO customer(firstName, lastName, email, password, address, postCode, cardNo)
                                VALUES ('$firstName', '$lastName', '$email', '$hashedPassword', '$address', '$postCode', '$cardNo')";
            $createResult = mysqli_query($connection, $createQuery);
            if (!$createResult) die("<ERROR: Cannot execute $createQuery>");
            echo "  <script>
                                        $(function()
                                            {
                                                $('#frmHasNot').fadeOut('slow');
                                                $('#hasNotH5').replaceWith('<h2>Congratulation</h2>');
                                                $('#hasNotPara').replaceWith('<p>Your account has been created, please login now.</p>');
                                            })
                                    </script>
                                    ";
        }
    }
}
?>


<html>
<body>
<div id="hasAccountDiv">
    <h5>Existing Customers</h5>
    <form id="frmHas" method="post">
        <span class="spanInputs">Email Address:</span>
        <input type="text" name="txtEmail" value="<?php echo $hasEmail ?>"/>

        <span class="spanInputs">Password:</span>
        <input id="hasPassword" type="password" name="txtPwd" value="<?php echo $hasPwd ?>"/>

        <input type="submit" name="btnLogin" value="Login"/>
    </form>
</div>
</body>
</html>