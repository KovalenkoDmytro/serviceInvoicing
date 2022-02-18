<?php


class Table
{

    private $invoices;

    private function createEmptyTable()
    {
        echo '<table class="countDoc" style="border: 1px solid gray">
            <thead>
                <tr>
                    <th style="background: #a09aa5; padding: 5px">#</th>
                    <th style="background: #a09aa5; padding: 5px">Data wystawienia</th>
                    <th style="background: #a09aa5; padding: 5px">Numer dokumentu</th>
                    <th style="background: #a09aa5; padding: 5px">Nabywca</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th colspan="4" style="padding: 15px 30px">Brak wystawionych faktur <a href="index.php" title="newInvoice">Wystawic nową fakturę</a></th>
                </tr>
            </tbody>
        </table>';
    }

    public function showTable()
    {
        if (file_exists('dataBase.txt')){
            $fileContent = file_get_contents('dataBase.txt');
            $invoices = json_decode($fileContent);
            $this->invoices = $invoices;
        }


        if (file_exists('dataBase.txt') && filesize('dataBase.txt') > 2) {
            ?>
            <table class="countDoc" style="border: 1px solid gray">
                <thead>
                <tr>
                    <th style="background: #a09aa5; padding: 5px">#</th>
                    <th style="background: #a09aa5; padding: 5px">Data wystawienia</th>
                    <th style="background: #a09aa5; padding: 5px">Numer dokumentu</th>
                    <th style="background: #a09aa5; padding: 5px">Nabywca</th>
                    <th style="background: #a09aa5; padding: 5px">Usuwanie dokumenta</th>
                    <th style="background: #a09aa5; padding: 5px">FakturaVAT</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $i = 1;
                foreach ($this->invoices as $invoice) {
                    echo "<tr>
                                    <td>$i</td>
                                    <td>{$invoice->date}</td>
                                    <td>{$invoice->documentNumber}</td>
                                    <td>{$invoice->customer}</td>
                                    <td style='text-align: center'><a href='{$_SERVER['PHP_SELF']}?remove=invoice&remove={$invoice->documentNumber}' >Usunąc</a></td>
                                     <td><a href='Document.php?invoice=download&docNum={$invoice->documentNumber}'>Pobrać</a></td>
                                 </tr>";
                    $i++;
                }
                ?>
                </tbody>
            </table>
            <a href="index.php" title="newInvoice">Wystawic nową fakturę</a>
            <?php
        } else {
            $this->createEmptyTable();
        }

    }

    public function refreshInvoicesInDB(string $documentNumber)
    {
        if (count($this->invoices) > 0) {

            for ($i = 0; $i <= count($this->invoices) - 1; $i++) {
                if ($this->invoices[$i]->documentNumber === $documentNumber) {
                    unset($this->invoices[$i]);
                }
            }
            $file = fopen('dataBase.txt', 'w+');
            $newDataBase = json_encode($this->invoices);
            fwrite($file, $newDataBase);
        }
    }

}

$newTable = new Table();
$newTable->showTable();


if (isset($_GET['remove'])) {
    $documentRemoveNumber = $_GET['remove'];
    $newTable->refreshInvoicesInDB($documentRemoveNumber);
    Header("Location: Table.php");
    exit;
}







