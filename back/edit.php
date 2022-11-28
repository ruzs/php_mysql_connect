  <h1>編輯學生資料</h1>
  <?php
  if (isset($_GET['id'])) {
    $sql = "SELECT * FROM `students` where `id`='{$_GET['id']}'";
    $student = $pdo->query($sql)->fetch(PDO::FETCH_ASSOC);
  } else {
    header("location:../admin_center.php");
  }
  ?>
  <form action="./api/edit_student.php" method="post">
    <table>
      <tr>
        <td>school_num</td>
        <td><?= $student['school_num']; ?></td>
      </tr>
      <tr>
        <td>name</td>
        <td><input type="text" name="name" value="<?= $student['name']; ?>"></td>
      </tr>
      <tr>
        <td>birthday</td>
        <td><input type="date" name="birthday" value="<?= $student['birthday']; ?>"></td>
      </tr>
      <tr>
        <td>uni_id</td>
        <td><input type="text" name="uni_id" value="<?= $student['uni_id']; ?>"></td>
      </tr>
      <tr>
        <td>addr</td>
        <td><input type="text" name="addr" value="<?= $student['addr']; ?>"></td>
      </tr>
      <tr>
        <td>parents</td>
        <td><input type="text" name="parents" value="<?= $student['parents']; ?>"></td>
      </tr>
      <tr>
        <td>tel</td>
        <td><input type="text" name="tel" value="<?= $student['tel']; ?>"></td>
      </tr>
      <tr>
        <td>dept</td>
        <td>
          <?= $student['dept']; ?>
          <select name="dept">
            <?php
            //從`dept`資料表中撈出所有的科系資料並在網頁上製作成下拉選單的項目
            $sql = "SELECT * FROM `dept`";
            $depts = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            foreach ($depts as $dept) {
              /* if($dept['id']==$student['dept']){
                  $selected='selected';
              }else{
                  $selected='';
              } */
              $selected = ($dept['id'] == $student['dept']) ? 'selected' : '';
              echo "<option value='{$dept['id']}' $selected>{$dept['name']}</option>";
            }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>graduate_at</td>
        <td>
          <select name="graduate_at">
            <?php
            //從`graduate_school`t資料表中撈出所有的畢業學生資料並在網頁上製作成下拉選單的項目
            $sql = "SELECT * FROM `graduate_school`";
            $grads = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            foreach ($grads as $grad) {
              $selected = ($grad['id'] == $student['graduate_at']) ? 'selected' : '';
              echo "<option value='{$grad['id']}' $selected>{$grad['county']}{$grad['name']}</option>";
            }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>status_code</td>
        <td>
          <select name="status_code">
            <?php
            //從`status`資料表中撈出所有的畢業狀態並在網頁上製作成下拉選單的項目
            $sql = "SELECT * FROM `status`";
            $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows as $row) {
              $selected = ($row['code'] == $student['status_code']) ? 'selected' : '';
              echo "<option value='{$row['code']}' $selected>{$row['status']}</option>";
            }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>班級</td>
        <td>
          <select name="class_code">
            <?php
            $stu_class = $pdo->query("SELECT * FROM `class_student` WHERE `school_num`='{$student['school_num']}'")->fetch(PDO::FETCH_ASSOC);
            //從`classes`資料表中撈出所有的班級資料並在網頁上製作成下拉選單的項目
            $sql = "SELECT `id`,`code`,`name` FROM `classes`";
            $rows = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            foreach ($rows as $row) {
              $selected = ($row['code'] == $stu_class['class_code']) ? 'selected' : '';
              echo "<option value='{$row['code']}' $selected>{$row['name']}</option>";
            }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>座號</td>
        <td><?= $stu_class['seat_num']; ?></td>
      </tr>
    </table>
    <input type="hidden" name="id" value="<?= $student['id']; ?>">
    <input type="submit" value="確認修改">
    <button onclick="location.href='admin_center.php'">取消</button>
    
  </form>