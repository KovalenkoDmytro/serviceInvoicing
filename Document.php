<?php

require 'vendor/autoload.php';

use Dompdf\Dompdf;


class Document
{
    private array $get = [];
    private string $fileName = '';
    private array $invoices = [];
    private string $documnetNumber = '';
    private object $invoice;
    private string $products = '';
    public string $html = '';


    public function __construct($fileName, $get)
    {
        $this->fileName = $fileName;
        $this->get = $get;
    }

    public function setInvoices()
    {
        $fileContent = file_get_contents($this->fileName);
        $invoices = json_decode($fileContent);
        $this->invoices = $invoices;
    }

    public function setDocumentNumber()
    {
        $this->documnetNumber = $this->get['docNum'];
    }

    public function setInvoice()
    {
        foreach ($this->invoices as $invoice) {
            if ($invoice->documentNumber == $this->documnetNumber) {
                $this->invoice = $invoice;
                $this->setProducts();
                $this->setHtml($this->invoice);

            }
        }
    }

   private function setProducts(){

    $count = 0;
    foreach ($this->invoice as $key => $value) {
        if(str_contains($key,'product-name')){
            $count+=1;
            $this->products = $this->products."<td>$count</td><td>$value</td>";
        }
        if(str_contains($key,'product-price')){
            $this->products = $this->products."<td>$value</td></tr>";
        }
    }
   }


    private function setHtml($invoice)
    {
        $this->html = "
        <div class='logo'>LOGO</div>
            <div class='dateDocument'>Data wystawienia
                 {$this->invoice->date}
            </div>
             <div class='seller'>Sprzedawca
                {$this->invoice->seller}
                <span>NIP:  {$this->invoice->sellerTaxId}</span>
                <span>Miasto: {$this->invoice->city}</span>
                <span>Ulica: {$this->invoice->street}</span>
            </div>
             <div class='seller'>Nabywca
                {$this->invoice->customer}
                <span>NIP:  {$this->invoice->customerTaxId}</span>
                <span>Miasto: {$this->invoice->customerStreet}</span>
                <span>Ulica: {$this->invoice->customerCity}</span>
                
            </div>
            <h2>Faktura VAT {$this->invoice->documentNumber}</h2>
            <table class='goods' style='border: 1px solid gray'>
            <thead>
            <tr>
                <th style='background: #a09aa5; padding: 5px'>#</th>
                <th style='background: #a09aa5; padding: 5px'>Nazwa towaru/usługi</th>
                <th style='background: #a09aa5; padding: 5px'>Cena</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                  {$this->products}
            </tr>
            </tbody>
            </table>
        ";

    }





}


if (isset($_GET)) {
    $html = new Document('dataBase.txt', $_GET);
    $html->setInvoices();
    $html->setDocumentNumber();
    $html->setInvoice();


    $dompdf = new Dompdf();
    $dompdf->loadHtml($html->html);
    $dompdf->setPaper('A4',);
    $dompdf->render();
    $dompdf->stream();

}




