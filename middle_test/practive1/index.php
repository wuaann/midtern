<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="Description" content="Enter your description here"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="style.css">

    <title>Validation</title>
</head>
<body>
<?php
error_reporting(0);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $errors = array(
        'name' => "",
        'phone' => "",
        'email' => "",
        'content' => ""
    );
    if (!empty($_POST['name'])) {
        if (!preg_match("/^([a-vxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđ]+)((\s{1}[a-vxyỳọáầảấờễàạằệếýộậốũứĩõúữịỗìềểẩớặòùồợãụủíỹắẫựỉỏừỷởóéửỵẳẹèẽổẵẻỡơôưăêâđ]+){1,})+$/",mb_strtolower($_POST['name']))) {
            $errors['name'] = "Tên không được chứa kí tự đặc biệt";
        }
        else {
            $contact_name = $_POST['name'];
        }

    }
    else {
        $errors['name']='Bắt buộc phải nhập tên';
    }

    if (!empty($_POST['phoneNumber'])) {
        if (!preg_match('/^[0-9]{10}+$/', $_POST['phoneNumber'])) {
            $errors['phone'] = "Số điện thoại không xác định";
        }
        else {
            $contact_phone = $_POST['phoneNumber'];
        }

    }
    else {
        $errors['phone']='Bắt buộc phải nhập số điện thoại';
    }

    if (!empty($_POST['email'])) {
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Không đúng định dạng email";
        }
        else {
            $contact_email = $_POST['email'];
        }

    }
    else {
        $errors['email']='Bắt buộc phải nhập email';
    }
}

if (!empty ($errors)) {
    $mess="Thông tin liên hệ không chính xác";
    ?>
    <div class="error_message">
        <?php echo $mess?>
    </div>

    <?php
}
else{
    echo '<div> Họ và tên: '.$contact_name . '</div>';
    echo '<div> Số điện thoại: '.$contact_phone.'</div>';
    echo '<div> Email: '.$contact_email. '</div>';

    ?>

<?php  } ?>

<div class="contact-container">
    <div class="right-content">
        <h3>Liên hệ</h3>
    </div>
    <div class="left-content">
        <form action="" method="post" class="form">
            <div class="form-group">
                <label for="">
                    <input id="my-input" class="form-control" type="text" name="name" placeholder="Họ và tên">
                    <?php if (!empty($errors) && $errors['name']!=""): ?>
                        <span class="error"><?php echo $errors['name']?></span>
                    <?php endif; ?>
                </label>
            </div>
            <div class="form-group">
                <label for="">
                    <input id="my-input" class="form-control" type="text" name="phoneNumber" placeholder="Điện thoại">
                    <?php if (!empty($errors) && $errors['phone']!=""): ?>
                        <span class="error"><?php echo $errors['phone']?></span>
                    <?php endif; ?>
                </label>
                <label for="">
                    <input id="my-input" class="form-control" type="text" name="email" placeholder="Email">
                    <?php if (!empty($errors) && $errors['email']!="" ): ?>
                        <span class="error"><?php echo $errors['email']?></span>
                    <?php endif; ?>
                </label>
            </div>
            <div class="form-group">
                <label for="">
                    <input id="my-input" class="form-control" type="text" name="content" placeholder="Nội dung">
                </label>
            </div>
            <input type="submit" name="submit" value="Gửi đi">
        </form>
    </div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.0/js/bootstrap.min.js"></script>
</body>
</html>