<?php include('include/config.php'); ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PHP CRUD - Book List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Book Shop</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>


                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>


    <div class="container my-5">
        <h1>Book List</h1>
        <a href="book_entry.php"><button class="btn btn-sm btn-info my-2">Add New Book</button></a>

        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>TITLE</th>
                    <th>AUTHOR</th>
                    <th>PRICE</th>
                    <th>ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM books";
                try {
                    $stmt = $conn->query($sql);
                    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    if (count($result) > 0) {
                        foreach ($result as $row) {
                ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['author']; ?></td>
                        <td><?php echo $row['price']; ?></td>
                        <td style="width:150px;">
                            <a href="book_edit.php?id=<?php echo $row['id']; ?>"><button class="btn btn-sm btn-success">Update</button></a>
                            <a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Do you want to delete?')"><button class="btn btn-sm btn-danger">Delete</button></a>
                        </td>
                    </tr>

                <?php     
}}} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}  ?>
            </tbody>
        </table>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

</body>

</html>