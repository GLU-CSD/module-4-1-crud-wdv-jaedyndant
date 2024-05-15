<?php
    include('core/header.php');
    
    $sql = "SELECT titel, id, afbeelding, beschrijving FROM products ORDER BY RAND() LIMIT 3";
    $result = mysqli_query($con, $sql);
  
    if (mysqli_num_rows($result) > 0) {
?>


<div class="row">
    <div class="col-12">
        <h2 class="text-center">Latest products</h2>
    </div>

    <?php 
        while ($row = mysqli_fetch_assoc($result)) {
    ?>

    <div class="col-4 mb-3">
        <div class="card w-100">
            <img src="<?php echo $row['afbeelding']; ?>" class="card-img-top" alt="...">

            <div class="card-body">
                <h5 class="card-title"><?php echo $row['titel']; ?></h5>
                <p class="card-text">&euro; 39,99</p>
                <a href="product.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">order</a>
            </div>
        </div>
    </div>

    <?php
        }
    ?>
    <div class="col-12 text-center">
        <a href="products.php" class="btn btn-info">SHOW ALL products</a>
    </div>    
</div>

<?php
    }
    include('core/footer.php');
?>
