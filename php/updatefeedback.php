<?php 

include('./functions.php');
$feedbacks = loadUsers("../visszajelzesek.txt");
$limit = 8;
$countFeedbacks = count($feedbacks);
$pageNumbers = ceil($countFeedbacks / $limit);

if(isset($_GET['page'])){
    if($_GET['page'] != 1){
        $start = ($_GET['page'] - 1) * $limit + 1;
    }
    else{
        $start = 1;
    }
}
else{
    $start = 1;
}

$tablazat = '<table class="vjel-vasarlok">
<caption>Vásárlóink visszajelzése</caption>
<thead>
    <tr class="tabla-sor">
        <th id="table-nev">Név</th>
        <th id="table-idopont">Időpont</th>
        <th id="table-ertekeles">Értékelés</th>
        <th id="table-megjegyzes">Megjegyzés</th>
    </tr>
</thead><tbody>';
$i = 1;
foreach($feedbacks as $feedback){
    if($start <= $i && $i < $start + $limit){
        $tablazat .= '<tr class="table-sor">
        <td class="table-nev" headers="table-nev">'.$feedback['name'].'</td>
        <td headers="table-idopont">'.$feedback['date'].'</td>
        <td headers="table-ertekeles">'.$feedback['rate'].'</td>
        <td class="table-megjegyzes" headers="table-megjegyzes">'.$feedback['ertekeles'].'</td>
    </tr>';
    }
    $i += 1;
}
if($pageNumbers != 1){
    $tablazat .= '<tr class="paging">
    <td colspan="4">';
    for($i = 1; $i < $pageNumbers + 1; $i++){
        $tablazat .= '<a class="paging" href="visszajel.php?page='.$i.'" name="page">'.$i.'</a>';
    }
    $tablazat .= '</td></tr></tbody></table>';
}else{
    $tablazat .= '</tbody></table>';
}
echo $tablazat;
?>