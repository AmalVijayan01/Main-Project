<?php
    session_start();
    if(!isset($_SESSION["ses_id"])){
        header("location: chef_login.php");
        exit(1);
    }
    include 'sidebar.php';
    include 'conn.php';
    $login_id=$_SESSION["ses_id"];
?>
<head>
    <style>
            .food-menu{
                margin-left: 15%;
            }
            .cards{
                position: relative;
                width: 98%;
                padding: 1rem 1.5rem;
                display: grid;
                grid-template-columns: repeat(4, 0.5fr);
                grid-gap: 10px;
                
            }
            .fddisplay{
                margin:5px 0 5px 10px;
                display:flex;
                flex-wrap: wrap;
                width:36%;
            }
            .displaycard{
                margin: 5px 10px 0 10px;     
                
            }
            .displayimg{
                text-align: center;
                border-radius:10px 10px 0 0;
                width:180px;
                border: none;
                height:200px;
                margin:0 0 0 0;
            }
            .displayimg img{
                width: 250px;
                height: 180px;
                border-radius:10px 10px 0 0;
            }
            .displaytext{
                text-align: center;
                align-items:inline;
                width: 250px;
                height: 120px;
                background-color: white;
                margin:0 0 0 0;

            }
            .displaytext h3{
                padding:10px 0 0 0;
            }
            .user_wrapper{
                font-weight: bold;
                color: white;
                font-size: 20px;
                background-color:black ;
                padding: 10px 30px 10px 30px;
                border-radius: 30px 30px 30px 30px;

            }
        </style>
    </head>
    <body>
    <div class="container-fluid">
        <!-- fOOD MEnu Section Starts Here -->
        <div class="food-menu">
            <h1>Food Menu<br></h1>
            <?php echo $login_id ?>
            <div class="cards">
            <?php
                $select_query = "SELECT tbl_foods.food_id,tbl_foods.food_name,tbl_foods.food_description,
                tbl_foods.food_qty,tbl_foods.food_unitprice,tbl_foods.food_image,tbl_foods.chef_id,
                tbl_foods.cat_id,tbl_foods.food_status,tbl_chefs.chef_fname,tbl_chefs.chef_lname,
                tbl_category.cat_name FROM tbl_foods,tbl_chefs,tbl_category WHERE tbl_foods.food_status=1 
                AND  tbl_foods.chef_id=tbl_chefs.chef_id AND tbl_foods.cat_id=tbl_category.cat_id AND 
                tbl_chefs.login_id='$login_id'";
                $select_result=mysqli_query($con,$select_query);
                if(mysqli_num_rows($select_result)>1)
                {
                while($fetc_rows = mysqli_fetch_array($select_result))
                {
                    $imageurl="images/".$fetc_rows['food_image'];
            ?>
                <div class="fddisplay">
                    <div class="displaycard">
                        <div class="displayimg">
                        <img src= "<?php echo $imageurl ?>">
                        </div>
                        <div class="displaytext">
                            <h3><?php echo $fetc_rows['food_name'];?></h3>
                            <h4>₹<?php echo $fetc_rows['food_name'];?></h4>
                            <p><?php echo $fetc_rows['food_name'];?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
            <?php }
            else{
                echo "no product found";
            }
            ?>
        </div>
    </section>

    <!-- fOOD Menu Section Ends Here -->
    <script>
            let sidebar = document.querySelector(".sidebar");
            let closeBtn = document.querySelector("#btn");
            closeBtn.addEventListener("click", () => {
            sidebar.classList.toggle("open");
            // call function
            changeBtn();
            });
            function changeBtn() {
                if(sidebar.classList.contains("open")) {
                    closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
                } else {
                    closeBtn.classList.replace("bx-menu-alt-right", "bx-menu");
                }
            }
        </script>
    </div>
    </body>
</html>