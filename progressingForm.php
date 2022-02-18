<?php

function addInvoiceToDB($invoice, $fileName)
{
    if(filesize($fileName)>0){
        $firstProduct = file_get_contents($fileName);
        var_dump($firstProduct);
        $updateGoods =json_decode($firstProduct);
        $object = (object) $invoice;
        array_push($updateGoods,$object);
        $strInvoices = json_encode($updateGoods);
        $file = fopen($fileName,'w');
        fwrite($file,$strInvoices);
        echo 'second';
    }else{
        $file = fopen($fileName,'w');
        $goods = [];
        array_push($goods,$invoice);
        $strInvoice = json_encode($goods);
        fwrite($file,$strInvoice);
        echo 'first';
    }
}



if (isset($_POST)) {
    addInvoiceToDB($_POST,'dataBase.txt');
    Header("Location: index.php");
    exit;
}





