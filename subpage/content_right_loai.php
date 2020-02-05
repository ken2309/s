<?php
$maloai= isset($_GET['cat_id'])?$_GET['cat_id']:'';
$sql="select * from book where book_id=? ";

$stm = $obj->prepare($sql);
$stm->execute(array($maloai));
$n = $stm->rowCount();
echo "<div>Co $n ket qua </div>";
$data = $stm->fetchAll();
foreach ($data as $key => $value) 
{
   ?>
    <div class="templatemo_product_box">
    <h1><?php echo $value['book_name'] ?> </h1>
  <img src="images/sach/<?php echo $value['img'] ?>" alt="image" />
    <div class="product_info">
        <p>Etiam luctus. Quisque facilisis suscipit elit. Curabitur...</p>
      <h3>$55</h3>
        <div class="buy_now_button">
          <a href="giohang.php?book_id=<?php echo $value['book_id']; ?>">Buy Now</a>
        </div>
        <div class="detail_button">
            <a href="chitiet.php?book_id=<?php echo $value['book_id']; ?>">Detail</a></div>
    </div>
    <div class="cleaner">&nbsp;</div>
</div>
   <?php
   if ($key%2==0)
   {
     echo '<div class="cleaner_with_width">&nbsp;</div>';
   }
   else 
    echo '<div class="cleaner_with_height">&nbsp;</div>'; 
}
?>
<a href="subpage.html"><img src="images/templatemo_ads.jpg" alt="ads" /></a>
