<?php
session_start();
include '../config/config.php';
// DESC, MAX
$id    = $_GET['id'] ?? '';

$query = mysqli_query($config, "SELECT * FROM trans_orders WHERE id='$id' ORDER BY id DESC");
$row   = mysqli_fetch_assoc($query);

$order_id = $row['id'];
$queryDetails = mysqli_query($config, "SELECT s.name, od.* FROM trans_order_details od LEFT JOIN services s ON s.id = od.service_id WHERE order_id = '$order_id'");
$rowDetails = mysqli_fetch_all($queryDetails, MYSQLI_ASSOC);

$queryTax = mysqli_query($config, "SELECT * FROM taxs WHERE is_active = 1");
$taxs     = mysqli_fetch_assoc($queryTax);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Struk Transaksi Laundry</title>

  <!-- internal css: kode css ada di file html -->
  <!-- external css: kode css ada di file .css baru dipanggil file html -->
  <style>
    body {
      width: 80mm;
      font-family: 'Courier New', Courier, monospace;
      margin: 0 auto;
      padding: 10px;
      background-color: white;
    }

    .struck-page {
      width: 100%;
      font-size: 12px;
    }

    h2,
    p {
      text-align: center;
      margin-bottom: 15px;

    }

    .header {
      text-align: center;
      margin-bottom: 15px;
    }

    .header h2 {
      font-size: 20px;
      margin: 0 0 10px 0;
      font-weight: bolder;
    }

    .header p {
      margin: 3px 0;
      font-size: 11px;
    }

    .info {
      margin: 15px 0;
      font-size: 11px;
    }

    .info-row {
      display: flex;
      justify-content: space-between;
      margin: 3px 0;
    }

    .separator {
      border-top: 1px dashed #000;
      margin: 10px 0;
    }

    .items {
      margin: 10px 0;
    }

    .item {
      display: flex;
      justify-content: space-between;
      margin: 8px 0;
      font-size: 12px;
    }

    .item-qty {
      margin: 0 10px;
      flex: 1;
    }

    .item-price {
      text-align: right;
      min-width: 80px;
    }

    .totals {
      margin-top: 15px;
    }

    .total-row {
      display: flex;
      justify-content: space-between;
      margin: 5px 0;
      font-size: 12px;
    }

    .total-row.grand {
      font-weight: bold;
      font-size: 16px;
      margin: 10px 0;
    }

    .paymentt {
      margin-top: 10px;
    }

    @media print {
      body {
        margin: 0 auto;
        padding: 0;
      }

      @page {
        margin: 0 auto;
        size: 80mm auto;
      }
    }
  </style>
</head>

<body onload="window.print()">
  <div class="struck-page">
    <div class="header">
      <h6>Payment Struck</h6>
      <p>Jl Mangga 2, Jakarta Barat</p>
      <p>082153882167</p>
    </div>
    <div class="info">
      <div class="info-row">
        <?php
        // strtotime
        $date = date("d-m-Y", strtotime($row['created_at']));
        $time = date("H:i:s", strtotime($row['created_at']));
        ?>
        <span><?php echo $date  ?></span>
        <span><?php echo $time  ?></span>
      </div>
      <div class="info-row">
        <span>Transaction id</span>
        <span>#<?php echo $row['order_code'] ?></span>
      </div>
      <div class="info-row">
        <span>Cashier Name</span>
        <span><?php echo $_SESSION['NAME'] ?></span>
      </div>
    </div>
    <div class="separator"></div>
    <div class="items">
      <?php foreach ($rowDetails as $item): ?>
        <div class="item">
          <span class="item-name"><?php echo $item['name'] ?></span>
          <span class="item-qty"><?php echo $item['qty'] ?></span>
          <span class="item-price">Rp. <?php echo number_format($item['price']) ?> </span>
        </div>
      <?php endforeach ?>
    </div>
    <div class="separator"></div>
    <div class="totals">
      <?php foreach ($rowDetails as $detail): ?>
        <div class="total-row">
          <span>Sub Total</span>
          <span><?php echo "Rp. " . number_format($detail['subtotal'], 0, ',', '.') ?></span>
        </div>
      <?php endforeach ?>
      <div class="total-row">
        <span>Ppn (<?php $taxs['percent'] ?>)</span>
        <span><?php echo "Rp. " . number_format($row['order_tax'], 0, ',', ',') ?></span>
      </div>
      <div class="separator"></div>
      <div class="total-row grand">
        <span>Total</span>
        <span>Rp. <?php echo $row['order_total'] ?></span>
      </div>
    </div>
    <div class="payment">
      <div class="total-row">
        <span>Cash</span>
        <span><?php echo "Rp. " . number_format($row['order_pay'], 0, ',', ',') ?> </span>
      </div>
      <div class="total-row">
        <span>Change</span>
        <span><?php echo "Rp. " . number_format($row['order_change'], 0, ',', ',') ?> </span>
      </div>
    </div>
  </div>
  <hr>


</body>

</html>