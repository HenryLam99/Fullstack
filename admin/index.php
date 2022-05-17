<?php 
include_once("../config/config.php");
?>
<!doctype html>
<html lang="en">
<?php include_once("head.php"); ?> 
        <?php 
            if(!isset($_SESSION["email"])){
                include_once("sign-in.php");

            }else{
               ?>
                <main>
                <form method="POST" class="d-flex mb-4">
            <input class="form-control me-2" type="search" name="search_email" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
            <div class="table-responsive">
                <table class="table">
                    <thead class="table-dark">
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Email</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
                    if(isset($_POST["search_email"]))
                        $sql = "SELECT * FROM `user` where `email` like '%".$_POST["search_email"]."%';";
                    else $sql = "SELECT * FROM `user`;";
                        $query = query($sql,$connect);  
                        foreach($query as $key){
                    ?>
                      <tr>
                        <th scope="row"><?=$key["id"]?></th>
                        <td><?=$key["email"]?></td>
                        <td><?=$key["first_name"]?></td>
                        <td><?=$key["last_name"]?></td>
                        <td><a class="btn btn-primary" href="admin-detail.php?id=<?=$key["id"]?>" role="button">View Detail</a></td>
                      </tr>
                    <?php 
                        }
                    ?>
                    </tbody>
                  </table>
            </div>
        </main>
               <?php
        }
        ?>  
    <?php include_once("footer.php"); ?>
</html>      