<?php include 'header.php'; ?>
<?php require 'conn.php'; ?>

<style>
 .hghj th{
    background-color: #000;
  }
  .hghj td{
    background-color: #000;
  }

</style>

<br>
<br>

<br>
<div class="container mt-5 ">
  <h2>Manage Artworks</h2>
  <br>
  
  <div class="table-responsive">
    <table class="table table-bordered table-dark hghj">
      <thead>
        <tr>
          <th>ID</th>
          <th>Name</th>
          <th>Description</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Sample Name 1</td>
          <td>Sample Description 1</td>
          <td>
            <button class="btn btn-primary">Update</button>
            <button class="btn btn-danger">Delete</button>
          </td>
        </tr>
        <tr>
          <td>2</td>
          <td>Sample Name 2</td>
          <td>Sample Description 2</td>
          <td>
            <button class="btn btn-primary">Update</button>
            <button class="btn btn-danger">Delete</button>
          </td>
        </tr>
        <!-- Add more rows as needed -->
      </tbody>
    </table>
  </div>
</div>
<br>

<?php include 'footer.php';?>