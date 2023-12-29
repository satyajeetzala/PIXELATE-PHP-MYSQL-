<?php require 'conn.php'; ?>
<?php include 'sidebar.php'; ?>
 
<style>
  .whitetextt td{
    color:#fff;
    border: 2px solid #45155c;
  }
  .whitetextt tr{
    color:#fff;
    border: 2px solid #45155c;
  }
  .whitetextt thead {
    color:#fff;
    border: 2px solid #45155c;
  }
  .whitetextt th{
    color:#fff;
    border: 2px solid #45155c;
  }

        .custom-table {
            border: 2px solid rgb(2,1,24); /* Red border color */
        }
  

</style>

<br>
<br>

<br>
<div class="container mt-5" style="background: rgb(2,1,24);
background: linear-gradient(297deg, rgba(2,1,24,1) 0%, rgba(28,3,39,1) 57%, rgba(31,2,26,1) 76%);border-radius:17px">
    <!-- <h2>Categories</h2> -->
    <div class="row mt-2">
        
    <div class="col-6">
    <br>
      <h2 class="mb-5">Manage Categories</h2>
    </div>
    <div class="col-6 text-right">
    <br>
      <a href="addnew.php"><button class="btn btn-primary" >Add New </button></a>
    </div>
  </div>
    <div class="table-responsive" >
        <table class="table table-bordered whitetextt rounded" >
            <!-- <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Thumbnail</th>
                    <th>Actions</th>
                </tr>
            </thead> -->
            <tbody>
            <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Thumbnail</th>
                    <th>Actions</th>
                </tr>
                <tr>
                    <td>1</td>
                    <td>Nature</td>
                    <td><img src="categories/nature.jpg" width="50"></td>
                    <td>Disabled</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Futuristic</td>
                    <td><img src="categories/futuristic.jpg" width="50"></td>
                    <td>Disabled</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Gaming Assets</td>
                    <td><img src="categories/gamingassets.jpeg" width="50"></td>
                    <td>Disabled</td>
                </tr>
                <?php
                $sql = "SELECT cat_id, cat_name, thumb FROM categories ORDER BY cat_id ASC LIMIT 3, 100";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['cat_id'] . "</td>";
                    echo "<td>" . $row['cat_name'] . "</td>";
                    echo "<td><img src='categories/" . $row['thumb'] . "' width='50'></td>";
                    echo "<td>
                            <a href='updatecategory.php?cat_id=" . $row['cat_id'] . "' class='btn btn-primary'>Update</a>
                            <a href='?delete_id=" . $row['cat_id'] . "' class='btn btn-danger' onclick='return confirm(\"Are you sure?\")'>Delete</a>
                          </td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>


    <!-- // Handle record deletion -->
<?php
if (isset($_GET['delete_id'])) {
    $id_to_delete = $_GET['delete_id'];
    $sql = "DELETE FROM categories WHERE cat_id = $id_to_delete";
    if ($conn->query($sql) === TRUE) {
        echo "Record with ID $id_to_delete deleted successfully.";
    } else {
        echo '"Error deleting record: " . $conn->error';
    }
}?>

