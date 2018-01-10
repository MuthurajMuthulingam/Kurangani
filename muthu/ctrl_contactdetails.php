<?php
require_once 'model/activity.php';
$activity=new Activity();

$area='';

if(isset($_REQUEST['area'])){
    $area=$_REQUEST['area'];
}


$response=$activity->searchArea($area);
//echo json_encode($response);
if($response['status']=='success'){
    //$_SESSION['info']=$response['message'];
    $num=$response['numrows'];
    $a=$response['message'];
    if($num==0){
        echo 'No  one Available near to your Area , You are search for';
    }else{
       $final= '<table>
                    <tr>
                        <th>பெயர்</th>
                        <th>முகவரி </th>
                    </tr>';
        for($i=0;$i<$num;$i++){
            //$name=$a[$i]['name'];
            //$address=$a[$i]['address'];
            $answer.="<tr>
                        <td>".$a[$i]['name']." </td>
                        <td>".$a[$i]['address']."</td>
                    </tr>";
        }
        $bot =' </table>';
    }
   $final_ans=$final.$answer.$bot;
   echo $final_ans;
}else{
    $_SESSION['error']=$response['message'];
    echo json_encode($response);
}
?>
