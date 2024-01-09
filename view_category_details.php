<?php require "header.php" ?>
<?php require "navbar.php" ?>
<?php
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
    header("Location: erstekategorie.php ");
    exit();
}
if (!isset($_GET['cat_pk'])) {
    header("Location: erstekategories.php ");
    exit();
}
?>
<div class="layout-wrapper layout-content-navbar layout-without-menu">
    <div class="layout-container">
        <!-- Layout container -->
        <div class="layout-page">

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->

                <div class="container-xxl flex-grow-1 container-p-y">
                    <!-- Layout Demo -->
                    <!-- <div class="layout-demo-wrapper d-flex flex-row-reverse p-3">
                        <div>
                            <a class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#addCategoryModal"><i class="bx bx-category"></i>Add Category</a>

                        </div>
                    </div> -->
                    <!-- addCategoryModal -->
                    <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="" method="post">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalCenterTitle">Add Category</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="nameWithTitle" class="form-label">Category Name</label>
                                                <input type="text" id="nameWithTitle" name="category_name" class="form-control" placeholder="Enter Category" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="submit" class="btn btn-primary" name="addCategory">Add</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- EndaddCategoryModal -->

                    <!-- Question Modal -->
                    <div class="modal fade" id="editQuestionModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="" method="post">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="viewCategorymodalCenterTitle">Edit Question</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col mb-3">
                                                <input type="hidden" name="view_category_pk" id="view_category_pk" required/>
                                                <label for="nameWithTitle" class="form-label">Question</label>
                                                <input type="text" id="category_question" name="category_question" class="form-control" placeholder="Enter Question Here" required />
                                            </div>
                                        </div>
                                        <label for="nameWithTitle" class="form-label">Answers</label>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-1 mb-3">
                                                <input name="correctAnswer" class="form-check-input" type="radio" value="answer1" id="defaultRadio1">
                                            </div>
                                            <div class="col-11 mb-3">
                                                <input type="hidden" id="answerID1" name="answerID1" class="form-control" placeholder="Enter First answer Here" required />
                                                <input type="text" id="answer1" name="answer1" class="form-control" placeholder="Enter First answer Here" required />
                                            </div>
                                        </div>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-1 mb-3">
                                                <input name="correctAnswer" class="form-check-input" type="radio" value="answer2" id="defaultRadio2">
                                            </div>
                                            <div class="col-11 mb-3">
                                                <input type="hidden" id="answerID2" name="answerID2" class="form-control" placeholder="Enter First answer Here" required />
                                                <input type="text" id="answer2" name="answer2" class="form-control" placeholder="Enter Second answer Here" required />
                                            </div>
                                        </div>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-1 mb-3">
                                                <input name="correctAnswer" class="form-check-input" type="radio" value="answer3" id="defaultRadio3">
                                            </div>
                                            <div class="col-11 mb-3">
                                                <input type="hidden" id="answerID3" name="answerID3" class="form-control" placeholder="Enter First answer Here" required />
                                                <input type="text" id="answer3" name="answer3" class="form-control" placeholder="Enter Third answer Here" required />
                                            </div>
                                        </div>
                                        <div class="row d-flex align-items-center">
                                            <div class="col-1 mb-3">
                                                <input name="correctAnswer" class="form-check-input" type="radio" value="answer4" id="defaultRadio4">
                                            </div>
                                            <div class="col-11 mb-3">
                                                <input type="hidden" id="answerID4" name="answerID4" class="form-control" placeholder="Enter First answer Here" required />
                                                <input type="text" id="answer4" name="answer4" class="form-control" placeholder="Enter Fourth answer Here" required />
                                            </div>
                                        </div>

                            
                                        <div class="row d-flex align-items-center">
                                            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                                            <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="3" required></textarea>
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="submit" class="btn btn-primary" name="addQuestion">Add Question</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Delete Modal -->
                    <div class="modal fade" id="deleteQuestionModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="" method="post">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalCenterTitle">Delete Category</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label id="deleteQuestionTitle" for="deleteQuestionTitle" class="form-label">Category Name</label>
                                                <input type="hidden" name="delete_category_pk" id="delete_category_pk" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="submit" class="btn btn-primary" name="deleteQuestionbtn">Confirm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>



                    <!-- Bootstrap Table with Header - Dark -->
                    <div id="authenti-inner"></div>
                    <div class="card">
                        <?php
                        $query = "SELECT * FROM category WHERE pk = " . $_GET['cat_pk'];
                        $result = mysqli_query($conn, $query);
                        $obj = mysqli_fetch_assoc($result);

                        ?>
                        <h5 class="card-header" style="background-color: #696cff; color: white;"><?php echo isset($obj['name']) ? $obj['name'] : null; ?>'s Question ListView</h5>


                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sno</th>
                                        <th><i class='bx bx-category'></i>Question List</th>
                                        <th><i class='bx bx-category'></i>Answer 01</th>
                                        <th><i class='bx bx-category'></i>Answer 02</th>
                                        <th><i class='bx bx-category'></i>Answer 03</th>
                                        <th><i class='bx bx-category'></i>Answer 04</th>
                                        <th><i class='bx bx-detail'></i>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <?php
                                    // $query = "SELECT * FROM user ORDER BY CASE WHEN role = 'Admin' THEN 0 ELSE 1 END, pk DESC";
                                    $query = "SELECT * FROM category_question WHERE category_id = " . $_GET['cat_pk'] . " ORDER BY pk DESC";
                                    $result = mysqli_query($conn, $query);
                                    $index = 1;
                                    ?>
                                    <?php while ($row = mysqli_fetch_array($result)) {
                                    ?>
                                        <tr>
                                            <td>
                                                <!-- <i class="bx bxl-angular bx-sm text-danger me-3"></i> -->
                                                <span class="fw-medium"><?php echo $index++ ?></span>
                                            </td>
                                            <td>
                                                <!-- <i class="bx bxl-angular bx-sm text-danger me-3"></i> -->
                                                <span class="fw-medium"><?php echo $row['question'] ?></span>
                                            </td>
                                            <?php
                                            // $query = "SELECT * FROM user ORDER BY CASE WHEN role = 'Admin' THEN 0 ELSE 1 END, pk DESC";
                                            $query = "SELECT * FROM answer WHERE question_id = " . $row['pk'] . " ORDER BY pk ASC";
                                            $ans_result = mysqli_query($conn, $query);
                                            while ($ans_row = mysqli_fetch_array($ans_result)) {
                                            ?>
                                                <td>
                                                    <!-- <i class="bx bxl-angular bx-sm text-danger me-3"></i> -->
                                                    <span class="fw-medium"><?php echo $ans_row['answer'] ?></span>
                                                </td>
                                            <?php
                                            }
                                            ?>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <button data-pk="<?php echo $row['pk']; ?>" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editQuestionModal"><i class="bx bx-edit-alt me-1"></i> Edit</button>
                                                        <button data-pk="<?php echo $row['pk']; ?>" data-name="<?php echo $row['question']; ?>" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteQuestionModal"><i class="bx bx-trash me-1"></i> Delete</button>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>
</div>
<script>
    $(document).ready(function() {
        console.log("Ready");
        $('#deleteQuestionModal').on('show.bs.modal', function(event) {
            console.log("Delete Question Clicked");
            var button = $(event.relatedTarget);
            var pk = button.data('pk');
            var name = button.data('name');
            $('#delete_category_pk').val(pk); // Assuming 'pk' is a key in your fetched data
            $('#deleteQuestionTitle').text('Do you want to delete this Question "' + name + '"');

        });
        $('#editQuestionModal').on('show.bs.modal', function(event) {
            console.log("Add Question Btn added");
            var button = $(event.relatedTarget);
            var pk = button.data('pk');
            createCookieSeconds("question_id", pk, 10);

            var currentUrl = new URL(window.location.href);
            if (currentUrl.searchParams.has('question_id')) {
                currentUrl.searchParams.set('question_id', pk);
            } else {
                currentUrl.searchParams.append('question_id', pk);
            }

            // Set the new URL
            window.history.replaceState({}, document.title, currentUrl.toString());

            <?php
            $question_id = isset($_GET["question_id"]) ? $_GET["question_id"] : null;
            if ($question_id) {
                $query = "SELECT * FROM category_question WHERE pk = '$question_id'";
                $result = mysqli_query($conn, $query);
                $question_obj = mysqli_fetch_assoc($result);

                $qpk = $question_obj['pk'];
                $query = "SELECT * FROM answer WHERE question_id = '$qpk' ORDER BY pk ASC";
                $result02 = mysqli_query($conn, $query);
                $rows = mysqli_fetch_all($result02, MYSQLI_ASSOC);

                $cat_id =  $_GET['cat_pk'];
                $query = "SELECT * FROM category_question WHERE category_id = '$cat_id'";
                $res = mysqli_query($conn, $query);
                $rows21 = mysqli_fetch_all($res, MYSQLI_ASSOC);
            }
            ?>
            var question_obj = <?php echo isset($question_obj) ? json_encode($question_obj) : 'null'; ?>;
            // console.log(question_obj);
            var answer_qs = <?php echo isset($rows) ? json_encode($rows) : 'null'; ?>;
            var question__qs = <?php echo isset($rows21) ? json_encode($rows21) : 'null'; ?>;
            // console.log("qs");
            // console.log(question__qs);


            if (question__qs !== null) {
                // console.log("question__qs");
                // console.log(question__qs);

                var trueQuestion = $('#trueQuestion');
                trueQuestion.empty();
                trueQuestion.append('<option value="0">No Child Question</option>');

                var falseQuestion = $('#falseQuestion');
                falseQuestion.empty();
                falseQuestion.append('<option value="0">No Child Question</option>');

                question__qs.forEach(function(question) {
                    // Create separate options for each question
                    var optionFalse = $('<option value="' + question.pk + '">' + question.question + '</option>');
                    var optionTrue = $('<option value="' + question.pk + '">' + question.question + '</option>');

                    // Check if q_id matches question.pk and set the selected attribute individually
                    if (question_obj['false_child_question'] == question.pk) {
                        optionFalse.attr('selected', 'selected');
                    }
                    falseQuestion.append(optionFalse);

                    if (question_obj['true_child_question'] == question.pk) {
                        optionTrue.attr('selected', 'selected');
                    }
                    trueQuestion.append(optionTrue);
                });
            }




            if (answer_qs !== null || question_obj !== null) {

                $("#view_category_pk").val(question_obj['pk']);
                $("#category_question").val(question_obj['question']);
                $("#exampleFormControlTextarea1").val(question_obj['description']);

                for (var i = 0; i < answer_qs.length; i++) {
                    var answerObj = answer_qs[i];
                    var id = "#answer" + (i + 1);
                    $(id).val(answerObj['answer']);
                    
                    var pkid = "#answerID"+ (i + 1);
                    $(pkid).val(answerObj['pk']);


                    if (answerObj['status'] == 1) {
                        var desiredRadioId = "defaultRadio" + (i + 1);
                        console.log(answerObj['answer'] + " anse");
                        $("#" + desiredRadioId).prop("checked", true);

                    }

                }
            }

        });

        function createCookieSeconds(name, value, seconds) {
            var expires;
            if (seconds) {
                var date = new Date();
                date.setTime(date.getTime() + (seconds * 1000));
                expires = "; expires=" + date.toGMTString();
            } else {
                expires = "";
            }
            document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
        }

        function createCookie(name, value, days) {
            var expires;
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                expires = "; expires=" + date.toGMTString();
            } else {
                expires = "";
            }
            document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
        }
    });
</script>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['addCategory'])) {
        $category_name = mysqli_real_escape_string($conn, $_POST['category_name']);
        $query = "SELECT * FROM category WHERE name='$category_name'";
        $result = mysqli_query($conn, $query);
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            $errorMessage = 'Category Exist Already';
            echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    var htmlContent = \'<div class="alert alert-danger alert-dismissible" role="alert">\' 
                        + \'' . $errorMessage . '\' 
                        + \'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>\';
                    document.getElementById("authenti-inner").innerHTML += htmlContent;
                });
            </script>';
        } else {
            $query = "INSERT INTO `category`(`name`) VALUES ('$category_name')";
            if (mysqli_query($conn, $query)) {
                $successMessage = 'Category Added Successfully';
                echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    var htmlContent = \'<div class="alert alert-success alert-dismissible" role="alert">\' 
                        + \'' . $successMessage . '\' 
                        + \'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>\';
                    document.getElementById("authenti-inner").innerHTML += htmlContent;
                });
                // Wait for 2000 milliseconds (2 seconds) before redirecting
                setTimeout(function() {
                    window.location.href = "view_category_details.php";
                }, 2000);
            </script>';
            } else {
                $successMessage = 'Unexpected Error Occurred';
                echo '<script>
                    document.addEventListener("DOMContentLoaded", function() {
                        var htmlContent = \'<div class="alert alert-danger alert-dismissible" role="alert">\' 
                            + \'' . $successMessage . '\' 
                            + \'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>\';
                        document.getElementById("authenti-inner").innerHTML += htmlContent;
                    });
                    // Wait for 2000 milliseconds (2 seconds) before redirecting
                    setTimeout(function() {
                        window.location.href = "view_category_details.php";
                    }, 2000);
                </script>';
            }
        }
    }
    if (isset($_POST['updateCategory'])) {

        $category_pk = $_POST['edit_category_pk'];
        $category_name = mysqli_real_escape_string($conn, $_POST['edit_category_name']);
        $updateQuery = "UPDATE category SET name = '$category_name' WHERE pk = '$category_pk'";
        if (mysqli_query($conn, $updateQuery)) {
            $successMessage = 'Category Updated Successfully';
            echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    var htmlContent = \'<div class="alert alert-success alert-dismissible" role="alert">\' 
                        + \'' . $successMessage . '\' 
                        + \'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>\';
                    document.getElementById("authenti-inner").innerHTML += htmlContent;
                });
                // Wait for 2000 milliseconds (2 seconds) before redirecting
                setTimeout(function() {
                    window.location.href = "view_category_details.php";
                }, 2000);
              
            </script>';
        } else {
            $errorMessage = 'Error Occured while Updating';
            echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    var htmlContent = \'<div class="alert alert-danger alert-dismissible" role="alert">\' 
                        + \'' . $errorMessage . '\' 
                        + \'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>\';
                    document.getElementById("authenti-inner").innerHTML += htmlContent;
                });
            </script>';
        }
    }
    if (isset($_POST['deleteQuestionbtn'])) {
        $category_pk = $_POST['delete_category_pk'];
        $query = "DELETE FROM category_question WHERE pk = $category_pk";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            $errorMessage = 'Error Occured while Deleting';
            echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    var htmlContent = \'<div class="alert alert-danger alert-dismissible" role="alert">\' 
                        + \'' . $errorMessage . '\' 
                        + \'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>\';
                    document.getElementById("authenti-inner").innerHTML += htmlContent;
                });
            </script>';
        } else {
            $query = "DELETE FROM answer WHERE question_id = $category_pk";
            $result = mysqli_query($conn, $query);
            $successMessage = 'Question Deleted Successfully';
            echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    var htmlContent = \'<div class="alert alert-success alert-dismissible" role="alert">\' 
                        + \'' . $successMessage . '\' 
                        + \'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>\';
                    document.getElementById("authenti-inner").innerHTML += htmlContent;
                });
                // Wait for 2000 milliseconds (2 seconds) before redirecting
                setTimeout(function() {
                    window.location.href = "view_category_details.php";
                }, 2000);
            </script>';
        }
    }

    if (isset($_POST['addQuestion'])) {
        $category_pk = $_POST['view_category_pk'];
        $category_question = $_POST['category_question'];
        $falseQuestion = 0;
        $trueQuestion = 0;
        $description = $_POST['description'];
        $correctAnswer = $_POST['correctAnswer'];
        
        $insertQuery  = "UPDATE category_question SET question = '$category_question',
            description = '$description',true_child_question = '$trueQuestion',false_child_question = '$falseQuestion'
            WHERE pk = '$category_pk'";
        
        $result = mysqli_query($conn, $insertQuery);
        $pk = mysqli_insert_id($conn);
        $i = 1;
        while ($i < 5) {
            $key = 'answer' . $i;
            $id = 'answerID' . $i;
            $ans_pk = $_POST[$id];
            $answer_status = $correctAnswer == $key ? 1 : 0;
            $answer = $_POST[$key];
            $insertAnswerQuery = "UPDATE answer SET answer = '$answer',status = '$answer_status' WHERE pk = '$ans_pk';";
            mysqli_query($conn, $insertAnswerQuery);
            $i++;
        }
        if (!$result) {
            $errorMessage = 'Error Occured while Inserting Question';
            echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    var htmlContent = \'<div class="alert alert-danger alert-dismissible" role="alert">\' 
                        + \'' . $errorMessage . '\' 
                        + \'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>\';
                    document.getElementById("authenti-inner").innerHTML += htmlContent;
                });
            </script>';
        } else {
            $successMessage = 'Question Created Successfully';
            echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    var htmlContent = \'<div class="alert alert-success alert-dismissible" role="alert">\' 
                        + \'' . $successMessage . '\' 
                        + \'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>\';
                    document.getElementById("authenti-inner").innerHTML += htmlContent;
                });
                // Wait for 2000 milliseconds (2 seconds) before redirecting
                setTimeout(function() {
                    window.location.href = "view_category_details.php";
                }, 2000);
            </script>';
        }
    }
}



require "footer.php" ?>