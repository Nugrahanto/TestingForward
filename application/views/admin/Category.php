<div class="row">
  <div class="col-md-12 fw-bold fs-3 mb-2">Category</div>
  <div class="mb-3">
  <?php 
    $message = $this->session->flashdata('message'); 
    if (isset($message)) {
        echo $message;
        $this->session->unset_userdata('message');
    } ?>
    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
      <span><i class="bi bi-plus-circle"></i></span> Add Category
    </button>
  </div>
  
  <div class="container">
      <table id="datatable" class="table">
        <thead>
          <th>No.</th>
          <th>ID</th>
          <th>Name</th>
          <th></th>
        </thead>
        <tbody>
          <?php 
          $no = 1;
          foreach ($category as $data) { ?>
            <tr>
              <td><?=$no?></td>
              <td><?= $data['id_cat']; ?></td>
              <td><?= $data['name']; ?></td>
              <td class="text-center">
                <button type="button" id="editCategory" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $data['id_cat'] ?>" data-name="<?=$data['name']?>">Edit</button>
                <a href="<?php echo base_url(); ?>admin/category/deleteCategory/<?= $data['id_cat'];?>" class="btn btn-sm btn-danger">Delete</a>
              </td>
            </tr>
          <?php $no++; } ?>
        </tbody>
      </table>
  </div>
</div>

<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form method="post" role="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/category/addCategory">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="input-group mb-3">
          <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
          <input type="text" class="form-control" name="name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
      </div>
      <div class="modal-footer">
      <input type="submit" class="btn btn-success" name="submit" value="Add Category">
      </div>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <form method="post" role="form" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/category/updateCategory">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="id" name="id_cat" hidden>
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text" id="inputGroup-sizing-default">Name</span>
          <input type="text" class="form-control" id="name" name="name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
      </div>
      <div class="modal-footer">
      <input type="submit" class="btn btn-success" name="submit" value="Add Category">
      </div>
      </form>
    </div>
  </div>
</div>