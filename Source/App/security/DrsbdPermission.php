<?php
session_start();


class DrsbdPermission {

    public function dbConnect(){
        //$connect = mysqli_connect('localhost','root','','drshddinventory') or die(mysqli_connect_errno());
        //var_dump($connect);
        $connect = mysqli_connect("kodaatcom.ipagemysql.com","drshddinventory","Data@Recovery!Station","drshddinventorydb") or die(mysqli_connect_error());
        //$db = mysql_select_db("DRSBD_HDD_INVENTORY") or die(mysql_error());
        //exit;
        //echo $connect->begin_transaction(); exit;

        if (mysqli_connect_error()){
            return flase;
        }
        else
            //echo $connect; exit;
            return $connect;
    }

    public function logout(){
        session_destroy();
        //header("Location: ../login.php");
        $this->redirectToLogin();
        exit;
    }

    public function login($username, $password, $authentication){
        $password = md5($password);
        $authentication = md5($authentication);

        //$connect = mysqli_connect("datarecoverystationc.ipagemysql.com","drshddinventory","Nevertouch6735!","drshddinventory") or die(mysqli_connect_error());
        //exit;
        if($this->dbConnect()){
            //echo $this->dbConnect();
            $result = mysqli_query($this->dbConnect(), "SELECT * FROM USER WHERE USERNAME='$username' AND PASSWORD='$password' AND AUTHENTICATION='$authentication'");
            //echo mysqli_num_rows($result);

            //exit;
            if(mysqli_num_rows($result) > 0){
                while($data = mysqli_fetch_object($result)){
                    $fullName= $data->FULL_NAME;
                    $user = $data->USERNAME;
                    $pass= $data->PASSWORD;
                    $auth = $data->AUTHENTICATION;
                    $userType = $data->USER_TYPE;
                }
                mysqli_close($this->dbConnect());

                if($username == $user && $password == $pass && $authentication == $auth){
                    $_SESSION['fullName'] = $fullName;
                    $_SESSION['username'] = $username;
                    $_SESSION['password'] = $password;
                    $_SESSION['authentication'] = $authentication;
                    $_SESSION['userType'] = $userType;
                    //exit;
                    return true;
                }
            }
        }
        else
            return false;
    }

    public static function validateLogin(){
        //echo "Username: ".$_SESSION['username'];
        if(isset($_SESSION['username']) && isset($_SESSION['password']) && isset($_SESSION['authentication']) && isset($_SESSION['userType'])  )
            return true;
        else
            return false;
    }

    public function redirectToLogin(){
        header("Location: ./login.php");
        exit;
    }

    public function continuingAccess(){
        return true;
    }

    public function getUserType(){
        return $_SESSION['userType'];
    }

    public function createUser($fullName, $email, $username, $password, $userType, $authentication){
        $date = date("Y-m-d H:m:s");
        $ip = $_SERVER['REMOTE_ADDR'];
        $sessionUsername = $_SESSION['username'];
        $password = md5($password);
        $authentication = md5($authentication);
        if($this->dbConnect()){
            $insert = mysqli_query($this->dbConnect(), "INSERT INTO USER (FULL_NAME, EMAIL, USERNAME, PASSWORD, USER_TYPE, AUTHENTICATION, ENTRY_BY, ENTRY_DTTM,HOST_IP) VALUES('$fullName','$email', '$username','$password','$userType','$authentication','$sessionUsername','$date','$ip') ");

            //echo "INSERT INTO USER (FULL_NAME, EMAIL, USERNAME, PASSWORD, USER_TYPE, AUTHENTICATION, ENTRY_BY, ENTRY_DTTM,HOST_IP) VALUES('$fullName','$email', '$username','$password','$userType','$authentication','$sessionUsername','$date','$ip') ";
            //echo $insert;
            //exit;

            if($insert) {
                mysqli_close($this->dbConnect());
                return true;
            }
            else {
                mysqli_close($this->dbConnect());
                return false;
            }
        }else
            return false;
    }

    public function getAllUser(){
        if($this->dbConnect() == true){
            $userList = "";
            $users = mysqli_query($this->dbConnect(), "SELECT * FROM USER WHERE USER_TYPE!='SUPER_ADMIN'");
            if(mysqli_num_rows($users) > 0){
                while($user = mysqli_fetch_object($users)){
                    $userList .= "<tr>";
                    $userList .= "<td>".$user->FULL_NAME."</td>";
                    $userList .= "<td>".$user->USERNAME."</td>";
                    $userList .= "<td>".$user->USER_TYPE."</td>";
                    $userList .= "<td><a href='index.php?page_id=reset&id=$user->ID'>Reset</a>&nbsp;|&nbsp;<a href='index.php?page_id=userDelete&id=$user->ID'>Delete</a></td>";
                    $userList .= "</tr>";
                }
                return $userList;
            }
            else
                return "<tr><td>No user data found</td></tr>";
        }

    }


    public function changePasswordAuthentication( $current, $new, $confirm , $value){
        $userName= $_SESSION['username'];
        $v = strtoupper($value);

        $current = md5($current);
        $new = md5($new);
        $confirm = md5($confirm);

        if($new == $confirm) {
            if($this->dbConnect() == true){
                $user = mysqli_query($this->dbConnect(),"SELECT * FROM USER WHERE USERNAME='$userName' AND $v='$current'");

                if(mysqli_num_rows($user) == 1 ){
                    while ($row = mysqli_fetch_object($user)){
                        $userType = $row->USER_TYPE;
                        $pass = $row->PASSWORD;
                        $auth = $row->AUTHENTICATION;
                    }
                    if($userType == $_SESSION['userType']){
                        if($value == "password"){
                            $update = mysqli_query($this->dbConnect(),"UPDATE USER SET PASSWORD='$new' WHERE USERNAME='$userName' AND USER_TYPE='$userType' AND AUTHENTICATION='$auth' ");
                            if($update)
                                return true;
                            else{
                                return false;
                            }
                        }
                        elseif($value == "authentication"){
                            $update = mysqli_query($this->dbConnect(),"UPDATE USER SET AUTHENTICATION='$new' WHERE USERNAME='$userName' AND USER_TYPE='$userType' AND PASSWORD='$pass' ");
                            if($update)
                                return true;
                            else{
                                return false;
                            }
                        }
                    }
                }
                else{
                    return false;
                }
            }
        }
        else{
            return false;
        }

    }

    public function deleteUser($id){
        if($this->dbConnect() == true){
            $delete = mysqli_query($this->dbConnect(),"DELETE FROM USER WHERE ID='$id' ");
            if($delete == true){
                return true;
            }
            else
                return false;
        }
        else
            return false;
    }

    public function getUserDetails($id){
        if($this->dbConnect() == true){
            $userDetails ="";
            $select = mysqli_query($this->dbConnect(),"SELECT * FROM USER WHERE ID='$id' ");
            if(mysqli_num_rows($select) > 0){
                while($user = mysqli_fetch_array($select)){
                    $userDetails[] .= $user['FULL_NAME'];
                    $userDetails[] .= $user['USERNAME'];
                    $userDetails[] .= $user['USER_TYPE'];
                }
                return $userDetails;
            }
            else
                return false;
        }
        else
            return false;
    }


    public function userReset($id, $type){
        if($this->dbConnect() == true){
            if($type == "password"){
                $reset = substr(str_shuffle(str_repeat('ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789',6)),0,6);

                $md5value = md5($reset);

                $value[] = "";
                $update = mysqli_query($this->dbConnect(),"UPDATE USER SET PASSWORD='$md5value' WHERE ID=$id");
                if($update == true){
                    $value[0] .= $reset;
                    $value[1] .= $id;

                    mysqli_close($this->dbConnect());

                    return $value;
                }
                else
                    return false;
            }
            if($type == "authentication"){
                $reset = substr(str_shuffle(str_repeat('0123456789',4)),0,4);

                $md5value = md5($reset);

                $value[] = "";
                $update = mysqli_query($this->dbConnect(),"UPDATE USER SET AUTHENTICATION='$md5value' WHERE ID=$id");
                if($update == true){
                    $value[0] .= $reset;
                    $value[1] .= $id;

                    mysqli_close($this->dbConnect());

                    return $value;
                }
                else
                    return false;
            }
        }
        else
            return false;
    }

    public function validateInput($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

}


?>