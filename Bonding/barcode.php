<html>

<head>
    <style>
    p.inline 
	{
        display: inline-block;
		text-align: center;
		
    }

    span 
	{
        font-size: 13px;
    }
    </style>
    <style type="text/css" media="print">
    @page {
        size: auto;
        /* auto is the initial value */
        margin: 0mm;
        /* this affects the margin in the printer settings */
		/* font-weight: bold;
        text-align: center; */

    }
    </style>
</head>

<body onload="window.print();">
    <div style="margin-left: 5% ">
        <?php
		include 'barcode128.php';
		$product_id = $_POST['product_id'];
		for($i=1;$i<=$_POST['print_qty'];$i++){
			echo "<p class='inline'>".bar128(stripcslashes($_POST['product_id']))."</p>&nbsp&nbsp&nbsp&nbsp";
		}

		?>
    </div>
    <br>
    <br>
    <br>


</body>

</html>