<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>


<div class="grid_10">
  <div class="box round first grid">
    <h2>Inbox</h2>
    <div class="block">
      <?php
      if (isset($_GET['seenid']) ) {
        $seenid = $_GET['seenid'];

        $seenquery = "UPDATE tbl_contact SET status='1' WHERE id='$seenid' ";
        $resulSeenQuery = $db->update($seenquery);
        if ($resulSeenQuery) {
          echo "<span class='green'>Messeage put on seen box !!!</span>";
        }
        else{
          echo "<span class='error'>Messeage couldn't put on seen box !!!</span>";
        }
      }

      ?>
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
          $query = "SELECT * FROM tbl_contact WHERE status='0' ";
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
                  <a onclick="return confirm('Are you sure to sent in the seen box?');" href="?seenid=<?php echo $result['id']; ?>">Seen</a>
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
    <h2>Seen Inbox</h2>
    <?php

    if (isset($_GET['delid'])) {
      $delid = $_GET['delid'];
      $querydel = "DELETE FROM tbl_contact WHERE id='$delid' && status='1' ";
      $resultdel = $db->delete($querydel);
      if ($resultdel) {
        echo "<span class='error'>Messeage Deleted successfully !!!</span>";
      }else{
        echo "<span class='error'>Messeage Not deleted !!!</span>";
      }
    }

    ?>
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
          $query = "SELECT * FROM tbl_contact WHERE status='1' ";
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
                  <a onclick="return confirm('Are you sure to delete?');" href="?delid=<?php echo $result['id']; ?>">Delete</a>
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
</div>

<script type="text/javascript">
$(document).ready(function () {
  setupLeftMenu();
  $('.datatable').dataTable();
  setSidebarHeight();
});
</script>

<?php include 'inc/footer.php'; ?>
