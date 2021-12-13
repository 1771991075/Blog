<link rel="stylesheet" href="/static/css/header.css" />

<?php
    $redis = new Redis();
    $redis->connect('127.0.0.1', 6379);
    $familys = $redis->smembers("familylist");
?>

<!-- 导航栏 -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="/">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/home/link.php">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <?php for ($i = 0; $i < count($familys); $i++) { ?>
                            <li>
                                <a class="dropdown-item" href="/home/link.php?family=<?php echo $familys[$i] ?>">
                                    <?php echo $familys[$i] ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/home/feedback.php">Feedback</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/home/other.php">Other</a>
                </li>
            </ul>
            <form id="search" class="d-flex">
                <a href="/admin"><button type="button" class="btn btn-outline-success me-2">Login</button></a>
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>