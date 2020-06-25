<?php

function http_request($url){

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

$output = curl_exec($ch);

curl_close($ch);

return $output;

}

$data = http_request("https://api.kawalcorona.com/indonesia/provinsi/");

$data = json_decode($data, TRUE);

// echo "<pre>";
// print_r($data);
// echo "</pre>";

$jumlah = count($data);

$nomor = 1;

for($i = 0; $i < $jumlah; $i++){

$hasil = $data[$i]['attributes'];
$pos = hasil['Kasus_Posi'];
$posri = number_format($pos,0,',','.');

$sem = hasil['Kasus_Semb'];
$semri = number_format($sem,0,',','.');

$men = hasil['Kasus_Meni'];
$menri = number_format($men,0,',','.');

?>

<tr>
<td><??></td>
<td><?=$hasil['Provinsi']?></td>
<td><?=$posri?></td>
<td><?=$semri?></td>
<td><?=$menri?></td>

</tr>

<?php
}



?>