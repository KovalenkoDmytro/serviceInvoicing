<?php


class Table{

    private array $invoices = [];

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

    public function showTable(){
        if ($_COOKIE['Invoices'] !== null) {
            $this->invoices = json_decode($_COOKIE['Invoices'], true); ?>
            <table class="countDoc" style="border: 1px solid gray">
                <thead>
                <tr>
                    <th style="background: #a09aa5; padding: 5px">#</th>
                    <th style="background: #a09aa5; padding: 5px">Data wystawienia</th>
                    <th style="background: #a09aa5; padding: 5px">Numer dokumentu</th>
                    <th style="background: #a09aa5; padding: 5px">Nabywca</th>
                    <th style="background: #a09aa5; padding: 5px">Usuwanie dokumenta</th>
                </tr>
                </thead>
                <tbody>
                <?php
                        $i = 1;
                        foreach ($this->invoices as $invoice) {
                            echo "<tr>
                                    <td>$i</td>
                                    <td>{$invoice['date']}</td>
                                    <td>{$invoice['documentNumber']}</td>
                                    <td>{$invoice['customer']}</td>
                                    <td style='text-align: center'><a href='{$_SERVER['PHP_SELF']}?remove=invoice&remove={$invoice['documentNumber']}' >Usunąc</a></td>
                                 </tr>";
                            $i++;
                        }
                        ?>
                </tbody>
            </table>
        <?php
        } else {
            $this->createEmptyTable();
        }
    }

    public function refreshInvoicesInDB(string $documentNumber){
        if(count($this->invoices)>0) {
            // remove
            for ($i = 0; $i <= count($this->invoices) - 1; $i++) {
                if ($this->invoices[$i]['documentNumber'] === $documentNumber) {
                    unset($this->invoices[$i]);
                }
            }
            $newInvoices = array_values($this->invoices);
            //add new
            setCookie("Invoices","");
            if(count($newInvoices)>0){
                setCookie("Invoices",json_encode($newInvoices));
            }
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







