<?php require "../config/config.php"?>
<?php require "../includes/navbar.php" ?>

<?php

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = $conn->query("SELECT * FROM post WHERE id = $id");
    $query->execute();
    $post = $query->fetch(PDO::FETCH_OBJ);
}
else{
    // die("not /founded");
}
if(isset($_POST["submit"]) and isset($_GET['id'])){
    if($_POST["title"] == '' or $_POST["subtitle"] == '' or $_POST['body'] == '' and isset($_SESSION['username']) ){
        echo "one of the inputs is empty";
    }
    else{
        $id = $_GET['id'];
        $title = $_POST['title'];
        $subtitle = $_POST['subtitle'];
        $body = $_POST['body'];
        $img = $_FILES['image']['name'];
        $dir = './images/' . basename($img); 
        $user_id = $_SESSION['user_id'];
        $conn->beginTransaction();
        try{

        if ($_FILES['image']['name'] == '') {
            $query = $conn->prepare("UPDATE post SET title = :title, subtitle = :subtitle, body = :body, user_id =:user_id
            WHERE id = $id");
            $result =  $query->execute([
                ':title' => $title,
                ':subtitle' => $subtitle,
                ':body' => $body, 
                ':user_id' => $user_id,
            ]);
        } else {

            $query = $conn->prepare("UPDATE post SET title = :title, subtitle = :subtitle, body = :body, img =:img, user_id =:user_id
                                WHERE id = $id");
            $result =  $query->execute([
                ':title' => $title,
                ':subtitle' => $subtitle,
                ':body' => $body, 
                ':img' => $img,
                ':user_id' => $user_id,
            ]);
        }
            
        }catch(Exception $e){
        die($e->getMessage());
        }
                                  
        if($_FILES['image']['name'] != ''){
            move_uploaded_file($_FILES['image']['tmp_name'], $dir);
        }
        $conn->commit();
        header("location: http://localhost/Blog/index.php");

    
    }
}
elseif((isset($_GET['id'])) and isset($_SESSION['username']) and isset($_POST["submit"])){
    die("not founded");
}
elseif(!isset($_SESSION['username']) and isset($_POST["submit"]) ){
    die("you are not logged in!!!");
}
?>
       
       <header class="masthead" style="background-image: url('images/<?php echo $post->img; ?>')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="post-heading">
                            <h1><?php echo $post->title; ?></h1>
                            <h2 class="subheading"><?php echo $post->subtitle; ?></h2>
                            <span class="meta">
                                Posted by
                                <a href="#!"><?php
                                $query_user = $conn->query("SELECT username FROM User WHERE Id = {$post->user_id}");
                                $query_user->execute();
                                $username = $query_user->fetch(PDO::FETCH_COLUMN);
                                echo $username;
                                ?></a>
                                on<?php 
                                $date_created = new DateTime($post->create_at);
                                echo $date_created->format('Y-m-d'); ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </header><!-- Main Content-->
        <div class="container px-4 px-lg-5">

        <form method="POST" action="" enctype="multipart/form-data">
              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="text" name="title" id="form2Example1" class="form-control" value="<?php echo $post->title; ?>" placeholder="title" />
               
              </div>

              <div class="form-outline mb-4">
                <input type="text" name="subtitle" id="form2Example1" class="form-control" placeholder="subtitle" value="<?php echo $post->subtitle; ?>" />
            </div>

              <div class="form-outline mb-4">
                <textarea type="text" name="body" id="form2Example1" class="form-control" placeholder="body" rows="8"><?php echo $post->body; ?></textarea>
            </div>

              
             <div class="form-outline mb-4">
                <input type="file" name="image" id="form2Example1" class="form-control" placeholder="image" />
            </div>


              <!-- Submit button -->
              <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">update</button>

          
        </form>


           
        </div>
  <?php require "../includes/footer.php" ?>