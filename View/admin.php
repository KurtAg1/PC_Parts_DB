<?php
$categoryList = $this->model->getCategoryList();
$statusList = $this->model->getStatusList();
$locationList = $this->model->getLocationList();

?>

<h2>Add Item</h2>
<form name="addItem" id="addItem" action="index.php?addItem" method="POST" role="form">
  <div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" class="form-control" placeholder="Name">
  </div>
  <div class="form-group">
    <label for="description">Description</label>
    <input type="text" name="description" class="form-control" placeholder="Description">
  </div>
  <div class="row">
    <div class="form-group col-md-4">
      <label for="categoryId">Category</label>
      <select name="categoryId" class="form-control">
        <?php
        foreach ($categoryList as $category) {
          echo "<option value='$category->id'>$category->category</option>";
        }
        ?>
      </select>
    </div>

    <div class="form-group col-md-4">
      <label for="statusId">Status</label>
      <select name="statusId" class="form-control">
        <?php
        foreach ($statusList as $status) {
          echo "<option value='$status->id'>$status->status</option>";
        }
        ?>
      </select>
    </div>

    <div class="form-group col-md-4">
      <label for="locationId">Location</label>
      <select name="locationId" class="form-control">
        <?php
        foreach ($locationList as $location) {
          echo "<option value='$location->id'>$location->location</option>";
        }
        ?>
      </select>
    </div>
  </div>

  <button type="submit" class="btn btn-primary">Add</button>
</form>