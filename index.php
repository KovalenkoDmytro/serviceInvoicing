<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" class="wrapper">
    <label for="date">Data wystawienia</label>
    <input type="date" name="date" id="date">

    <label for="documentNumber">Numer</label>
    <input type="text" name="documentNumber" id="documentNumber">

    <label for="seller">Sprzedawca</label>
    <input type="text" name="seller" id="seller">

    <label for="sellerTaxId">NIP</label>
    <input type="text" name="sellerTaxId" id="sellerTaxId">

    <label for="street">Ulica</label>
    <input type="text" name="street" id="street">

    <label for="city">Miasto </label>
    <input type="text" name="city" id="city">

    <label for="customer">Nabywca</label>
    <input type="text" name="customer" id="customer">

    <label for="customerTaxId">NIP</label>
    <input type="text" name="customerTaxId" id="customerTaxId">

    <label for="customerStreet">Ulica</label>
    <input type="text" name="customerStreet" id="customerStreet">

    <label for="customerCity">Miasto</label>
    <input type="text" name="customerCity" id="customerCity">

    <div class="goodsWrapper">
        <label for="goodsName">Nazwa towaru lub usługi</label>
        <textarea name="goodsName" id="goodsName"></textarea>

        <label for="price">Cena</label>
        <input type="text" name="price" id="price">

        <label for="rateTax"> Stawka VAT</label>
        <select name="rateTax" id="rateTax">
            <option value="8">8</option>
            <option value="23">23</option>
        </select>

        <label for="dataPay">Termin płatności</label>
        <input type="text" name="dataPay" id="dataPay">

        <label for="acountNumber">Numer konta</label>
        <input type="text" name="acountNumber" id="acountNumber">

    </div>
    <button type="submit">Wystawić fakturę</button>
</form>



<div class="wrapper">



</div>

<?php
session_start();

//setcookie('Invoices',implode($_POST));
//$invoices = $_COOKIE['Invoices'];
//var_dump($invoices);

//$coocies = null ;

//var_dump($_COOKIE['Invoice']);
//
//
//
//var_dump($_SESSION);
//var_dump($_COOKIE);

var_dump($_POST);

//$cookies = $_COOKIE['Invoices'] ;


$newInvoice = [];
array_push($newInvoice,json_encode($_POST));
$newInvoice = serialize($newInvoice);
setcookie('Invoices2',$newInvoice);

//  получаем куки и добавляем к ним следующие

$cookies = $_COOKIE['Invoices'];
var_dump($cookies);
$aaa=  explode(',',$cookies);

var_dump($aaa);
?>





</body>
</html>