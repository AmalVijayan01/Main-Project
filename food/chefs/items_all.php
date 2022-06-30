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

            .cards{
                position: relative;
                width: 90%;
                padding: 1rem 3rem;
                display: grid;
                grid-template-columns: repeat(4, 0.5fr);
                grid-gap: -10px;
                margin-left: 15%;
                margin-right:50%;
            }
            .fddisplay{
                margin:5px 0 5px 10px;
                display:flex;
                flex-wrap: wrap;
                width:36%;
            }
            .displaycard{
                margin: 5px 10px 15px 10px;
                padding-bottom: 30px;     
                
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
                padding:10px 0  0;
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
        <!-- fOOD MEnu Section Starts Here -->
        <div class="food-menu">
            <h1>Food Menu<br></h1>
            <div class="cards">
            <?php
                $select_query = "SELECT `food_id`, `food_name`, `food_description`, `food_qty`, `food_unitprice`, `food_image`, `chef_id`, `cat_id`, `food_status`, `preorder_status` FROM `tbl_foods`";
                $select_result=mysqli_query($con,$select_query);
                while($fetc_rows = mysqli_fetch_array($select_result))
                {
<<<<<<< HEAD
                    $imageurl="images/foods/".$fetc_rows['food_image'];
=======
                    $imageurl="images/".$fetc_rows['food_image'];
>>>>>>> e937fb11643b7fff3d41a5b4399541e176c9e127
            ?>
                <div class="fddisplay">
                    <div class="displaycard">
                        <div class="displayimg">
                        <img src= "<?php echo $imageurl ?>">
                        </div>
                        <div class="displaytext">
                            <h3><?php echo $fetc_rows['food_name'];?></h3>
                            <h4>₹<?php echo $fetc_rows['food_unitprice'];?></h4>
                            <p><?php echo $fetc_rows['food_description'];?></p>
                            <p><?php echo $fetc_rows['food_qty'];?>&nbsp;<?php if($fetc_rows['food_status']==0)
                            {
                                echo "Instock";
                            }else{
                                echo "out of stock";
                            }
                                ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
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
    </body>
</html>