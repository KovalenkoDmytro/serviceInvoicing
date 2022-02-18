<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>InvoicesConfigurator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        table{
            caption-side: top;
        }
    </style>
</head>
<body>
<form action="progressingForm.php" method="post" class="d-flex  flex-wrap flex-column container-lg mt-5">
    <table class="col-3" style="border: 1px solid gray">
        <thead>
        <tr>
            <th style="background: #a09aa5; padding: 5px">Data wystawienia</th>
            <th style="background: #a09aa5; padding: 5px">Numer dokumentu</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><input type="date" name="date" id="date" required></td>
            <td><input type="text" name="documentNumber" id="documentNumber" required></td>
        </tr>
        </tbody>
    </table>
    <table class="col-6" style="border: 1px solid gray">
        <caption>Sprzedawca</caption>
        <thead>
        <tr>
            <th style="background: #a09aa5; padding: 5px">Nazwa</th>
            <th style="background: #a09aa5; padding: 5px">NIP</th>
            <th style="background: #a09aa5; padding: 5px">Ulica</th>
            <th style="background: #a09aa5; padding: 5px">Miasto</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><input type="text" name="seller" id="seller"></td>
            <td><input type="text" name="sellerTaxId" id="sellerTaxId"></td>
            <td><input type="text" name="street" id="street"></td>
            <td><input type="text" name="city" id="city"></td>
        </tr>
        </tbody>
    </table>
    <table class="col-6" style="border: 1px solid gray">
        <caption>Nabywca</caption>
        <thead>
        <tr>
            <th style="background: #a09aa5; padding: 5px">Nazwa</th>
            <th style="background: #a09aa5; padding: 5px">NIP</th>
            <th style="background: #a09aa5; padding: 5px">Ulica</th>
            <th style="background: #a09aa5; padding: 5px">Miasto</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><input type="text" name="customer" id="customer"></td>
            <td><input type="text" name="customerTaxId" id="customerTaxId"></td>
            <td><input type="text" name="customerStreet" id="customerStreet"></td>
            <td><input type="text" name="customerCity" id="customerCity"></td>
        </tr>
        </tbody>
    </table>
    <table class="col-4 mb-3 goodsWrapper"  style="border: 1px solid gray">
            <caption>Towary</caption>
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


    <div class="buttons">
        <button class="btn btn-warning" id="addProduct">Dodać produkt/Uslugę</button>
        <a class="btn btn-primary" href="Table.php" title="invoicesList">Lista wystawionych faktur</a>
        <button class="btn btn-success" type="submit">Wystawić fakturę</button>
    </div>






    <!---->
    <!--    <label for="date">Data wystawienia</label>-->
    <!--    <input type="date" name="date" id="date" required>-->

    <!--    <label for="documentNumber">Numer</label>-->
    <!--    <input type="text" name="documentNumber" id="documentNumber" required>-->

    <!--    <label for="seller">Sprzedawca</label>-->
    <!--    <input type="text" name="seller" id="seller">-->
    <!---->
    <!--    <label for="sellerTaxId">NIP</label>-->
    <!--    <input type="text" name="sellerTaxId" id="sellerTaxId">-->
    <!---->
    <!--    <label for="street">Ulica</label>-->
    <!--    <input type="text" name="street" id="street">-->
    <!---->
    <!--    <label for="city">Miasto </label>-->
    <!--    <input type="text" name="city" id="city">-->

    <!--    <label for="customer">Nabywca</label>-->
    <!--    <input type="text" name="customer" id="customer">-->
    <!---->
    <!--    <label for="customerTaxId">NIP</label>-->
    <!--    <input type="text" name="customerTaxId" id="customerTaxId">-->
    <!---->
    <!--    <label for="customerStreet">Ulica</label>-->
    <!--    <input type="text" name="customerStreet" id="customerStreet">-->
    <!---->
    <!--    <label for="customerCity">Miasto</label>-->
    <!--    <input type="text" name="customerCity" id="customerCity">-->

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


        for (let i = 0; i < goodsInputs.length; i++) {
            goodsInputs[i].setAttribute('name',`product-name_${i+1}`);
            inputPrice[i].setAttribute('name',`product-price_${i+1}`);
            productsNumber[i].textContent = i+1;
        }




    }
</script>





</body>
</html>