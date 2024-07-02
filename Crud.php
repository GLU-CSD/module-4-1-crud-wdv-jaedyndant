<?php
include "core/db_connect.php";

if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true; // Set $update to true
    $record = mysqli_query($con, "SELECT * FROM products WHERE id=$id");
    
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>CRUD: CReate, Update, Delete PHP MySQL</title>
    <link rel="stylesheet" type="text/css" href="admin/assets/css/style.css">
</head>

<body>
    <?php if (isset($_SESSION['message'])) : ?>
        <div class="msg">
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']);
            ?>
        </div>
    <?php endif ?>

    <table>
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Product Image</th>
                <th>Product Price</th>
                <th>Product ID</th>
                <th>Product Description</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>

        <?php
        $query = "SELECT * FROM products";
        $results = mysqli_query($con, $query);

        if ($results) {
            while ($row = mysqli_fetch_array($results)) {
        ?>
                <tr>
                    <td><?php echo $row['titel']; ?></td>
                    <td><?php echo $row['afbeelding']; ?></td>
                    <td><?php echo $row['prijs']; ?></td>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['beschrijving']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $row['id']; ?>" class="edit_btn">Edit</a>
                    </td>
                    <td>
                        <a href="delete.php?id=<?php echo $row['id']; ?>" class="del_btn">Delete</a>
                    </td>
                </tr>
        <?php
            }
        } else {
            echo "Error: " . mysqli_error($con);
        }
        ?>
    </table>

    <form method="post" action="create.php"> <!-- Assuming 'create.php' is for creating new records -->
        <div class="input-group">
            <label>titel</label>
            <input type="text" name="titel" value="">
        </div>
        <div class="input-group">
            <label>afbeelding</label>
            <input type="text" name="afbeelding" value="">
        </div>
        <div class="input-group">
            <label>prijs</label>
            <input type="text" name="prijs" value="">
        </div>
        <div class="input-group">
            <label>id</label>
            <input type="text" name="id" value="">
        </div>
        <div class="input-group">
            <label>beschrijving</label>
            <input type="text" name="beschrijving" value="">
        </div>
        <?php if ($update == true) : ?>
            <!-- Show update button if $update is true -->
            <button class="btn" type="submit" name="update" style="background: #556B2F;">Update</button>
        <?php else : ?>
            <!-- Show save button if $update is false (not editing) -->
            <button class="btn" type="submit" name="save" style="background: #556B2F;">Save</button>
        <?php endif ?>
    </form>
  
</body>

</html>
