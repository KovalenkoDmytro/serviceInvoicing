<?php


function addInvoiceToDB($invoice)
{
    if (($_COOKIE['Invoices'] !== null) && (count($invoice) !== 0)) {
        $result = json_decode($_COOKIE['Invoices'], true);
        array_push($result, $invoice);
        setcookie('Invoices', json_encode($result));
    } else {
        $invoices = [];
        array_push($invoices, $invoice);
        setcookie('Invoices', json_encode($invoices));
    }
}


if (isset($_POST)) {
    addInvoiceToDB($_POST);
    Header("Location: index.php");
    var_dump(($_POST));
    exit;
}
