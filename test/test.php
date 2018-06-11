<?php
class test
{
        public function exptable(){
        //设置编码格式
        header("Content-type: text/html; charset=utf-8");
        //用mysqli来连接数据库（服务器，用户名，密码，数据库名字）
        $mysqli=new mysqli("207.246.66.86","root","root","amz_order");

        $mysqli -> set_charset('utf8');

        if(mysqli_connect_errno()){
            echo "连接数据库失败：".mysqli_connect_error();
            $mysqli=null;
            exit;
        }
        echo "连接数据库成功！<br/>";
        date_default_timezone_set('PRC');
        $params = array(
            'AWSAccessKeyId' => "AKIAJRURWBJ4W2V27XOQ",
            'Action' => "ListOrders",
            'SellerId' => "A33KX83Y04Q5NZ",
            'SignatureMethod' => "HmacSHA256",
            'SignatureVersion' => "2",
            'Timestamp'=> gmdate("Y-m-d\TH:i:s\Z", time()),
            'Version'=> "2013-09-01",
            'CreatedAfter'=> gmdate("Y-m-d\TH:i:s\Z", strtotime("-10 day")),
            'CreatedBefore'=> gmdate("Y-m-d\TH:i:s\Z", time()-6*3600),
            'MarketplaceId.Id.1' => "ATVPDKIKX0DER",
        );

        $url_parts = array();
        foreach(array_keys($params) as $key)
            $url_parts[] = $key . "=" . str_replace('%7E', '~', rawurlencode($params[$key]));

        sort($url_parts);

        $url_string = implode("&", $url_parts);
        $string_to_sign = "GET\nmws.amazonservices.com\n/Orders/2013-09-01\n" . $url_string;

        $signature = hash_hmac("sha256", $string_to_sign, "N/IAiBhdOyGbENLqNdXX4XMdaiUPqpwiALETuKRo", TRUE);

        $signature = urlencode(base64_encode($signature));

        $url = "https://mws.amazonservices.com/Orders/2013-09-01" . '?' . $url_string . "&Signature=" . $signature;
        $ch = curl_init();
        $header[] = "Content-type: text/xml";
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_TIMEOUT, 15);
        curl_setopt($ch, CURLOPT_HTTPHEADER,$header);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        $response = curl_exec($ch);
        $parsed_xml = simplexml_load_string($response);
        $parsed_json = json_decode(json_encode($parsed_xml),true);
        $data = $parsed_json['ListOrdersResult']['Orders']['Order'];
        $sql = '';
        for($i = 0;$i<count($data);$i++){
            $LatestShipDate=$data[$i]['LatestShipDate'];
            $OrderType=$data[$i]['OrderType'];
            $PurchaseDate=$data[$i]['PurchaseDate'];
            $AmazonOrderId=$data[$i]['AmazonOrderId'];
            $BuyerEmail=$data[$i]['BuyerEmail'];
            $IsReplacementOrder=$data[$i]['IsReplacementOrder'];
            $LastUpdateDate=$data[$i]['LastUpdateDate'];
            $NumberOfItemsShipped=$data[$i]['NumberOfItemsShipped'];
            $ShipServiceLevel=$data[$i]['ShipServiceLevel'];
            $OrderStatus=$data[$i]['OrderStatus'];
            $SalesChannel=$data[$i]['SalesChannel'];
            $IsBusinessOrder=$data[$i]['IsBusinessOrder'];
            $NumberOfItemsUnshipped=$data[$i]['NumberOfItemsUnshipped'];
            $PaymentMethodDetail=$data[$i]['PaymentMethodDetails']['PaymentMethodDetail'];
            $BuyerName=$data[$i]['BuyerName'];
            $CurrencyCode=$data[$i]['OrderTotal']['CurrencyCode'];
            $Amount=$data[$i]['OrderTotal']['Amount'];
            $IsPremiumOrder=$data[$i]['IsPremiumOrder'];
            $EarliestShipDate=$data[$i]['EarliestShipDate'];
            $MarketplaceId=$data[$i]['MarketplaceId'];
            $FulfillmentChannel=$data[$i]['FulfillmentChannel'];
            $PaymentMethod=$data[$i]['PaymentMethod'];
            $City=$data[$i]['ShippingAddress']['City'];
            $PostalCode=$data[$i]['ShippingAddress']['PostalCode'];
            $StateOrRegion=$data[$i]['ShippingAddress']['StateOrRegion'];
            $CountryCode=$data[$i]['ShippingAddress']['CountryCode'];
            $Name=$data[$i]['ShippingAddress']['Name'];
            $AddressLine1=$data[$i]['ShippingAddress']['AddressLine1'];
            $AddressLine2=$data[$i]['ShippingAddress']['AddressLine1'];
            $IsPrime=$data[$i]['IsPrime'];
            $ShipmentServiceLevelCategory=$data[$i]['ShipmentServiceLevelCategory'];
            $SellerOrderId=$data[$i]['SellerOrderId'];
            $CreatedBefore=$parsed_json['ListOrdersResult']['CreatedBefore'];
            $RequestId=$parsed_json['ResponseMetadata']['RequestId'];
            $sql = "insert into amz_order VALUE (
                    '$LatestShipDate',
                    '$OrderType',
                    '$PurchaseDate',
                    '$AmazonOrderId',
                    '$BuyerEmail',
                    '$IsReplacementOrder',
                    '$LastUpdateDate',
                    '$NumberOfItemsShipped',
                    '$ShipServiceLevel',
                    '$OrderStatus',
                    '$SalesChannel',
                    '$IsBusinessOrder',
                    '$NumberOfItemsUnshipped',
                    '$PaymentMethodDetail',
                    '$BuyerName',
                    '$CurrencyCode',
                    '$Amount',
                    '$IsPremiumOrder',
                    '$EarliestShipDate',
                    '$MarketplaceId',
                    '$FulfillmentChannel',
                    '$PaymentMethod',
                    '$City',
                    '$PostalCode',
                    '$StateOrRegion',
                    '$CountryCode',
                    '$Name',
                    '$AddressLine1',
                    '$AddressLine2',
                    '$IsPrime',
                    '$ShipmentServiceLevelCategory',
                    '$SellerOrderId',
                    '$CreatedBefore',
                    '$RequestId')";
                    $mysqli->query($sql);
        }
        echo "插入成功成功！<br/>";
        $mysqli->close();
    }
}

$test = new test();
$test->exptable();