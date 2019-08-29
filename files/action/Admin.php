<?php


class Admin
{

    public function updatePassword($new_pass,$prev_pass){

        $connection = new Connection();
        $admin_id = $_SESSION['admin_id'];
        $query = "select password from admin where id ='$admin_id' limit 1";

        $password = $connection->connect()->query($query)->fetch_object()->password;

        if ($password == $prev_pass){

            $query_pass = "update admin set password ='$new_pass' where id = '$admin_id'";

            if ($connection->connect()->query($query_pass)){

                $_SESSION['update_pass'] = 'updated';

            }

        }

    }

}