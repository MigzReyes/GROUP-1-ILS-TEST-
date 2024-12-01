<?php 
session_start();

require ('dbconnect.php');

//USER DATA VALIDATION
    function validate($inputData){

        global $conn;
        $validatedData = mysqli_real_escape_string($conn, $inputData);
        return trim($validatedData);
    }

//REDIRECT USER
    function redirect($url, $message){
        $_SESSION['message'] = $message;
        header('Location: ' .$url);
        exit(0);
    }

//ALERT
    function alertMessage(){
        if (isset($_SESSION['message'])){
            echo '<div class="alert alert-success">
                <h6>'.$_SESSION['message'].'</h6>
            </div>';
            unset ($_SESSION['message']);
        }
    }

//POP UP
    function messagePopUp() {
        if (isset($_SESSION['message'])){
            echo '<div 
                style="
                background-color: rgb(198, 48, 44);
                padding: 5px;
                border: solid; 
                border-color: rgb(198, 48, 44);
                border-radius: 5px;">
                <h3>'.$_SESSION['message'].'</h3>
            </div>';
            unset ($_SESSION['message']);
        }
    }

/*POP UP FOR FRONT PAGE*/
    function frontPopUp() {
        if (isset($_SESSION['message'])){
            echo '<div class="login-alert">
                <h4>'.$_SESSION['message'].'</h4>
                </div>';
            unset ($_SESSION['message']);
        }
    }

//QUERY CONNECTION / TABLE CONNECTION
    function tableCon($tableName){

        $table = validate($tableName);

        global $conn;
        $query = "SELECT * FROM $table";
        $result = mysqli_query($conn, $query);
        return $result;
    }

//CHECK PARAMETER ID
    function checkParamId($paramType){

        if (isset($_GET[$paramType])){
            if ($_GET[$paramType] != null){
                return $_GET[$paramType];
            } else {
                return 'No id found';
            }
        } else {
            return 'No id given';
        }

    }

//USER DATA ID FOR EDIT ACCOUNT
    function getById($tableName, $id){
        global $conn;

        $table = validate($tableName);
        $id = validate($id);

        $query = "SELECT * FROM $table WHERE id='$id' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if ($result){
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $response = [
                    'status' => 200, 
                    'message' => 'Succesfully fetched data',
                    'data' => $row
                ];
                return $response;
            } else {
                $response = [
                    'status' => 404, 
                    'message' => 'No data found :('
                ];
                return $response;
            }
        } else {
            $response = [
                'status' => 500, 
                'message' => 'Something went wrong'
            ];
            return $response;
        }
    }

/*USER DATA EMAIL*/
    function getByEmail($tableName, $email){
        global $conn;

        $table = validate($tableName);
        $email = validate($email);

        $query = "SELECT * FROM $table WHERE email='$email' LIMIT 1";
        $result = mysqli_query($conn, $query);

        if ($result){
            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $response = [
                    'status' => 200, 
                    'message' => 'Succesfully fetched data',
                    'data' => $row
                ];
                return $response;
            } else {
                $response = [
                    'status' => 404, 
                    'message' => 'No data found :('
                ];
                return $response;
            }
        } else {
            $response = [
                'status' => 500, 
                'message' => 'Something went wrong'
            ];
            return $response;
        }
    }

/*DELETE USER QUERY*/
    function deleteQuery($tableName, $id) {

        global $conn;

        $table = validate($tableName);
        $id = validate($id);
        $query = "DELETE FROM $table WHERE id='$id' LIMIT 1";
        $result = mysqli_query($conn, $query);
        return $result;

    }

/*DELETE USER RESERVATION*/
    function deleteQueryForm($tableName, $email) {

        global $conn;

        $table = validate($tableName);
        $email = validate($email);
        $query = "DELETE FROM $table WHERE email='$email' LIMIT 1";
        $result = mysqli_query($conn, $query);
        return $result;

    }

/*LOG OUT FUNCTION*/
    function logoutSession() {
        unset ($_SESSION['auth']);
        unset ($_SESSION['loggedInUserRole']);
        unset ($_SESSION['loggedInUser']);

    }

/*DASHBOARD FUNCTION COUNTING SYSTEM*/
    function getCount($tableName) {
        global $conn;

        $table = validate($tableName);
        $query = "SELECT * FROM $table";
        $result = mysqli_query($conn, $query);
        $totalCount = mysqli_num_rows($result);
        return $totalCount;
    }
?>
