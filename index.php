<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <?php 
    require_once("nav_client.php");
    require_once("dbconnection.php");
    require_once("AnonymousCart.php");
    $db=new dbconnection();
    $user=new AnonymousCart();

     $user->GetUserID();
    
    if (!isset($_GET["cid"])) {

        ?>
        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">SHOPPING-CATEGORY</h1>
                <p class="lead text-muted mb-0">
                    Over the past several years, ecommerce has transformed how people buy and sell online. The Internet provides a fast and easy way for people to purchase things without having to visit an actual store. An online store can reach customers anywhere in the world. In fact, online shopping has become so popular that many vendors sell only online with no physical location. Ecommerce also facilitates the purchase of digital media such as downloadable music and movies: with no physical product, vendors can boast truly instant delivery.
                </p>
            </div>
        </section>
    <?php  }else{
        echo "<br/>";
    } ?>

    <div class="container">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="category.html">Category</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sub-category</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-3">
                <div class="card bg-light mb-3">
                    <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-list"></i> Categories</div>
                    <ul class="list-group category_block">
                        <?php
                        $result=$db->QueryTable("select * from category");
                        while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
                            $att=null;
                            if (isset($_GET["cid"])) {
                                if ($_GET["cid"]==$row['cat_id']) {
                                    $att="active";
                                }
                            }
                            ?>

                            <li class="list-group-item <?php echo $att;  ?>">
                                <a href="index.php?cid=<?php echo $row['cat_id']; ?>">
                                    <?php echo $row['cat_name']; ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>

                </div>
                <div class="col">
                    <div class="row">

                        <?php
                        $qry="select * from product";
                        if (isset($_GET["cid"])) {
                            $qry .=" where cat_id=".$_GET["cid"];
                        }
                        $result=$db->QueryTable($qry);
                        while ($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {

                            ?>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card">
                                    <img class="card-img-top" src="images/<?php echo $row['photo']; ?>" alt="Card image cap" style=" height: 150px;
                                    width: 254px;">
                                    <div class="card-body">
                                        <h4 class="card-title"><a href="product.html" title="View Product"><?php echo $row['pname']; ?></a></h4>
                                        <p class="card-text"><?php echo $row['descrption']; ?></p>
                                        <div class="row">
                                            <div class="col">
                                                <p class="btn btn-danger btn-block"><?php echo $row['price']; ?> &#8377</p>
                                            </div>
                                            <div class="col">
                                                <a href="#" class="btn btn-success btn-block">Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>


                    <!-- <div class="col-12">
                        <nav aria-label="...">
                            <ul class="pagination">
                                <li class="page-item disabled">
                                    <a class="page-link" href="#" tabindex="-1">Previous</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active">
                                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                    </div> -->
                </div>
            </div>

        </div>
    </div>



    <?php require_once("client_footer.php") ?>
</body>
</html>

