<?php
$bebida = $_POST['search'];
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://the-cocktail-db.p.rapidapi.com/search.php?i=$bebida",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "cache-control: no-cache",
        "x-rapidapi-host: the-cocktail-db.p.rapidapi.com",
        "x-rapidapi-key: 09d8e86b69msh367d3917d7092d8p152d35jsnbed02402c430"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
} else {
    echo $response;
}