<?php
session_start();
if (!isset($_SESSION["ses_id"])) {
    header("location: chef_login.php");
    exit(1);
}
include 'sidebar.php';
include 'conn.php';
?>

<head>
    <style>
        .by-container {
            width: 100%;
            height: 100%;
            margin: 1% 10% 0 13%;
            display: flex;
        }

        .b-cont-left {
            background-color:whitesmoke;
            position: relative;
            width: 45%;
        }

        .b-cont-right {
            background-color: whitesmoke;
            position: relative;
            width: 45%;
        }
        .addfd{
            background-color:white;
            position: relative;
            width: 90%;
            height: 93%;
            margin: 2% 0 40% 5%;
            padding-top: 30px;
            border-radius: 10px;
           
        }
        .fdtitle{
            text-align: center;
            background-color:#5c4ac7;
            margin:20px 80px 0 60px;
        }.adfd-form-container{
            width: 100%;
        }
        .fdtitle h2{
            color: #ffff;
        }.adfd-form-container form{
            margin: 50px 0 0 60px;
            width: 90%;
        }.inp-fields{
            width: 90%;
            height:50px;
        }.adfd-form-container form textarea{
            width: 90%;
            border-radius:5px;
        }.imginput{
            width: 90%;
        }
        .imginput input{
            width: 500px;
        }
        .btns{
            display:flex;
        }
        .custom-btns{
            height: 50px;
            width: 100px;
            background-color: #26dad2;
            color: #fff;
            border: none;
            margin-right: 10px;
            border-radius:10px;
        }.custom-btns1{
            background-color: #2f3d4a;
            height: 50px;
            width: 100px;
            color: #fff;
            border:none;
            border-radius:10px;
            text-align:center;
        }.custom-btns1:hover{
            box-shadow: 0 5px 5px 0;
            color:red;
        }
        .custom-btns:hover{
            box-shadow: 0 5px 5px 0;
            color:greenyellow;
        }.mydiv{
            display:flex;
        }.inp-fields1{
            margin-right: 5px;
            width:44.5% ;
        }.errname{
            color:red;
            margin-top: -5px;
        }.errdes{
            color:red;
            margin-top: -5px;
        }.errnum{
            color:red;
            margin-top: -5px;
        }.errprice{
            color:red;
            margin-top: -5px;
        }.errcat{
            color:red;
            margin-top: -5px;
        }
    </style>

    <script>
        function validate() {
            var fdname=document.myform.fdname.value;
            var desc=document.myform.descrip.value;
            var fdqty=document.myform.fdqty.value;
            var fdprice= document.myform.fdprice.value;
            var fdcategory=document.myform.fdcategory.value;

            if(fdname == ''){
                document.getElementById("errname").innerHTML ="Enter the food name";
                return false;
            }else if(desc==''){
                document.getElementById("errdes").innerHTML ="Enter the food description";
                return false;
            }else if(fdqty==''){
                document.getElementById("errnum").innerHTML ="Enter the food quantity";
            }else if(fdprice== ''){
                document.getElementById("errprice").innerHTML ="Enter the food price";
            }else if(fdcategory==''){
                document.getElementById("errcat").innerHTML ="Enter the food category";
            }else{

            }
            return true;
        }
    </script>
</head>

<body>
<div class="container-fluid">
    <div class="by-container">
        <div class="b-cont-left">
            <div class="addfd">
                <div class="fdtitle">
                    <h2>Add New Item</h2>
                </div>
                <div class="adfd-form-container">
                    <form method="post" action="#" name="myform"onsubmit="return( validate())" enctype="multipart/form-data">
                        <label>Item Name</label><br>
                        <input type="text" name="fdname" id="fdname" class="inp-fields" placeholder="Enter food name"  
                        autocomplete="off"><br><br>
                        <label>Description</label><br>
                        <input type="text" name="descrip" id="descrip" class="inp-fields" placeholder="Enter description"   
                        autocomplete="off"><br><br>
                        <div class="mydiv">
                            <input type="number" name="fdqty" id="fdqty" class="inp-fields1" placeholder="Enter quantity"
                            min="1" max="50"  autocomplete="off"><br><br>
                            <div class="errnum" id="errnum"></div>
                            <input type="text" name="fdprice" id="fdprice" class="inp-fields1" placeholder="Enter unit price"  
                            autocomplete="off"><br><br>
                        </div>
                        <label>Category</label><br>
                        <select name="fdcategory" id="fdcategory" class="inp-fields"  class="inp-fields" >
                        <?php
                            $category_select="SELECT cat_id,cat_name,cat_status FROM tbl_category WHERE cat_status=0";
                            $category_result=mysqli_query($con,$category_select);
                            while($cat_res_fetch= mysqli_fetch_array($category_result)){    
                                $catid=$cat_res_fetch['cat_id'];              
                        ?>
                            <option value="<?php echo $cat_res_fetch['cat_id'];?>"><?php echo $cat_res_fetch['cat_name'];?></option>
                            <?php
                        }
                        ?>
                        </select><br><br>
                        <div class="imginput">
                            <label>Image</label><br>
                            <input type="file" name="uploadfile" id="uploadfile" ><br><br>
                        </div>
                        
                        <div class="errname" id="errname"></div>
                        <div class="btns">
                            <input type="submit" name="submit"  value="Add"
                             class="custom-btns" id="submit" >
                            <button class="custom-btns1" onclick="">Cancel</button>
                        </div> 
                    </form>
                </div>
            </div>
        </div>
        <div class="b-cont-right">
        </div>
    </div>
</div>
</body>
<?php
    if(isset($_POST['submit'])){
        $foodname = $_POST['fdname'];
        $fooddescription = $_POST['descrip'];
        $quantity = $_POST['fdqty'];
        $price= $_POST['fdprice'];
        $login_id=$_SESSION["ses_id"];
        $cat_id=$catid;
        // $image = $_POST['fdimg'];
        $food_status=0;
        $preorder_status=0;

        // $filename=$_FILES["fdimg"] ["name"];
        // $tempfile=$_FILES["fdimg"]["tmp_name"];
        // $folder="/images/foods/".$filename;

        $select_chefid="SELECT chef_id FROM tbl_chefs WHERE login_id='$login_id'";
        $chefid_result=mysqli_query($con,$select_chefid);
        $result_chefid=mysqli_fetch_array($chefid_result);
        $chef_id=$result_chefid['chef_id'];

        $insert_foods="INSERT INTO tbl_foods(`food_name`, `food_description`, `food_qty`, 
        `food_unitprice`, `food_image`, `chef_id`, `cat_id`, `food_status`, `preorder_status`) 
        VALUES ('$foodname','$fooddescription','$quantity','$price','$filename','$chef_id',
        '$cat_id','$food_status','$preorder_status')";
        $insert_foods_result=mysqli_query($con,$insert_foods);
        move_uploaded_file($tempfile,$folder);
    
    }
?>