<?php

namespace Julien\Tools;


class Recaptcha
{
    private $secret = "6LfFD2QUAAAAALYc_-m5VTW5dvVp3ERBqj2BZER8";

    private $response;
    private $remoteip;


    public function verify($gcaptcha, $ip)
    {
        $this->response = htmlspecialchars($gcaptcha);
        $this->remoteip = $ip;

        // Url to send a post request to
        $api_url = "https://www.google.com/recaptcha/api/siteverify";


        $fields = array(
            'secret' => $this->secret,
            'response' => $this->response,
            'remoteip' => $this->remoteip
        );

        $fields_string = "";

        //url-ify the data for the POST
        foreach ($fields as $key => $value) {
            $fields_string .= $key . '=' . $value . '&';
        }
        rtrim($fields_string, '&');

        //open connection
        $ch = curl_init();

        //set the url, number of POST vars, POST data
        curl_setopt($ch, CURLOPT_URL, $api_url);
        curl_setopt($ch, CURLOPT_POST, count($fields));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        //execute post
        $result = curl_exec($ch);

        //close connection
        curl_close($ch);

        $decode = json_decode($result, true);

        if ($decode['success'] == true) {
            // yeah good to go !!
        } else {
            throw new \Exception("Vous n'avez pas coché le Recaptcha " . $decode['success']);
        }
    }


}