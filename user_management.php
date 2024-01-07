<?php require "header.php" ?>
<?php require "navbar.php" ?>
<?php 
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
    header("Location: erstekategorie.php ");
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
                    <div class="layout-demo-wrapper d-flex flex-row-reverse p-3">
                        <div>
                            <a class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#addCategoryModal"><i class="bx bx-user"></i>Add User</a>
                            <!-- addCategoryModal -->
                            <div class="modal fade" id="addCategoryModal" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="" method="post">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="modalCenterTitle">Add User</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="AddnameWithTitle" class="form-label">Full Name</label>
                                                        <input type="text" id="addFullname" name="full_name" class="form-control" placeholder="Enter Full Name" required />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="AddemailWithTitle" class="form-label">Email</label>
                                                        <input type="email" id="addEmail" name="email" class="form-control" placeholder="Enter User Email" required />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <label for="AddpasswordWithTitle" class="form-label">Password</label>
                                                        <input type="password" id="addPassword" name="password" class="form-control" placeholder="Enter User Password" required />
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col mb-3">
                                                        <div class="mb-3">
                                                            <label for="addRole" class="form-label">Role</label>
                                                            <select id="addRole" name="role" class="form-select">
                                                                <option value="user">User</option>
                                                                <option value="admin">Admin</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                                <button type="submit" class="btn btn-primary" name="addUser">Add User</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- EndaddCategoryModal -->
                        </div>
                    </div>

                    <!-- EDIT Modal -->
                    <div class="modal fade" id="editCategoryModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="" method="post">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalCenterTitle">Edit Category</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" id="editpk" name="pk" class="form-control" required />
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="AddnameWithTitle" class="form-label">Full Name</label>
                                                <input type="text" id="editFullname" name="full_name" class="form-control" placeholder="Enter Full Name" required />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="AddemailWithTitle" class="form-label">Email</label>
                                                <input type="email" id="editEmail" name="email" class="form-control" placeholder="Enter User Email" required />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="AddpasswordWithTitle" class="form-label">Password</label>
                                                <input type="password" id="editPassword" name="password" class="form-control" placeholder="Enter User Password" required />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <div class="mb-3">
                                                    <label for="editRole" class="form-label">Role</label>
                                                    <select id="editRole" name="role" class="form-select">
                                                        <option value="user">User</option>
                                                        <option value="admin">Admin</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="submit" class="btn btn-primary" name="editUser">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <!-- Delete Modal -->
                    <div class="modal fade" id="deleteCategoryModal" tabindex="-1" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="" method="post">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalCenterTitle">Delete Category</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <input type="hidden" id="deletepk" name="pk" class="form-control" required />
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="AddnameWithTitle" class="form-label">Full Name</label>
                                                <input type="text" id="deleteFullname" name="full_name" class="form-control" placeholder="Enter Full Name" disabled />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="AddemailWithTitle" class="form-label">Email</label>
                                                <input type="email" id="deleteEmail" name="email" class="form-control" placeholder="Enter User Email" disabled />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <label for="AddpasswordWithTitle" class="form-label">Password</label>
                                                <input type="password" id="deletePassword" name="password" class="form-control" placeholder="Enter User Password" disabled />
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col mb-3">
                                                <div class="mb-3">
                                                    <label for="deleteRole" class="form-label">Role</label>
                                                    <select id="deleteRole" name="role" class="form-select" disabled>
                                                        <option value="user">User</option>
                                                        <option value="admin">Admin</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                            Close
                                        </button>
                                        <button type="submit" class="btn btn-primary" name="deleteUser">Confirm</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>



                    <!-- Bootstrap Table with Header - Dark -->
                    <div id="authenti-inner"></div>
                    <div class="card">
                        <h5 class="card-header" style="background-color: #696cff; color: white;">User ListView</h5>


                        <div class="table-responsive text-nowrap">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sno</th>
                                        <th><i class='bx bx-user'></i>UserList</th>
                                        <th><i class='bx bx-envelope'></i>Email</th>
                                        <th><i class='bx bx-category'></i>Role</th>
                                        <th><i class='bx bx-detail'></i>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    <?php
                                    // $query = "SELECT * FROM user ORDER BY CASE WHEN role = 'Admin' THEN 0 ELSE 1 END, pk DESC";
                                    $query = "SELECT * FROM User ORDER BY pk DESC";
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
                                                <span class="fw-medium"><?php echo ucwords($row['full_name']) ?></span>
                                            </td>
                                            <td>
                                                <!-- <i class="bx bxl-angular bx-sm text-danger me-3"></i> -->
                                                <span class="fw-medium"><?php echo  ucwords($row['email']) ?></span>
                                            </td>
                                            <td>
                                                <!-- <i class="bx bxl-angular bx-sm text-danger me-3"></i> -->
                                                <span class="fw-medium"><?php echo ucwords($row['role']) ?></span>
                                            </td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <button data-pk="<?php echo $row['pk']; ?>" data-name="<?php echo $row['full_name']; ?>" data-email="<?php echo $row['email']; ?>" data-password="<?php echo $row['password']; ?>"  data-role="<?php echo $row['role']; ?>" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editCategoryModal"><i class="bx bx-edit-alt me-1"></i> Edit</button>
                                                        <button data-pk="<?php echo $row['pk']; ?>" data-name="<?php echo $row['full_name']; ?>" data-email="<?php echo $row['email']; ?>" data-password="<?php echo $row['password']; ?>"  data-role="<?php echo $row['role']; ?>"class="dropdown-item" data-bs-toggle="modal" data-bs-target="#deleteCategoryModal"><i class="bx bx-trash me-1"></i> Delete</button>
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
        $('#editCategoryModal').on('show.bs.modal', function(event) {
            console.log("Edit Btn Clicked");
            var button = $(event.relatedTarget);
            var pk = button.data('pk');
            var name = button.data('name');
            var email = button.data('email');
            var password = button.data('password');
            var role = button.data('role');
            $('#editpk').val(pk);
            $('#editFullname').val(name);
            $('#editEmail').val(email);
            $('#editPassword').val(password);
            $('#editRole').val(role);
            
     
        });
        $('#deleteCategoryModal').on('show.bs.modal', function(event) {
            console.log("Delete Btn Clicked");
            var button = $(event.relatedTarget);
            var pk = button.data('pk');
            var name = button.data('name');
            var email = button.data('email');
            var password = button.data('password');
            var role = button.data('role');
            $('#deletepk').val(pk);
            $('#deleteFullname').val(name);
            $('#deleteEmail').val(email);
            $('#deletePassword').val(password);
            $('#deleteRole').val(role);


        });
    });
</script>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pk = isset($_POST['pk']) ? $_POST['pk'] : null;
    $full_name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $role = mysqli_real_escape_string($conn, $_POST['role']);

    if (isset($_POST['addUser'])) {
        $query = "SELECT * FROM user WHERE email='$email'";
        $result = mysqli_query($conn, $query);
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            $errorMessage = 'Email already exist';
            echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    var htmlContent = \'<div class="alert alert-danger alert-dismissible" role="alert">\' 
                        + \'' . $errorMessage . '\' 
                        + \'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>\';
                    document.getElementById("authenti-inner").innerHTML += htmlContent;
                });
            </script>';
        } else {
            $query = "INSERT INTO user (full_name, email, password, role) 
                    VALUES ('$full_name', '$email', '$hashedPassword', '$role')";
            if (mysqli_query($conn, $query)) {
                $successMessage = 'New User Created Successfully';
                echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    var htmlContent = \'<div class="alert alert-success alert-dismissible" role="alert">\' 
                        + \'' . $successMessage . '\' 
                        + \'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>\';
                    document.getElementById("authenti-inner").innerHTML += htmlContent;
                });
                // Wait for 2000 milliseconds (2 seconds) before redirecting
                 setTimeout(function() {
                    window.location.href = "user_management.php";
                }, 2000);;

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
                        window.location.href = "erstekategories.php";
                    }, 2000);
                </script>';
            }
        }
    }
    if (isset($_POST['editUser'])) {
        $query = "UPDATE user SET full_name='$full_name',email='$email',password='$hashedPassword',role='$role' WHERE pk = $pk";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            $errorMessage = 'Error Occured while Updating';
            echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    var htmlContent = \'<div class="alert alert-danger alert-dismissible" role="alert">\' 
                        + \'' . $errorMessage . '\' 
                        + \'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>\';
                    document.getElementById("authenti-inner").innerHTML += htmlContent;
                });
            </script>';
        } else {
            $successMessage = 'User Details Updated Successfully';
            echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    var htmlContent = \'<div class="alert alert-success alert-dismissible" role="alert">\' 
                        + \'' . $successMessage . '\' 
                        + \'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>\';
                    document.getElementById("authenti-inner").innerHTML += htmlContent;
                });
                // Wait for 2000 milliseconds (2 seconds) before redirecting
                 setTimeout(function() {
                    window.location.href = "user_management.php";
                }, 2000);;

            </script>';
        }
    }
    if (isset($_POST['deleteUser'])) {
        $query = "DELETE FROM user WHERE pk = $pk";
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
            $successMessage = 'User Details Deleted Successfully';
            echo '<script>
                document.addEventListener("DOMContentLoaded", function() {
                    var htmlContent = \'<div class="alert alert-success alert-dismissible" role="alert">\' 
                        + \'' . $successMessage . '\' 
                        + \'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>\';
                    document.getElementById("authenti-inner").innerHTML += htmlContent;
                });
                // Wait for 2000 milliseconds (2 seconds) before redirecting
                 setTimeout(function() {
                    window.location.href = "user_management.php";
                }, 2000);;

            </script>';
        }
    }
}



require "footer.php" ?>