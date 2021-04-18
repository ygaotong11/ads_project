<?php

include 'config.php';

error_reporting(0);

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
}


/**
 * Encrypt a message
 *
 * @param string $message - message to encrypt
 * @param string $key - encryption key
 * @return string
 * @throws RangeException
 */



if (isset($_POST['submit'])) {
    $password = 'password';
	$c_id = $_POST['c_id'];
	$c_name = $_POST['c_name'];
	$c_birth = $_POST['c_birth'];
    $c_address = $_POST['c_address'];
    $dx1 = $_POST['dx1'];
    $cdr = $_POST['cdr'];
    $homehobb = $_POST['homehobb'];
	$judgement = $_POST['judgement'];
	$memory = $_POST['memory'];
	$orient = $_POST['orient'];
    $sumbox = $_POST['sumbox'];
    $MR_scanner = $_POST['MR_scanner'];
    $t1w = $_POST['t1w'];
    $t2w = $_POST['t2w'];

    $sql = "SELECT * FROM patients WHERE c_id='c_id'";
    $result = mysqli_query($conn, $sql);

    if (!$result->num_rows > 0) {

        $c_name = openssl_encrypt($c_name,"AES-128-ECB",$password);
        $c_birth = openssl_encrypt($c_birth,"AES-128-ECB",$password);
        $c_address = openssl_encrypt($c_address,"AES-128-ECB",$password);
        $dx1 = openssl_encrypt($dx1,"AES-128-ECB",$password);
        $cdr = openssl_encrypt($cdr,"AES-128-ECB",$password);
        $homehobb = openssl_encrypt($homehobb,"AES-128-ECB",$password);
        $judgement = openssl_encrypt($judgement,"AES-128-ECB",$password);
        $memory = openssl_encrypt($memory,"AES-128-ECB",$password);
        $orient = openssl_encrypt($orient,"AES-128-ECB",$password);
        $sumbox = openssl_encrypt($sumbox,"AES-128-ECB",$password);
        echo "<script>alert('here!')</script>";
        $sql = "INSERT INTO patients (c_id, c_name, c_birth, c_address,
                                      dx1, cdr, homehobb, judgement,
                                      memory, orient, sumbox, MR_scanner, t1w, t2w)
    					VALUES ('$c_id', '$c_name', '$c_birth','$c_address','$dx1','$cdr','$homehobb',
    					'$judgement','$memory','$orient','$sumbox','$MR_scanner','$t1w','$t2w' )";
    	$result = mysqli_query($link, $sql) or die(mysqli_error($link));
    	echo '<script type="text/javascript">alert("'.$result.'");</script>';
    	if ($result) {
            echo "<script>alert('Record added!')</script>";
            $c_id = "";
            $c_name = "";
            $c_birth = "";
            $c_address = "";
            $dx1 = "";
            $cdr = "";
            $homehobb = "";
            $judgement = "";
            $memory = "";
            $orient = "";
            $sumbox = "";
            $t1w = "";
            $t2w = "";
        }else {
           	echo "<script>alert('Woops! Something Wrong Went.')</script>";
           	}
    }else {
        echo "<script>alert('Woops! Record Already Exists.')</script>";

    }


}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Welcome</title>
    <style>
    a.sign_up {
        position: absolute;
        top: 30px;
        right: 90px;
        z-index: 2;
        font-size:20px;
        border-radius:0.12em;
        box-sizing: border-box;
        font-family:fantasy;
        font-weight: bold;
        font-weight: 400;
        padding:0.35em 1.2em;
        color:#FFFFFF;
        transition: all 0.2s;
        text-decoration:none;

    }
    a.sign_up:hover{
        color:#000000;
        background-color:#FFFFFF;
    }


    </style>
</head>
<body>

    <?php echo "<a class = 'sign_up' href='logout.php'> Logout " . $_SESSION['username'] . "</a>"; ?>
    <a class='sign_up' style='top:70px' href='search.php'> Look for searching?</a>
    <div class="container">
    		<form action="" method="POST" class="login-email">
                <p class="login-text" style="font-size: 2rem; font-weight: 800;">Add Record</p>
    			<div class="input-group">
    				<input type="text" placeholder="ID" name="c_id" value="<?php echo $c_id; ?>" required>
    			</div>
    			<div class="input-group">
    				<input type="text" placeholder="Name" name="c_name" value="<?php echo $c_name; ?>" required>
    			</div>
    			<div class="input-group">
    				<input type="date" placeholder="Data Birth" name="c_birth" value="<?php echo $_POST['c_birth']; ?>">
                </div>
                <div class="input-group">
    				<input type="text" placeholder="Address" name="c_address" value="<?php echo $_POST['c_address']; ?>">
    			</div>
    			<div class="input-group">
                    <input type="text" placeholder="AD Dementia" name="dx1" value="<?php echo $dx1; ?>" required>
                </div>
                <div class="input-group">
                    <input type="number" placeholder="cdr" name="cdr" value="<?php echo $cdr; ?>" required>
                </div>
                <div class="input-group">
                    <input type="number" placeholder="homehobb" name="homehobb" value="<?php echo $_POST['homehobb']; ?>" required>
                </div>
                <div class="input-group">
                     <input type="number" placeholder="judgement" name="judgement" value="<?php echo $_POST['judgement']; ?>" required>
                </div>
                <div class="input-group">
                    <input type="number" placeholder="memory" name="memory" value="<?php echo $_POST['memory']; ?>" required>
                </div>
                <div class="input-group">
                    <input type="number" placeholder="orient" name="orient" value="<?php echo $_POST['orient']; ?>" required>
                </div>
                <div class="input-group">
                    <input type="number" placeholder="sumbox" name="sumbox" value="<?php echo $_POST['sumbox']; ?>" required>
                </div>
                <div class="input-group">
                    <input type="text" placeholder="MR scanner type" name="MR_scanner" value="<?php echo $_POST['MR_scanner']; ?>">
                </div>
                <div class="input-group">
                    <input type="file" placeholder="t1w" name="t1w" value="<?php echo $_POST['t1w']; ?>">
                </div>
                <div class="input-group">
                    <input type="file" placeholder="t2w" name="t2w" value="<?php echo $_POST['t2w']; ?>" >
                </div>
    			<div class="input-group">
    				<button name="submit" class="btn">Submit</button>
    			</div>
    			<p class="login-register-text">trying to search data? <a href="search.php">Click Here</a>.</p>
    		</form>
    	</div>
</body>
</html>