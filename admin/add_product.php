<?php 
require('../functions.php');
if ($_POST) {
    // Retrieving form data
    $productName = $_POST['productName'];
    $price = $_POST['price'];
    $shortDescription = $_POST['shortDescription'];
    $imageUrl = $_POST['imageUrl'];
    $stock = $_POST['stock'];
    $category = $_POST['category'];
    $subCategory = $_POST['subCategory'];
    $isAlcoholic = $_POST['isAlcoholic'];
    $salePrice = $_POST['salePrice'];
    $labels = $_POST['labels'];
    $isFeatured = $_POST['isFeatured'];

    $sql = "INSERT INTO products (name, price, short_desc, img_url, stock, category, sub_category, is_alcohol, sale_price, labels, is_featured)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("ssssisssiss", $productName, $price, $shortDescription, $imageUrl, $stock, $category, $subCategory, $isAlcoholic, $salePrice, $labels, $isFeatured);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<h2>Product Details Inserted Successfully</h2>";
    } else {
        echo "Error: " . $sql . "<br>" . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Product Details Form</title>
  <link rel="shortcut icon" href=".././favicon.svg" type="image/svg+xml">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    /* Add your custom styles here */
    body {
      background-color: #000;
      color: #fff;
    }
    .form-container {
      max-width: 600px;
      margin: 50px auto;
      background-color: #495057;
      padding: 20px;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      opacity: 0.8;
    }
    .form-group label {
      color: #dee2e6;
    }
    .form-control {
      background-color: #6c757d;
      color: #fff;
      border: 1px solid #6c757d;
    }
    .form-control:focus {
      background-color: #495057;
      border: 1px solid #495057;
      color: #fff;
    }
    .btn-primary {
      background-color: #007bff;
      border-color: #007bff;
    }
    .btn-primary:hover {
      background-color: #0056b3;
      border-color: #0056b3;
    }
  </style>
</head>
<body>

<div class="container form-container">
  <h2 class="mb-4">Add Product</h2>
  <form action="" method="post">
    <div class="form-group">
      <label for="productName">Product Name</label>
      <input type="text" class="form-control" id="productName" name="productName" required>
    </div>
    <div class="form-group">
      <label for="price">Price</label>
      <input type="text" class="form-control" id="price" name="price" required>
    </div>
    <div class="form-group">
      <label for="shortDescription">Short Description (max 250 characters)</label>
      <textarea class="form-control" id="shortDescription" name="shortDescription" rows="3" maxlength="250" required></textarea>
    </div>
    <div class="form-group">
      <label for="imageUrl">Image URL</label>
      <input type="text" class="form-control" id="imageUrl" name="imageUrl" required>
    </div>
    <div class="form-group">
      <label for="stock">Stock</label>
      <input type="number" class="form-control" id="stock" name="stock" required>
    </div>
    <div class="form-group">
      <label for="category">Category</label>
      <input type="text" class="form-control" id="category" name="category" required>
    </div>
    <div class="form-group">
      <label for="subCategory">Sub Category</label>
      <input type="text" class="form-control" id="subCategory" name="subCategory">
    </div>
    <div class="form-group">
      <label for="isAlcoholic">Is Alcoholic</label>
      <select class="form-control" id="isAlcoholic" name="isAlcoholic" required>
      <option value="0">No</option>
        <option value="1">Yes</option>
      </select>
    </div>
    <div class="form-group">
      <label for="salePrice">Sale Price</label>
      <input type="text" class="form-control" id="salePrice" name="salePrice">
    </div>
    <div class="form-group">
      <label for="labels">Labels</label>
      <input type="text" class="form-control" id="labels" name="labels">
    </div>
    <div class="form-group">
      <label for="isFeatured">Is Featured</label>
      <select class="form-control" id="isFeatured" name="isFeatured" required>
      <option value="0">No</option>  
      <option value="1">Yes</option>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
