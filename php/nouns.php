<?php
    require("OAuth.php");
     
    $cc_key  = "CLIENT_KEY_HERE";
    $cc_secret = "CLIENT_SECRET_HERE";
    $url = "http://api.thenounproject.com/icons/happy";
    $args = array();
    $args["limit"] = 10;
     
    $consumer = new OAuthConsumer($cc_key, $cc_secret);
    $request = OAuthRequest::from_consumer_and_token($consumer, NULL,"GET", $url, $args);
    $request->sign_request(new OAuthSignatureMethod_HMAC_SHA1(), $consumer, NULL);
    $url = sprintf("%s?%s", $url, OAuthUtil::build_http_query($args));
    $ch = curl_init();
    $headers = array($request->to_header());
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    $rsp = curl_exec($ch);
    //$results = json_decode($rsp);
    //print_r($results);
    print_r($rsp)
?>