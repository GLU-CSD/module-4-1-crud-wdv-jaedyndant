<?php
    include('core/header.php');
    
    $sql = "SELECT titel, id, afbeelding, beschrijving, prijs FROM products ORDER BY titel ASC";
    $result = mysqli_query($con, $sql);
  
    if (mysqli_num_rows($result) > 0) {
?>

<div class="row">
    <div class="col-12">
        <h2 class="text-center">Shopee products</h2>
    </div>
    
    <?php 
        while ($row = mysqli_fetch_assoc($result)) {
    ?>

    <div class="col-4 mb-3">
        <div class="card w-100">
            <img src="./assets/img/<?php echo $row['afbeelding']; ?>" class="card-img-top img-fluid" alt="..." style="height: 200px; object-fit: cover;">

            <div class="card-body">
                <h5 class="card-title"><?php echo $row['titel']; ?></h5>
                <p class="card-text">&euro; <?php echo $row['prijs']; ?></p> 
                <a href="product.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">order</a>
            </div>
        </div>
    </div>

    <?php
        }
    ?>
</div>

<?php
    }
    include('core/footer.php');
?>
