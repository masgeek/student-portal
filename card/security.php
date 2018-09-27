<?php

define('HMAC_SHA256', 'sha256');
define('SECRET_KEY', 'edcc5041fd7d488a933de0178db9c73af5b8e00354334a798d0bf22ae60a03f6206581b2386d44d5bc04a3f19efa77856e014227719b4317b85dc66f6255e91f65ce2b54723840f181b3561cfd1773b2964d7aed73b0486d9d4b5fa696fd61f8960bfecb80194c5383bffdbf88874ee3bfe0ad6ed89d4f08aaf2f071721fda32');

function sign($params)
{
    return signData(buildDataToSign($params), SECRET_KEY);
}

function signData($data, $secretKey)
{
    return base64_encode(hash_hmac('sha256', $data, $secretKey, true));
}

function buildDataToSign($params)
{
    $dataToSign = [];
    $signedFieldNames = explode(",", $params["signed_field_names"]);
    foreach ($signedFieldNames as $field) {
        $dataToSign[] = $field . "=" . $params[$field];
    }
    return commaSeparate($dataToSign);
}

function commaSeparate($dataToSign)
{
    return implode(",", $dataToSign);
}