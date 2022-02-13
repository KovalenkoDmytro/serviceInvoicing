<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<form action="progressingForm.php" method="post" class="wrapper">
    <label for="date">Data wystawienia</label>
    <input type="date" name="date" id="date" required>

    <label for="documentNumber">Numer</label>
    <input type="text" name="documentNumber" id="documentNumber" required>

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



    </div>
    <button type="submit">Wystawić fakturę</button>

    <a href="Table.php" title="invoicesList">Lista wystawionych faktur</a>


</form>




</body>
</html>