<?php
    $sql="select * from t6 where t_look=2";
    $ro = mysqli_query($link,$sql);
    $totle = mysqli_num_rows($ro);    
    $page_cnt=3;
    $page_totle = ceil($totle / $page_cnt);
    $page_now = 1;
    if( !empty($_GET["page"])){
        $page_now = $_GET["page"];
    }
    $page_open = ($page_now - 1)*$page_cnt;
    $p1 = $page_now -1;
    $p2 = $page_now +1;    
    $sql="select * from t6 where  t_look=2 limit ".$page_open." , ".$page_cnt;
    $ro = mysqli_query($link,$sql);
    $row=mysqli_fetch_assoc($ro); 
?>
<table width="100%"">
      <tr>
          <td align="center"><a href="?to=t6&page=<?=$p1?>"><img src="image/01E01.jpg"></a></td>
      </tr>      
<?php
do{
?>
      <tr>
          <td align="center">
              <img src="t6/<?=$row["t_pic"]?>" width="150" height="103">
          </td>
      </tr>    
<?php
}while($row=mysqli_fetch_assoc($ro));
?>  
      <tr>
          <td align="center"><a href="?to=t6&page=<?=$p2?>"><img src="image/01E02.jpg"></a></td>
      </tr>
</table>