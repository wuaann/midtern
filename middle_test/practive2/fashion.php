<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
          integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <link rel="stylesheet" href="style.css">
    <title>dienthoai</title>
</head>

<body><?php
error_reporting('0');
include 'data.php';
$list_product = $data;

$nu = '';
$moi = '';


for ($i = 0; $i < count($list_product); $i++) {
    if ($list_product[$i]['status'] == '1') {
        $nu = $nu . '<div class="card">';
        $nu = $nu . '<div class="card-top">';
        $nu = $nu . '<img src="' . $list_product[$i]['img'] . '" alt="">';
        $nu = $nu . '<p class="des">' . $list_product[$i]['des'] . '</p></div>';
        $nu = $nu . '<div class="card-body">';
        $nu = $nu . '<p class="product-name"> ' . $list_product[$i]['name'] . '</p>';
        $nu = $nu . '<div class="prices">';
        $dis = $list_product[$i]['dis'];
            $nu = $nu .'<p class="product-price">' . $list_product[$i]['price']. '</p>';
            $nu = $nu . '<p class="product-discount">'.$list_product[$i]['price'].'<span>VND</span></p></div></div>';

        $nu = $nu . '<button class="mua" onclick="tb()">Buy Now</button>';
        $nu = $nu . '</div>';


    } else {
        $moi = $moi . '<div class="card">';
        $moi = $moi . '<div class="card-top">';
        $moi = $moi . '<img src="' . $list_product[$i]['img'] . '" alt="">';
        $moi = $moi . '<p class="des">' . $list_product[$i]['des'] . '</p></div>';
        $moi = $moi . '<div class="card-body">';
        $moi = $moi . '<p class="product-name"> ' . $list_product[$i]['name'] . '</p>';
        $moi = $moi . '<div class="prices">';
        $moi = $moi . '<p class="product-price">' . $list_product[$i]['price'] . '</p>';
        $moi = $moi . '<p class="product-discount">20.000.000<span>VND</span></p></div></div>';
        $moi = $moi . '<button class="mua" onclick="tb()"  >Buy Now</button>';
        $moi = $moi . '</div>';
    }
}



?>

<div class="container">
    <p class="text1">Thoi Trang Nu</p>
    <div class="noibat">
            <?php echo $nu?>
    </div>


    <p class="text">Thoi Trang Nam</p>
    <div class="spmoi">
        <?php echo $moi ?>

    </div>
</div>
</body>
<script>
    const tb = () => {
      alert('thanks you your order');
    }
</script>
</html>