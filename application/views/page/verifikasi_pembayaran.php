<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">First</th>
        <th scope="col">Last</th>
        <th scope="col">Handle</th>
        <th scope="col">Handle</th>
        <th scope="col">Action</th>
      </tr>
    </thead>

    <tbody>
      <?php
      foreach ($orders as $row) :
      ?>
        <tr>
          <th scope="row">1</th>
          <td><?php echo $row->id_customer; ?></td>
          <td><?php echo $row->nama_produk; ?></td>
          <td><?php echo $row->harga; ?></td>



          <td><?php echo $row->payment_method; ?></td>
          <td><button class="btn btn-primary">Verifikasi Pembayaran</button></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</body>

</html>