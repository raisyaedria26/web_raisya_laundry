    <?php
    $query = mysqli_query($config, "SELECT c.name, `to`.* FROM trans_orders `to` 
  LEFT JOIN customers c ON c.id = to.customer_id 
  ORDER BY to.id DESC");
    $rows = mysqli_fetch_all($query, MYSQLI_ASSOC);

    if (isset($_GET['delete'])) {
      $id   = $_GET['delete'];

      $delete = mysqli_query($config, "DELETE FROM trans_orders WHERE id = $id");
      if ($delete) {
        header("location:?page=order");
      }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Document</title>


      <!-- <style>
        .report-logo {
          width: 120px;
          height: 120px;
          object-fit: cover;
          border-radius: 40%;
          /* BIKIN BULAT */
          margin-bottom: 5px;
        }

        @media print {
          .no-print {
            display: none !important;
          }

          .card {
            border: none !important;
          }

          .report-logo {
            width: 120px;
            height: 120px;
          }
        }
      </style> -->
    </head>

    <body>
      <div class="row">
        <div class="col-sm-12">
          <div class="card">
            <div class="card-header">
              <div class="text-center">
                <img src="assets/uploads/logo laundry.png" alt="Logo RAISYA" class="report-logo" width="170px"><br>
                <h3 class="text-center">Data Report Laundry Raisya <i class="bi bi-journal-text"></i></h3>
                <p class="mb-0">Jl. Urip Sumohardjo, Gumilir, No.249</p>
                <p class="mt-0">(080) 5462831</p>

              </div>

            </div>
            <div class="card-body">
              <table class="table table-bordered table-striped">
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Order Code</th>
                  <th>Order End Date</th>
                  <th>Order Ammount</th>
                  <th>Order Tax</th>
                  <th>Order Pay</th>
                  <th>Order Change</th>
                  <th>Status</th>
                  <th class="d-print-none">Actions</th>

                </tr>

                <?php
                foreach ($rows as $key => $value) {
                  $sumTotal = 0;
                  $sumPay   = 0;
                  // akumulasi total
                  $sumTotal  += $value['order_total'];
                  $sumPay    += $value['order_pay'];
                ?>
                  <tr>

                    <td><?php echo $key + 1 ?></td>
                    <td><?php echo $value['name'] ?></td>
                    <td><?php echo $value['order_code'] ?></td>
                    <td><?php echo $value['order_end_date'] ?></td>
                    <td>Rp <?php echo number_format($value['order_total']) ?></td>
                    <td>Rp <?php echo number_format($value['order_tax']) ?></td>
                    <td>Rp <?php echo number_format($value['order_pay']) ?></td>
                    <td>Rp <?php echo number_format($value['order_change']) ?></td>
                    <td class="text-center"><?php echo $value['order_status'] == 0 ? '<span class="badge text-bg-warning fs-6">onProcess</span>' : '<span class="badge text-bg-success fs-6">Done</span>' ?></td>
                    <td class="d-print-none">
                      <a href="?page=tambah-report&edit=<?php echo $value['id'] ?>" class="btn btn-outline-warning btn-sm">
                        <i class="bi bi-pencil-fill"></i>
                      </a>
                      <a href="?page=report&delete=<?php echo $value['id'] ?>" class="btn btn-outline-danger btn-sm" onclick="return confirm('Apakah anda yakin akan menghapus')">
                        <i class="bi bi-trash-fill"></i>
                      </a>
                    </td>
                  </tr>
                <?php
                }
                ?>
                <tfoot>
                  <tr>
                    <th colspan="8" class="text-right">TOTAL</th>
                    <th colspan="2" class="text-left"><?= "Rp " . number_format(array_sum(array_column($rows, 'order_total')), 0, ',', '.') ?></th>
                  </tr>
                </tfoot>
              </table>

              <button class="btn btn-primary d-print-none" onclick="window.print()"><i class="bi bi-printer"></i> Print Report</button>
            </div>
          </div>
        </div>
      </div>

    </body>

    </html>