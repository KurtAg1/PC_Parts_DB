<h2>Item List</h2>
<table class="table table-bordered">
  <thead class="thead-dark">
    <tr>
      <th>ID</th>
      <th>Name</th>
      <th>Description</th>
      <th>Category</th>
      <th>Status</th>
      <th>Location</th>
      <?php if (isset($_SESSION['adminUser'])) {
        echo "<th>Action</th>";
      } ?>
    </tr>
  </thead>
  <tbody>
    <?php
    foreach ($items as $item) {
      echo "<tr>";
      echo "<td>$item->id</td>";
      echo "<td>$item->name</td>";
      echo "<td>$item->description</td>";
      echo "<td>$item->category</td>";
      echo "<td>$item->status</td>";
      echo "<td>$item->location</td>";
      if (isset($_SESSION['adminUser'])) {
        echo "<td><a class='btn btn-primary'>Edit</a> <a href='index.php?deleteItem=$item->id' class='btn btn-danger'>Delete</a></td>";
      }
      echo "</tr>";
    }
    ?>
  </tbody>
</table>