<nav class="navbar navbar-example navbar-expand-lg navbar-dark" style="background-color: #696cff;">
    <div class="container-fluid">
        <a class="navbar-brand" href="javascript:void(0)">
            <img src="https://www.domain.de/_img/logos/head_normal.png" alt="logo.png" class="img-fluid" style="width: 100px; height: auto;">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-ex-3">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbar-ex-3">
            <div class="navbar-nav me-auto">
                <a class="nav-item nav-link active" href="home.php">Home</a>
                <?php
                if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'user') {
                    echo '<a class="nav-item nav-link active" href="javascript:void(0)">Home</a>';
                }
                if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin') {
                    echo '<a class="nav-item nav-link" href="user_management.php">user management</a>';
                    echo '<a class="nav-item nav-link" href="erstekategories.php">erstekategorie</a>';
                }
                if (!isset($_SESSION['user'])) {
                    echo '<a class="nav-item nav-link" href="signup.php">Registration</a>';
                }
                ?>
            </div>
            <?php if (!isset($_SESSION['user'])) : ?>
                <form onsubmit="return false">
                    <button class="btn btn-light btn-sm" type="button" onclick="redirectToLoginPage()">Login</button>
                </form>
            <?php endif; ?>

            <?php if (isset($_SESSION['user'])) : ?>
                <div>
                    <a href="logout.php" class="btn btn-sm btn-danger"><i class="bx bx-log-out-circle me-1"></i>Logout</a>
                </div>
            <?php endif; ?>


        </div>
    </div>
</nav>
<script>
    function redirectToLoginPage() {
        // Perform the redirection to the login page
        window.location.href = 'index.php';
    }

    function redirectToLoginPage() {
        // Perform the redirection to the login page
        window.location.href = 'logout.php';
    }
</script>