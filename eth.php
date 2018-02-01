<?php

include('simple_html_dom.php');
function check($href) {

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_URL, $href);
    curl_setopt($curl, CURLOPT_REFERER, $href);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/533.4 (KHTML, like Gecko) Chrome/5.0.375.125 Safari/533.4");
    $str = curl_exec($curl);
    curl_close($curl);

    // Create a DOM object
    $dom = new simple_html_dom();
    // Load HTML from a string
    $dom->load($str);
    $dom->find("#ep-price");



    $price = $dom->getElementById('ep-price')->plaintext;
    shell_exec('curl -d \'{"color":"green","message":"1 ETH=' . $price . '","notify":false,"message_format":"text"}\' -H \'Content-Type: application/json\' https://thehut.hipchat.com/v2/room/4420647/notification?auth_token=M0bsRg2uTkszmdsQAEnKCf0om0cCJ4dqBi6e3Hrp');
}

$url = 'https://ethereumprice.org/';
check($url);
