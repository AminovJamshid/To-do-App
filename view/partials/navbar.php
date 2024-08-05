<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="/">TODO App</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                <?php if ($_SESSION['email']): ?>
                    <a class="nav-link" href="/todos">Todo list</a>
                    <?php endif; ?>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/notes">Notes</a>
                </li>
            </ul>
            <?php if (isset($_SESSION['email'])) : ?>
                <?php echo $_SESSION['email']; ?>
                <a href="/logout" class="btn btn-outline-danger mx-2">Logout</a>
            <?php else : ?>
                <a href="/login" class="btn btn-outline-primary mx-2">Login</a>
                <a href="/register" class="btn btn-outline-success">Register</a>
            <?php endif; ?>
        </div>
    </div>
</nav>
