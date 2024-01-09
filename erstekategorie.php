<!DOCTYPE html>
<?php
require "connection.php";
?>
<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Login Basic - Pages | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>
    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


</head>

<body>

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register Card -->
                <div class="card" style="width: 35rem; height : 30rem">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="index.html" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">
                                    <img src="https://www.domain.de/_img/logos/head_normal.png" alt="logo.png" class="img-fluid" style="width: 200px; height: auto;">
                                    </svg>
                                </span>
                                <!-- <span class="app-brand-text demo text-body fw-bold">Domain.De</span> -->
                            </a>
                        </div>
                        <!-- /Logo -->

                        <h1 class="mb-2" id="categoryTitleHead"></h1>
                        <div id="authenti-inner" class="py-2"></div>
                        <form id="formAuthentication" class="mb-3  d-flex flex-column align-items-center justify-content-center" action="" method="POST">
                            <h5 class="mb-2" id="categoryQuestion"></h5>
                            <p class="mb-4"></p>
                            <div class="row  d-flex align-items-center">
                                <div class="col-1 mb-3 parent">
                                    <input name="correctAnswer" class="form-check-input" type="radio" value="0" id="answerradio1">
                                </div>
                                <div class="col-11 mb-3 parent">
                                    <h5 class="mb-2" id="answer1" name="answer1"></h5>
                                </div>
                                <div class="col-1 mb-3">
                                    <input name="correctAnswer" class="form-check-input" type="radio" value="0" id="answerradio2">
                                </div>
                                <div class="col-11 mb-3 parent">
                                    <h5 class="mb-2" id="answer2" name="answer2"></h5>
                                </div>
                                <div class="col-1 mb-3 parent">
                                    <input name="correctAnswer" class="form-check-input" type="radio" value="0" id="answerradio3">
                                </div>
                                <div class="col-11 mb-3 parent">
                                    <h5 class="mb-2" id="answer3" name="answer3"></h5>
                                </div>
                                <div class="col-1 mb-3 parent">
                                    <input name="correctAnswer" class="form-check-input" type="radio" value="0" id="answerradio4">
                                </div>
                                <div class="col-11 mb-3 parent">
                                    <h5 class="mb-2" id="answer4" name="answer4"></h5>
                                </div>

                            </div>
                            <div class="mt-2 d-flex align-items-center justify-content-around" id="jokerBtnDiv">
                                <button type="button" class="btn btn-primary d-grid w-25 jokerBtnDiv" name="joker1" id="joker1">Joker1</button>
                                <button type="button" class="btn btn-primary d-grid w-25 jokerBtnDiv" name="joker2" id="joker2">Joker2</button>
                                <button type="button" class="btn btn-primary d-grid w-25 jokerBtnDiv" name="joker3" id="joker3">Joker3</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Register Card -->
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            console.log("Ready");
            <?php
            $urlParams = isset($_GET['args']) ? $_GET['args'] : '';
            $urlParamsDecoded = urldecode($urlParams);
            $urlParamsDecoded = mysqli_real_escape_string($conn, $urlParamsDecoded);

            $query = "SELECT * FROM category WHERE name = '$urlParamsDecoded' and visible = 1";
            $result1 = mysqli_query($conn, $query);
            $count = mysqli_fetch_array($result1);
            if ($count > 0) {
                $category_obj = $count;
                echo "$('#categoryTitleHead').text('" . $category_obj['name'] . "').css('text-transform', 'uppercase');";

                $category_pk = $category_obj['pk'];
                $query = "SELECT * FROM category_question WHERE category_id = $category_pk AND visible = 1";
                $result2 = mysqli_query($conn, $query);

                if ($result2) {
                    $rows = mysqli_fetch_all($result2, MYSQLI_ASSOC);
                    $numRows = count($rows);

                    if ($numRows > 0) {
                        $randomQuestionObj = $rows[rand(0, $numRows - 1)];
                        echo "$('#categoryQuestion').text('" . $randomQuestionObj['question'] . "').css('text-transform', 'uppercase');";

                        $question_pk = $randomQuestionObj['pk'];
                        $query = "SELECT * FROM answer WHERE question_id = $question_pk";
                        $result3 = mysqli_query($conn, $query);

                        $index = 1;
                        while ($rows = mysqli_fetch_array($result3)) {
                            $id = "#answer" . $index;
                            echo "$('" . $id . "').text('" . strtoupper($rows['answer']) . "');";

                            // Fix: Wrap the desiredRadioId in quotes
                            $desiredRadioId = 'answerradio' . $index;
                            echo "var desiredRadioId = '" . $desiredRadioId . "';";
                            echo "if (" . $rows['status'] . " == 1) {";
                            echo "    $('#' + desiredRadioId).prop('value', 1);";
                            echo "} else {";
                            echo "    $('#' + desiredRadioId).prop('value', 0);";
                            echo "}";
                            $index++;
                        }
                    } else {
                        $randomQuestionObj = "No Question Found";
                        echo "$('#categoryQuestion').text('" . $randomQuestionObj . "').css('text-transform', 'uppercase');";
                        // $index = 1;
                        // while ($index <= 4) {
                        //     $id = "#answer" . $index;
                        //     echo "$('" . $id . "').text('" . strtoupper("Option Doesnt Exist") . "');";

                        //     // Fix: Wrap the desiredRadioId in quotes
                        //     $desiredRadioId = 'answerradio' . $index;
                        //     echo "var desiredRadioId = '" . $desiredRadioId . "';";
                        //     echo "if (" . 0 . " == 1) {";
                        //     echo "    $('#' + desiredRadioId).prop('value', 1);";
                        //     echo "} else {";
                        //     echo "    $('#' + desiredRadioId).prop('value', 0);";
                        //     echo "}";
                        //     $index++;
                        // }
                        echo "$('#jokerBtnDiv').css('display', 'none');";
                        echo "$('#joker1').attr('style', 'display: none !important');";
                        echo "$('#joker2').attr('style', 'display: none !important');";
                        echo "$('#joker3').attr('style', 'display: none !important');";

                        echo "$('input[name=\'correctAnswer\']').hide();";
                    }
                } else {
                    $randomQuestionObj = "No Question Found";
                    echo "$('#categoryQuestion').text('" . $randomQuestionObj . "').css('text-transform', 'uppercase');";
                    echo  "$('.jokerBtnDiv').prop('disabled', true);";

                    // $index = 1;
                    // while ($index <= 4) {
                    //     $id = "#answer" . $index;
                    //     echo "$('" . $id . "').text('" . strtoupper("Answer is not avaliable") . "');";

                    //     // Fix: Wrap the desiredRadioId in quotes
                    //     $desiredRadioId = 'answerradio' . $index;
                    //     echo "var desiredRadioId = '" . $desiredRadioId . "';";
                    //     echo "if (" . 0 . " == 1) {";
                    //     echo "    $('#' + desiredRadioId).prop('value', 1);";
                    //     echo "} else {";
                    //     echo "    $('#' + desiredRadioId).prop('value', 0);";
                    //     echo "}";
                    //     $index++;
                    // }


                    echo "$('#jokerBtnDiv').css('display', 'none');";
                    echo "$('#joker1').attr('style', 'display: none !important');";
                    echo "$('#joker2').attr('style', 'display: none !important');";
                    echo "$('#joker3').attr('style', 'display: none !important');";

                    echo "$('input[name=\'correctAnswer\']').hide();";
                }
            } else {
                $category_obj = "Category Doesn\'t Exist";
                echo "$('#categoryTitleHead').text('" . $category_obj . "').css('text-transform', 'uppercase');";

                $randomQuestionObj = "No Question Found";
                echo "$('#categoryQuestion').text('" . $randomQuestionObj . "').css('text-transform', 'uppercase');";

                // $index = 1;
                // while ($index <= 4) {
                //     $id = "#answer" . $index;
                //     echo "$('" . $id . "').text('" . strtoupper("Answer is not avaliable") . "');";

                //     // Fix: Wrap the desiredRadioId in quotes
                //     $desiredRadioId = 'answerradio' . $index;
                //     echo "var desiredRadioId = '" . $desiredRadioId . "';";
                //     echo "if (" . 0 . " == 1) {";
                //     echo "    $('#' + desiredRadioId).prop('value', 1);";
                //     echo "} else {";
                //     echo "    $('#' + desiredRadioId).prop('value', 0);";
                //     echo "}";
                //     $index++;
                // }

                echo "$('.jokerBtnDiv').attr('style', 'display: none !important');";
                echo "$('#joker1').attr('style', 'display: none !important');";
                echo "$('#joker2').attr('style', 'display: none !important');";
                echo "$('#joker3').attr('style', 'display: none !important');";

                echo "$('input[name=\'correctAnswer\']').hide();";
                // echo  "$('.jokerBtnDiv').prop('disabled', true);";
                // echo "$('input[name=\'correctAnswer\']').prop('disabled', true);";
            }
            ?>

            $('button[name^="joker"]').on('click', function() {
                $('.jokerBtnDiv').prop('disabled', true);
                $('input[type="radio"]').prop('disabled', false);

                // Get the number from the button id (assuming the id is in the format 'jokerX')
                var jokerNumber = parseInt($(this).attr('id').replace('joker', ''));

                // Disable radio buttons with value 0 based on the joker number
                $('input[type="radio"][value="0"]').slice(0, jokerNumber).each(function() {
                    var parentDiv = $(this).parent();

                    // Disable the parent div
                    parentDiv.prop('disabled', true);

                    // Get the next sibling (assuming it's the div after the parent)
                    var nextDiv = parentDiv.next();

                    // Apply strikethrough to h5 element inside nextDiv
                    nextDiv.find('h5').css('text-decoration', 'line-through');
                }).prop('disabled', true);
            });

            $('input[name="correctAnswer"]').on('click', function() {
                // Disable all radio buttons
                $('input[name="correctAnswer"]').prop('disabled', true);

                // Enable only the clicked radio button
                $(this).prop('disabled', false);

                // Get the value of the clicked radio button
                var selectedValue = $(this).val();

                // Display an alert based on the selected value
                if (selectedValue == 0) {
                    var htmlContent = '<div class="alert alert-danger alert-dismissible" role="alert">' +
                        'Incorrect answer' +
                        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                    $('#authenti-inner').append(htmlContent);
                } else {
                    var htmlContent = '<div class="alert alert-success alert-dismissible" role="alert">' +
                        'Correct answer' +
                        '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>';
                    $('#authenti-inner').append(htmlContent);
                }
                // Get the h5 element with id categoryQuestion
                var categoryQuestionElement = $('#categoryQuestion');

                // Get the text content of the h5 element
                var categoryQuestionText = categoryQuestionElement.text();

                // Create a new p element
                var newParagraphElement = $('<p>');

                // Set the text content of the new p element
                newParagraphElement.text(<?php
                                            echo json_encode(isset($randomQuestionObj['description']) ? $randomQuestionObj['description'] : null);
                                            ?>);

                // Replace the h5 element with the new p element
                categoryQuestionElement.replaceWith(newParagraphElement);

            });
        });
    </script>
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <section id="component-footer">

        <footer class="footer bg-light">
            <div class="container-fluid d-flex flex-md-row flex-column justify-content-between align-items-md-center gap-1 container-p-x py-3">
                <div class="mb-2 mb-md-0">
                    ©
                    <script>
                        document.write(new Date().getFullYear());
                    </script>, All Copyrights reserved
                </div>
                <div>
                    <!-- <a href="logout.php" class="btn btn-sm btn-outline-danger"><i class="bx bx-log-out-circle me-1"></i>Logout</a> -->
                </div>
            </div>
        </footer>
    </section>
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../assets/vendor/js/menu.js"></script>

    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <!-- <script async defer src="https://buttons.github.io/buttons.js"></script> -->
</body>

</html>