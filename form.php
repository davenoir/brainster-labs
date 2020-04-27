<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    //Create variables and associate them with input names from HTML
    if (isset($_POST['username'])) {
        $username = $_POST['username'];
    }
    if (isset($_POST['companyname'])) {
        $companyname = $_POST['companyname'];
    }
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    if (isset($_POST['phone'])) {
        $phone = $_POST['phone'];
    }
    if (isset($_POST['student'])) {
        $student = $_POST['student'];
    }

    //set parameters
    if (
        !empty($username) || !empty($companyname) || !empty($email) ||
        !empty($phone) || !empty($student)
    ) {
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbname = "brainster";

        //Create connection
        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

        if (mysqli_connect_error()) {
            die('Connect Error(' . mysqli_connect_error() . ')' . mysqli_connect_error());
        } else {
            $SELECT = "SELECT email From formdata Where email = ? Limit 1";
            //it can be anything, I used 'email' as unique just for test purposes (duplicate email data).
            $INSERT = "INSERT Into formdata (username, companyname, email,
         phone, student) values(?, ?, ?, ?, ?)";
            //errors & success
            $error = "";
            $success = "";
            //Prepare statement
            $stmt = $conn->prepare($SELECT);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($email);
            $stmt->store_result();
            $rnum = $stmt->num_rows;
            if ($rnum == 0) {
                $stmt->close();

                $stmt = $conn->prepare($INSERT);
                $stmt->bind_param("sssis", $username, $companyname, $email, $phone, $student);
                //where 's' is a string and 'i' is an integer in my case BIGINT i.e $phone
                $stmt->execute();
                $success = "Ви Благодариме за регистрација!";
            } else {
                $error = "Има постоечки запис со овој email!";
            }
            $stmt->close();
            $conn->close();
            //terminating statement & connection upon successful data input.
        }
    } else {
        $error = "Сите полиња се задолжителни!";
        die();
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Brainster Labs</title>
    <meta charset=utf-8>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
    <link href="Assets/css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu&display=swap" rel="stylesheet">
    <link href="https://afeld.github.io/emoji-css/emoji.css" rel="stylesheet">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container" id="navcontainer">
            <a class="navbar-brand" href="index.html">
                <img src="Assets/img/logo&heading/brainster_small.png" alt="brainsterlogo" class="imglogo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.brainster.io/marketpreneurs" target="_blank">Академија за
                            маркетинг</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="http://codepreneurs.co/" target="_blank">Академија за програмирање</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.brainster.io/data-science" target="_blank">Академија за
                            data science</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://www.brainster.io/design" target="_blank">Академија за
                            дизајн</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-danger btnstyle" href="#" role="button">Вработи наш студент</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid headerForm">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                <h1><b>Вработи студенти</b></h1>
            </div>
        </div>
    </div>
    <div class="formContents">
        <div class="container">
            <form method="POST">
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-10 col-sm-10 col-10">
                        <div class="form-group">
                            <label for="name"><b>Име и презиме</b></label>
                            <input type="text" class="form-control" id="name" name="username" placeholder="Вашето име и презиме" value="" required>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-10 col-sm-10 col-10">
                        <div class="form-group">
                            <label for="company"><b>Име на компанија</b></label>
                            <input type="text" class="form-control" name="companyname" id="company" placeholder="Име на вашата компанија" value="" required>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-10 col-sm-10 col-10">
                        <div class="form-group">
                            <label for="contEmail"><b>Контакт имејл</b></label>
                            <input type="email" name="email" class="form-control" id="contEmail" placeholder="Контакт имејл на вашата компанија" value="" required>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-10 col-sm-10 col-10">
                        <div class="form-group">
                            <label for="phoneNum"><b>Контакт телефон</b></label>
                            <input type="phone" name="phone" value="" class="form-control" id="phoneNum" placeholder="Контакт телефон на вашата компанија" value="" required>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-4 col-md-10 col-sm-10 col-10">
                        <div class="form-group">
                            <label for="student"><b>Тип на студенти</b></label>
                            <select class="form-control" name="student" id="student" required>
                                <option selected hidden value="">Избери тип на студент</option>
                                <option value="marketing">Суденти од маркетинг</option>
                                <option value="coding">Студенти од програмирање</option>
                                <option value="dataScience">Студенти од data science</option>
                                <option value="design">Студенти од дизајн</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-10 col-sm-10 col-10">
                        <!--I call it a no purpose <label/> :) it's only here to add space and 
                            align the button horizontally with the 'select->option' input data type on the desktop version of the page-->
                        <label for="sbmbutton"> <br></label>
                        <button type="submit" class="btn btn-danger btn-lg btn-block" id="sbmbutton" value="Submit">Испрати</button>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-10 col-md-10 col-sm-10 col-10 offset-lg-2 offset-md-2 offset-sm-2">
                        <?php if (isset($error)) echo "<span style=color:red;>" . $error . "</span>"; ?>
                        <?php if (isset($success)) echo "<span style=color:green;>" . $success . "</span>"; ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!--Copyrights section-->
    <div class="container-fluid copyright">
        <div class="row text-center">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <p>Изработено со <i class="em em-heart"></i> од Dave_Noir</p>
            </div>
        </div>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="Assets/js/script.js"></script>

</html>