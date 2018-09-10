<style>

  .links ul
  {
    padding:10px;
    background:#4e3d3d;
  
  }
  .links ul li a button
  {
    margin-bottom:10px;    
  }
  .asidebar
  {
   
    height:100%;
    background:#333;
    overflow:auto;
  }
  .asidebar , .asidebar ul 
  {
    padding:0px;
  }
  .asidebar ul{   list-style:none;   }
  .asidebar ul button
  {
    border-radius:0px;
    min-height:45px;
  }
  h2
  {
    font-family: -webkit-pictograph;
  }
  .tooltip
  {
    font-size:1.3em;
  }
  .table-responsive
  {
    max-height: 500px;

  }

</style>
<body class='js-pscroll'>
  
  <div class='asidebar col-lg-3 js-pscroll'>

  <ul class=' col-lg-12'  id="demo" class="in" >
      <li>
          <a href="<?php echo WEBSITE_NAME . DS . 'laboratory/add' ?>">
            <button class='btn btn-primary '>add laboratory</button>
          </a>
      </li>
      <li>
          <a href="<?php echo WEBSITE_NAME . DS . 'laboratory/show' ?>">
            <button class='btn btn-success'>show laboratory</button>
          </a>
      </li>
      <li>
          <a href="<?php echo WEBSITE_NAME . DS . 'stage/add' ?>">
            <button class='btn btn-primary'>add stage</button>
          </a>
      </li>
      <li>
          <a href="<?php echo WEBSITE_NAME . DS . 'stage/show' ?>">
            <button class='btn btn-success'>show stage</button>
          </a>
      </li>
      <li>
          <a href="<?php echo WEBSITE_NAME . DS . 'room/add' ?>">
            <button class='btn btn-primary'>add room</button>
          </a>
      </li>
      <li>
          <a href="<?php echo WEBSITE_NAME . DS . 'room/show' ?>">
            <button class='btn btn-success'>show room</button>
          </a>
      </li>
      <li>
          <a href="<?php echo WEBSITE_NAME . DS . 'subject/add' ?>">
            <button class='btn btn-primary'>add subject</button>
          </a>
      </li>
      <li>
          <a href="<?php echo WEBSITE_NAME . DS . 'subject/show' ?>">
            <button class='btn btn-success'>show subject</button>
          </a>
      </li>
      <li>
          <a href="<?php echo WEBSITE_NAME . DS . 'phase/show' ?>">
            <button class='btn btn-success'>show phase</button>
          </a>
      </li>
      <li>
          <a href="<?php echo WEBSITE_NAME . DS . 'teacher/add' ?>">
            <button class='btn btn-primary'>add teacher</button>
          </a>
      </li>
      <li>
          <a href="<?php echo WEBSITE_NAME . DS . 'teacher/show' ?>">
            <button class='btn btn-success'>show teacher</button>
          </a>
      </li>
      <li>
          <a href="<?php echo WEBSITE_NAME . DS . 'books/add' ?>">
            <button class='btn btn-primary'>add books</button>
          </a>
      </li>
      <li>
          <a href="<?php echo WEBSITE_NAME . DS . 'books/show' ?>">
            <button class='btn btn-success'>show books</button>
          </a>
      </li>
      <li>
          <a href="<?php echo WEBSITE_NAME . DS . 'teacher_stage/add' ?>">
            <button class='btn btn-primary'>add teacher_stage</button>
          </a>
      </li>
      <li>
          <a href="<?php echo WEBSITE_NAME . DS . 'teacher_stage/show' ?>">
            <button class='btn btn-success'>show teacher_stage</button>
          </a>
      </li>
      <li>
          <a href="<?php echo WEBSITE_NAME . DS . 'student/add' ?>">
            <button class='btn btn-primary'>add student</button>
          </a>
      </li>
      <li>
          <a href="<?php echo WEBSITE_NAME . DS . 'student/show' ?>">
            <button class='btn btn-success'>show student</button>
          </a>
      </li>
      <li>
          <a href="<?php echo WEBSITE_NAME . DS . 'subject_teacher/add' ?>">
            <button class='btn btn-primary'>add subject_teacher</button>
          </a>
      </li>
      <li>
          <a href="<?php echo WEBSITE_NAME . DS . 'subject_teacher/show' ?>">
            <button class='btn btn-success'>show subject_teacher</button>
          </a>
      </li>
      <li>
          <a href="<?php echo WEBSITE_NAME . DS . 'programm_table/add' ?>">
            <button class='btn btn-primary'>add programm_table</button>
          </a>
      </li>
      <li>
          <a href="<?php echo WEBSITE_NAME . DS . 'programm_table/show' ?>">
            <button class='btn btn-success'>show programm_table</button>
          </a>
      </li>
      <li>
          <a href="<?php echo WEBSITE_NAME . DS . 'labortatory_stage/add' ?>">
            <button class='btn btn-primary'>add labortatory_stage</button>
          </a>
      </li>
      <li>
          <a href="<?php echo WEBSITE_NAME . DS . 'labortatory_stage/show' ?>">
            <button class='btn btn-success'>show labortatory_stage</button>
          </a>
      </li>
    </ul>
  </div>
  <!-- requests  !-->
  <div class="col-lg-9" style='background: #615858;'>
    <ul class='col-lg-12 list-inline' style='margin-top:  5px;'> 

      <li>
          <a href="<?php echo WEBSITE_NAME . DS . 'request_1/show' ?>">
            <button data-placement='bottom' class='btn btn-primary' data-toggle='tooltip' title="برنامج دوام مدرسي مادة الفيزياء الصف الثالث الثانوي" >request_1 show </button>
          </a>
      </li>
      <li>
          <a href="<?php echo WEBSITE_NAME . DS . 'request_2/show' ?>">
            <button data-placement='bottom' class='btn btn-primary' data-toggle='tooltip' title="عدد حصص مادة الجبر لجميع الصفوف يوم الثلاثاء" >request_2 show </button>
          </a>
      </li>
      <li>
          <a href="<?php echo WEBSITE_NAME . DS . 'request_3/show' ?>">
            <button data-placement='bottom' class='btn btn-primary' data-toggle='tooltip' title="المواد التي يدرسها أكثر من مدرس للصف الثاني الأدبي">request_3 show </button>
          </a>
      </li>
      <li>
          <a href="<?php echo WEBSITE_NAME . DS . 'request_4/show' ?>">
            <button data-placement='bottom' class='btn btn-primary' data-toggle='tooltip' title="المادة التي لا تدرس يوم الخميس" >request_4 show </button>
          </a>
      </li>
      <li>
          <a href="<?php echo WEBSITE_NAME . DS . 'request_5/show' ?>">
            <button data-placement='bottom' class='btn btn-primary' data-toggle='tooltip' title="المخبر الذي يتم استخدامه من قبل نفس الشعبة يوم الأربعاء لمدة حصتين">request_5 show </button>
          </a>
      </li>
    
    </ul>
  </div>
  <!--  end requests !-->



</body>

<script>
  $('.asidebar').find('button').addClass('form-control');
  $(document).ready(function(){
      $('[data-toggle="tooltip"]').tooltip();   
  });
</script>