<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<div class="grid_10">
  <div class="box round first grid">
    <h2>Inbox</h2>
    <div class="block">
      <table class="data display datatable" id="example">
        <thead>
          <tr>
            <th>Serial No.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Message</th>
            <th>Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = "SELECT * FROM tbl_contact";
          $messageUser = $db->select($query);
          if ($messageUser) {
            while ($result = $messageUser->fetch_assoc()) {
              ?>
              <tr class="odd gradeX">
                <td><?php echo $result['id']; ?></td>
                <td><?php echo $result['firstname'].' '. $result['lastname']; ?></td>
                <td><?php echo $result['email']; ?></td>

                <td><?php echo $fm->formatPost($result['body'], 40); ?></td>
                <td><?php echo $fm->formatDate($result['time']); ?></td>
                <td>
                  <a href="viewmsg.php?msgid=<?php echo $result['id']; ?>">View</a> ||
                  <a href="replymsg.php?replyid=<?php echo $result['id']; ?>">Reply</a> ||
                  <a href="">Seen</a>
                </td>
              </tr>
              <?php
            }
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>



  <div class="box round first grid">
    <h2>Inbox</h2>
    <div class="block">
      <table class="data display datatable" id="example">
        <thead>
          <tr>
            <th>Serial No.</th>
            <th>Message</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr class="odd gradeX">
            <td>01</td>
            <td>Internet</td>
            <td><a href="">Edit</a> || <a href="">Delete</a></td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function () {
  setupLeftMenu();
  $('.datatable').dataTable();
  setSidebarHeight();
});
</script>

<?php include 'inc/footer.php'; ?>
