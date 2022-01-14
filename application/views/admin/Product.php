<div class="row">
  <div class="col-md-12 fw-bold fs-3 mb-2">Product</div>
  <div class="mb-3">
  <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
      <span><i class="bi bi-plus-circle"></i></span> Add Product
    </button>
  </div>
  
  <div class="container">
      <table id="datatable" class="table">
        <thead>
          <th>No.</th>
          <th>ID</th>
          <th>Name</th>
          <th>Price</th>
          <th>Desc</th>
        </thead>
        <tbody>
          <?php 
          $no = 1;
          foreach ($product as $data) { ?>
            <tr>
              <td><?=$no?></td>
              <td><?= $data['id']; ?></td>
              <td><?= $data['name']; ?></td>
              <td><?= $data['price']; ?></td>
              <td><?= $data['desc']; ?></td>
            </tr>
          <?php $no++; } ?>
        </tbody>
      </table>
  </div>
</div>

<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <form method="post" role="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/product/addProduct">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="input-group mb-3">
          <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
          <input type="text" class="form-control" name="name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="mb-3">
          <select class="form-select" name="id_cat" aria-label="Default select example">
            <option selected disabled>Select Category</option>
            <?php 
            foreach ($category as $data) { ?>
            <option value="<?= $data['id_cat'] ?>"><?= $data['name']; ?></option>
            <?php } ?>
          </select>
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text" id="inputGroup-sizing-default">Price</span>
          <input type="text" class="form-control" name="price" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text" id="inputGroup-sizing-default">Desc</span>
          <textarea class="form-control" name="desc" style="height: 150px"></textarea>
        </div>
        <div class="mb-3">
          <input class="form-control" name="image" type="file" id="formFile">
        </div>
      </div>
      <div class="modal-footer">
      <input type="submit" class="btn btn-success" name="submit" value="Add Product">
      </div>
      </form>
    </div>
  </div>
</div>