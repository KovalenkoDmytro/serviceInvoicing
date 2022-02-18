<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>InvoicesConfigurator</title>
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



        <table class="goodsWrapper" style="border: 1px solid gray">
            <thead>
                <tr>
                    <th style="background: #a09aa5; padding: 5px">#</th>
                    <th style="background: #a09aa5; padding: 5px">Nazwa towaru/usługi</th>
                    <th style="background: #a09aa5; padding: 5px">Cena</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td id="productNumber">1</td>
                    <td><input id="productName" name="product-name_1"></td>
                    <td><input id="productPrice" name="product-price_1"></td>
                </tr>
            </tbody>
            </table>

    <button id="addProduct">Dodać produkt/Uslugę</button>

    <div class="buttons">
        <a href="Table.php" title="invoicesList">Lista wystawionych faktur</a>
        <button type="submit">Wystawić fakturę</button>
        <a id="createInvoice" href="Document.php" title="invoices">FakturaVAT</a>
    </div>



</form>




<script>
    const addProductBtn = document.querySelector('#addProduct');
    const productName = document.querySelector('#goodsName');

    addProductBtn.addEventListener('click',(event)=>{
        event.preventDefault();
        createTableWithGoods();
    });

    function createTableWithGoods(){
        const wrapperGoods = document.querySelector('.goodsWrapper tbody');

        const product = document.createElement('tr');
        const productNumber =document.createElement('td');
        const productName =document.createElement('td');
        const productPrice =document.createElement('td');

        const productInputName = document.createElement('input');
        const productInputPrice = document.createElement('input');
        productInputName.setAttribute('id','productName');
        productInputPrice.setAttribute('id','productPrice');
        productNumber.setAttribute('id','productNumber');


        productName.appendChild(productInputName);
        productPrice.appendChild(productInputPrice);

        product.append(productNumber,productName,productPrice);
        wrapperGoods.appendChild(product);


        const productsNumber = document.querySelectorAll('.goodsWrapper #productNumber');
        const goodsInputs = document.querySelectorAll('#productName');
        const inputPrice = document.querySelectorAll('#productPrice');


        for (let i = 1; i < goodsInputs.length+1; i++) {
            goodsInputs[i].setAttribute('name',`product-name_${i+1}`);
            inputPrice[i].setAttribute('name',`product-price_${i+1}`);
            productsNumber[i].textContent = i+1;
        }
    }
</script>





</body>
</html>