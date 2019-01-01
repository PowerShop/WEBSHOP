<?php
/*
Random Key
*/
Class Redeem{
    function random_key($len = 16){
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
        $key = "";
        $num = strlen($chars);
        
        for($i = 0; $i < $len; $i++) {
            $key.= $chars[rand()%$num];
            $key.=""; 
        }
        return $key; 
    }
    public function AddRedeem($name,$command,$keynum){
        $code = $api->redeem->random_key();
        query("INSERT INTO `code`(`name`,`redeem`,`command`,`keynum`) VALUES ('".$name."','".$code."','".$command."','".$keynum."')");
        echo "<script type='text/javascript'>
        swal('Success','เพิ่มโค๊ดสำเร็จ!','success');
        </script>";
    }

    public function CheckRedeem($redeem){
        global $api;
        
        if(query("SELECT * FROM `code` WHERE `redeem`=?;",array($redeem))->rowCount()==1){
            $code = query("SELECT * FROM `code` WHERE `redeem`=?;",array($redeem))->fetch();
            echo "<script type='text/javascript'>
                    swal('สำเร็จ!','คุณได้รับ ".$code['name']."','success');
                    </script>";

                    /* 
                    Waiting Code Update 
                    *
                    *
                    *
                    *
                    End
                    */

            query("DELETE FROM `code` WHERE `redeem` =?;",array($redeem));
        }else{
            echo "<script type='text/javascript'>
                    swal('ไม่สำเร็จ!','โค๊ดไม่ถูกต้อง','error');
                    </script>";
        }
    }
}
?>