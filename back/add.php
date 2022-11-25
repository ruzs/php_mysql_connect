
  <h1>新增學生</h1>
  <form action="api/add_student.php" method="post">
    <table>
      <tr>
        <td>school_num</td>
        <!-- <td><input type="text" name="school_num"></td> -->
        <?php
          $sql="SELECT max(`school_num`) FROM `students`";
          $max=$pdo->query($sql)->fetchColumn();

          // $rows=$pdo->query($sql)->fetchAll();
          // $row=$pdo->query($sql)->fetch();
          // echo "<pre>";
          // echo "fetchColumn";
          // echo "<hr>";
          // print_r($max);
          // echo "fetchAll";
          // echo "<hr>";
          // print_r($rows);
          // echo "fetch";
          // echo "<hr>";
          // print_r($row);
          // echo "</pre>";
          ?>
        <td><input type="text" name="school_num" value="<?=$max+1;?>"></td>
      </tr>
      <tr>
        <td>name</td>
        <td><input type="text" name="name"></td>
      </tr>
      <tr>
        <td>birthday</td>
        <td><input type="date" name="birthday"></td>
      </tr>
      <tr>
        <td>uni_id</td>
        <td><input type="text" name="uni_id"></td>
      </tr>
      <tr>
        <td>addr</td>
        <td><input type="text" name="addr"></td>
      </tr>
      <tr>
        <td>parents</td>
        <td><input type="text" name="parents"></td>
      </tr>
      <tr>
        <td>tel</td>
        <td><input type="text" name="tel"></td>
      </tr>
      <tr>
        <td>dept</td>
        <td>
          <select name="dept">
            <?php
              $sql="SELECT * FROM `dept`";
              $depts=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
              foreach($depts as $dept){
              echo "<option value='{$dept['id']}'>{$dept['name']}</option>";
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
              $sql="SELECT * FROM `graduate_school`";
              $grads=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
              foreach($grads as $grad){
                echo "<option value='{$grad['id']}'>{$grad['county']}{$grad['name']}</option>";
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
              $sql="SELECT * FROM `status`";
              $rows=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
              foreach($rows as $row){
                echo "<option value='{$row['code']}'>{$row['status']}</option>";
              }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td>班級</td>
        <td>
          <select name="class_code" onchange="upadte.php">
            <?php 
            $sql="SELECT `id`,`code`,`name` FROM `classes`";
            $rows=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
            foreach($rows as $row){
                echo "<option value='{$row['code']}'>{$row['name']}</option>";
            }
            ?>
          </select>
        </td>
      </tr>
    </table>
    <input type="submit" value="確認新增">
  </form>