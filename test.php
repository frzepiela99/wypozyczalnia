<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["admin"] != 1) {
    header("location: index.php");
    exit;
}
require_once __DIR__ . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf();
$mpdf->WriteHTML('
<style>
   td, th{
      border:1px solid #555;
   }
   th{
      background:#eee;
   }
   table{
      width:100%;
   }
   tr,td,th{
      margin:0;
      padding:16px;
   }
</style>
<h1>📚 Wypożyczenia użytkownika   echo $imie; echo " $nazwisko";></h1><br>
<img src="https://upload.wikimedia.org/wikipedia/commons/8/8d/Emperor_penguin.jpg">
<pagebreak/>
<p>Test</p>
<pagebreak/>
<table id="table_id" class="display">
   <thead>
   <tr>
      <th>Kolumna 1</th>
      <th>Kolumna 2</th>
   </tr>
   </thead>
   <tbody>
      <tr>
         <td>Wiersz 1 Komórka 1</td>
         <td>Wiersz 1 Komórka 2</td>
      </tr>
      <tr>
         <td>Wiersz 2 Komórka 1</td>
         <td>Wiersz 2 Komórka 2</td>
      </tr>
   </tbody>
</table>
<pagebreak/>
<p>Test</p>
');
$mpdf->Output();