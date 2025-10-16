<html>
    <head>
        <title> HMS Dashboard | Setup </title>
        <link rel="stylesheet" href="assets/css/admin-style.css" />
    </head>
    <body>
<?php 

session_start();

    if(file_exists("config.php")){
        die("Setup is completed ! <a href='index.php'>Dashboard</a>");
    }else{
     if(isset($_POST["setup"])){
        $db_host='localhost';
        
        $db_user='root';
        $db_password='';
        $db_database='jvm_hms';

        $config_contents="<?php 
            define('DB_HOST','$db_host');
            define('DB_USER','$db_user');
            define('DB_PASSWORD','$db_password');
            define('DB_DATABASE','$db_database');

            include 'inc/db.php';

            \$jvmClass=new JVMClass(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);

            ?>
        ";

        file_put_contents("config.php",$config_contents);

        $conn=new mysqli($db_host,$db_user,$db_password,$db_database);
        if($conn->connect_error){
            die("Database Connection Failed:".$conn->connect_error);
        }else{
            $create="CREATE TABLE IF NOT EXISTS super_admin_login(id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,user_name VARCHAR(300),password text,created_on TIMESTAMP)";
            if($conn->query($create)==True){
                echo "Table Created successfully";
            }else{
                echo "Table created errors".$conn->error;
            }
        }
            


        $admin_name=$_POST["admin_name"];
        $password=$_POST["password"];
        $confirm_password=$_POST["confirm_password"];
        if($confirm_password==$password){
            $insert="INSERT INTO super_admin_login(user_name, password) VALUES('$admin_name',md5('$password'))";
            if($conn->query($insert)==True){
                echo "Installation Completed <a href='index.php'>Go to Dashboard</a>";
                exit();
            }else{
                echo "Insertion Failed".$conn->error;
            }
           
        }
         


        $conn->close();
    }

?>

        <div class="container">
        <h1>Welcome to  JVM HMS Admin Panel</h1>
        <div class="install_container">
            
            <form method='POST' class="setup_form">
                <div class="form-tab">
                    
                    <input type="text" name="admin_name" required />
                    <label>Admin Name</label>
                </div>
                
                <div class="form-tab">
                    
                    <input type="password" name="password"  required/>
                    <label>Password</label>
                </div>
                <div class="form-tab">
                    
                    <input type="password" name="confirm_password" required />
                    <label>Confirm Password</label>
                </div>
                
                    
                    <input type="submit" name="setup" class="btn" value="Save" />
               
            </form>
        </div>
        </div>
        <?php } ?>
       
    </body>
</html>