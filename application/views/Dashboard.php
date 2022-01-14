<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Dashboard | Majoo Teknologi Indonesia</title>
  </head>
  <body>
    <nav class="navbar navbar-dark bg-dark">
      <div class="container">
        <span class="navbar-brand mb-0 h1">Majoo Teknologi Indonesia</span>
      </div>
    </nav>

    <section>
    <div class="container">
      <h2 class="mt-2">Produk</h2>
      <div class="row">
      <?php foreach ($product as $data) { ?>
        <div class="col-md-3 mb-3">
          <div class="card h-100">
            <img src="<?= $data['image']; ?>" class="card-img-top" alt="Product Image">
            <div class="card-body d-flex flex-column justify-content-between">
              <div>
                <h5 class="card-title text-center"><?= $data['name']; ?></h5>
                <h6 class="card-title text-center">Rp <?= number_format($data['price']); ?></h6>
                <p class="card-text text-left"><?= $data['desc']; ?></p>
              </div>
              <div class="text-center pt-3">
                <a href="#" class="px-5 btn btn-outline-dark btn-sm">Buy</a>
              </div>
            </div>
          </div>
        </div>
        <?php } ?>
      </div>
    </div>

    <footer class="pt-4 my-4 border-top border-dark">
      <p class="text-center">2022 &copy; PT Majoo Teknologi Indonesia</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

  </body>
</html>
