<?php require "header.php" ?>
<?php require "navbar.php" ?>
<?php
if (isset($_SESSION['user'])) {
    header("Location: erstekategorie.php ");
    exit();
}
?>
<div class="container-xxl">

    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner">
            <!-- Register -->
            <div class="card">
                <div class="card-body">
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
                    <div id="authenti-inner"></div>
                    <h4 class="mb-2">Welcome to Domain.De! 👋</h4>
                    <p class="mb-4">Please sign-in to your account</p>

                    <form id="formAuthentication" class="mb-3" action="index.php" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email or Username</label>
                            <input value="<?php echo (isset($_COOKIE['email']) ? $_COOKIE['email'] : null); ?>" type="email" class="form-control" id="email" name="email" placeholder="Enter your email or username" autofocus />
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="password">Password</label>
                                <!-- <a href="auth-forgot-password-basic.html">
                                    <small>Forgot Password?</small>
                                </a> -->
                            </div>
                            <div class="input-group input-group-merge">
                                <input value="<?php echo (isset($_COOKIE['password']) ? $_COOKIE['password'] : null); ?>" type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="remember-me" />
                                <label class="form-check-label" for="remember-me-label"> Remember Me </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary d-grid w-100" id="btnLogin" name="btnLogin">Sign in</button>
                        </div>
                    </form>
                    <p class="text-center">
                        <span>New on our platform?</span>
                        <a href="signup.php">
                            <span>Create an account</span>
                        </a>
                    </p>

                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
</div>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // The form has been submitted
    if (isset($_POST['btnLogin'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $query = "SELECT * FROM user WHERE email='$email'";
        $result = mysqli_query($conn, $query);
        $count = mysqli_num_rows($result);
        if ($count > 0) {
            $user = mysqli_fetch_assoc($result);
            if (password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user;
                if (isset($_POST['remember-me'])) {
                    setcookie('email', $email, time() + 30 * 24 * 3600, '/');
                    setcookie('password', $password, time() + 30 * 24 * 3600, '/');
                }
                $page_name = $_SESSION['user']['role'] == 'admin' ? 'erstekategorie' : 'home';
                $successMessage = 'User Logged in Successfully';
                echo '<script>
                    document.addEventListener("DOMContentLoaded", function() {
                        var htmlContent = \'<div class="alert alert-success alert-dismissible" role="alert">\' 
                            + \'' . $successMessage . '\' 
                            + \'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>\';
                        document.getElementById("authenti-inner").innerHTML += htmlContent;
                    });
                    // Wait for 2000 milliseconds (2 seconds) before redirecting
                    setTimeout(function() {
                        window.location.href = "' . $page_name . '.php";
                    }, 2000);
                </script>';
            } else {
                $errorMessage = 'Invalid Password';
                echo '<script>
                    document.addEventListener("DOMContentLoaded", function() {
                        var htmlContent = \'<div class="alert alert-danger alert-dismissible" role="alert">\' 
                            + \'' . $errorMessage . '\' 
                            + \'<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>\';
                        document.getElementById("authenti-inner").innerHTML += htmlContent;
                    });
                </script>';
            }
        } else {
            $errorMessage = 'Invalid Email Or Username';
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
}
// Output any error messages or other content here

?>

<?php require "footer.php" ?>