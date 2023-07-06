<?php include "include/config.php"; ?>
<?php 
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // Retrieve the user data from the database
    $stmt = $conn->prepare("SELECT * FROM books WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
}
// Handle form submission for updating the user
if (isset($_POST['submit'])) {
   $id = $_POST['id'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $price = $_POST['price'];

    // Update the user record in the database
    $stmt = $conn->prepare("UPDATE books SET title = :title, author = :author, price = :price WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':author', $author);
    $stmt->bindParam(':price', $price);
    $stmt->execute();

    // Redirect to the main page after updating
      header("Location: book_list.php");
  }


?>
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
        <h1>Edit Book</h1>
        <form method="post" action="book_edit.php">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>"/>
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" id="title" value="<?php echo $row['title'];  ?>" placeholder="Enter Book Title">
          </div>
          <div class="mb-3">
            <label for="author" class="form-label">Author</label>
            <input type="text" class="form-control" name="author" id="author"  value="<?php echo $row['author']; ?>" placeholder="Enter Book Author">
          </div>
          <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" name="price" id="price"  value="<?php echo $row['price']; ?>" placeholder="Enter Book Price">
          </div>
          
          <button type="submit" class="btn btn-primary" name="submit">Submit</button>
        </form>
        </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  
</body>
</html>