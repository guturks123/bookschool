<div class="container">
        <div class="row mt-3">
            <div class="col-lg-6">
                <h1 class="text-dark"><?php echo $topic_school; ?></h1>
            </div>
        </div>
        <hr class="bg-info">
         <div class="ui blue segment"><form class="ui form" method="post" id="insert-form">
  <div class="seven wide field">
    <h3 class="text-danger">ภาคเรียน/ปีการศึกษา</h3>
    <div class="four fields">
      <div class="field">
      <select class="ui fluid search dropdown" name="term">
            <option value="1">1</option>
            <option value="2">2</option>
          </select>
      </div>
      <div class="field">
        <input maxlength="4" type="text" name="termyear" placeholder="ปีการศึกษา">

      </div>
    </div>
  </div>
  <div class="field">
    <h3 class="text-danger">รายละเอียด</h3>
    <div class="fields">
      <div class="two wide field">
        <label>รหัสวิชา</label><input maxlength="9" id="codesubject" type="text" name="subjectcode" placeholder="2240 2240">
      </div>
      <div class="four wide field">
      <label>ชื่อวิชา</label><input maxlength="50" type="text" id="subjectname" name="subjectname" placeholder="วิทยาศาสตร์เพื่องานอาชีพ...">
      </div>
      <div class="three wide field">
      <label>ระดับชั้น</label>
      <select class="ui fluid dropdown" name="class">
       <option value="ปวช">ปวช</option>
       <option value="ปวส">ปวส</option>
     </select>
      </div>
      <div class="four wide field">
      <label>ครูผู้สอน</label><input maxlength="70" list="teachers" id="teacher" type="text" name="teacher" placeholder="">

  <datalist id="teachers">

  </datalist>

      </div>
    </div>
  </div>
  <h3 class="text-danger">ข้อมูลการอนุญาติ</h3>
  <div class="fields">
    <div class="two wide field ">
      <label>ลำดับที่</label>
     <input maxlength="3" type="text" name="id2">
    </div>
    <div class="two wide field ">
      <label>ปี พ.ศ.</label>
     <input maxlength="4" type="text" name="bookyear">
    </div>
  </div>
  <h3 class="text-danger">รายละเอียดหนังสือ</h3>
  <div class="fields">
    <div class="four wide field ">
      <label>ชื่อผู้แต่ง</label>
     <input maxlength="50" type="text" name="bookname">
    </div>
    <div class="four wide field ">
      <label>สำนักพิมพ์</label>
     <input maxlength="80" type="text" name="publisher">
    </div>
  </div>
  <div class="fields">
    <div class="four wide field ">
      <label>กระดาษ</label>
     <select class="ui fluid dropdown" name="paper">
       <option value="ปอนด์">ปอนด์</option>
       <option value="ถนอมสายตา">ถนอมสายตา</option>
       <option value="อาร์ต">อาร์ต</option>
     </select>
    </div>
    <div class="four wide field ">
      <label>รูปแบบ</label>
      <select class="ui fluid dropdown" name="format">
       <option value="๑ สี">1 สี</option>
       <option value="๒ สี">2 สี</option>
       <option value="๔ สี">4 สี</option>
     </select>
    </div>
    <div class="four wide field ">
      <label>ขนาดรูปเล่ม</label>
      <select class="ui fluid dropdown" name="size">
       <option value="๘ หน้ายก">8 หน้ายก</option>
       <option value="A๔">A4</option>
       <option value="อื่นๆ">อื่นๆ</option>
     </select>
    </div>
  </div>
  <div class="fields">
    <div class="two wide field ">
      <label>ราคา</label>
     <input maxlength="6" type="text" name="price">
    </div>
    <div class="seven wide field ">
      <label>เหตุผลที่เลือก</label>
     <input type="text" name="reason">
	 <input type="text" hidden name="idteach" value="<?php echo $_SESSION['user_id']; ?>">
    </div>
  </div>
  <button type="submit" class="ui green button" id="insert"><i class="far fa-save"></i>&nbsp;&nbsp;บันทึกข้อมูล</button>
</form></div>
    </div>
    <br>
	
	