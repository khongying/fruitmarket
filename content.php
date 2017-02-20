<?php 

    $sqli="SELECT * FROM `content`";
                        
        $result=getpdo($con,$sqli,1);
        foreach ($result as $row) {
                $content = $row['text'];
        }
?>

<?= $content; ?>