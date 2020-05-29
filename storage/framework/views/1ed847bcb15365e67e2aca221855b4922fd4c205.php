<script>
  $(document).ready(function () {
    $('.nav-item.active').removeClass('active');
    $('a[href="' + window.location.href + '"]').closest('li').closest('ul').closest('li').addClass('active');
    $('a[href="' + window.location.href + '"]').closest('li').addClass('active');
  });
</script>
<style>
  .nav-item.active {
    background-color: #fce8e6;
    font-weight: bold;
  }

  .nav-item.active a {
    color: #d93025;
  }

  .nav-link-text {
    padding-left: 10%;
  }

  #side-navbar ul>li>a {
    padding: 8px 15px;
  }
</style>

<ul class="nav flex-column">
  <li class="nav-item active">
    <a class="nav-link" href="<?php echo e(url('home')); ?>"><i class="material-icons">dashboard</i> <span class="nav-link-text"><?php echo app('translator')->get('Dashboard'); ?></span></a>
  </li>
  <?php if(Auth::user()->role == 'admin'): ?>
  <li class="nav-item dropdown">
    <a role="button" href="#" class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
        class="material-icons">date_range</i> <span class="nav-link-text"><?php echo app('translator')->get('Attendance'); ?></span> <i class="material-icons pull-right">keyboard_arrow_down</i></a>
    <ul class="dropdown-menu" style="width: 100%;">
      <li class="nav-item">
        <a class="dropdown-item" href="#"><i class="material-icons">contacts</i> <span class="nav-link-text"><?php echo app('translator')->get('Teacher Attendance'); ?></span></a>
      </li>
      <li class="nav-item">
        <a class="dropdown-item" href="<?php echo e(url('school/sections?att=1')); ?>"><i class="material-icons">contacts</i> <span
            class="nav-link-text"><?php echo app('translator')->get('Student Attendance'); ?></span></a>
      </li>
      <li class="nav-item">
        <a class="dropdown-item" href="#"><i class="material-icons">account_balance_wallet</i> <span class="nav-link-text"><?php echo app('translator')->get('Staff Attendance'); ?></span></a>
      </li>
    </ul>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo e(url('school/sections?course=1')); ?>"><i class="material-icons">class</i> <span class="nav-link-text"><?php echo app('translator')->get('Classes &amp; Sections'); ?></span></a>
  </li>
  <?php endif; ?>
  <?php if(Auth::user()->role != 'student'): ?>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo e(url('users/'.Auth::user()->school->code.'/1/0')); ?>"><i class="material-icons">contacts</i>
      <span class="nav-link-text"><?php echo app('translator')->get('Students'); ?></span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo e(url('users/'.Auth::user()->school->code.'/0/1')); ?>"><i class="material-icons">contacts</i>
      <span class="nav-link-text"><?php echo app('translator')->get('Teachers'); ?></span></a>
  </li>
  <?php endif; ?>
  <?php if(Auth::user()->role == 'admin'): ?>
  <li class="nav-item dropdown">
    <a role="button" href="#" class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
        class="material-icons">line_style</i> <span class="nav-link-text"><?php echo app('translator')->get('Exams'); ?></span> <i class="material-icons pull-right">keyboard_arrow_down</i></a>
    <ul class="dropdown-menu" style="width: 100%;">
      <!-- Dropdown menu links -->
      <li>
        <a class="dropdown-item" href="<?php echo e(url('exams/create')); ?>"><i class="material-icons">note_add</i> <span class="nav-link-text"><?php echo app('translator')->get('Add Examination'); ?></span></a>
      </li>
      <li>
        <a class="dropdown-item" href="<?php echo e(url('exams/active')); ?>"><i class="material-icons">developer_board</i> <span
            class="nav-link-text"><?php echo app('translator')->get('Active Exams'); ?></span></a>
      </li>
      <li>
        <a class="dropdown-item" href="<?php echo e(url('exams')); ?>"><i class="material-icons">settings</i> <span class="nav-link-text"><?php echo app('translator')->get('Manage Examinations'); ?></span></a>
      </li>
    </ul>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo e(url('grades/all-exams-grade')); ?>"><i class="material-icons">assignment</i> <span class="nav-link-text"><?php echo app('translator')->get('Grades'); ?></span></a>
  </li>
  <li class="nav-item" style="border-bottom: 1px solid #dbd8d8;"></li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo e(url('academic/routine')); ?>"><i class="material-icons">calendar_today</i> <span class="nav-link-text"><?php echo app('translator')->get('Class Routine'); ?></span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo e(url('academic/syllabus')); ?>"><i class="material-icons">vertical_split</i> <span class="nav-link-text"><?php echo app('translator')->get('Syllabus'); ?></span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo e(url('academic/notice')); ?>"><i class="material-icons">announcement</i> <span class="nav-link-text"><?php echo app('translator')->get('Notice'); ?></span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo e(url('academic/event')); ?>"><i class="material-icons">event</i> <span class="nav-link-text"><?php echo app('translator')->get('Event'); ?></span></a>
  </li>
  <li class="nav-item" style="border-bottom: 1px solid #dbd8d8;"></li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo e(route('settings.index')); ?>"><i class="material-icons">settings</i> <span class="nav-link-text"><?php echo app('translator')->get('Academic Settings'); ?></span></a>
  </li>
  <li class="nav-item dropdown">
    <a role="button" href="#" class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
        class="material-icons">chrome_reader_mode</i> <span class="nav-link-text"><?php echo app('translator')->get('Manage GPA'); ?></span> <i class="material-icons pull-right">keyboard_arrow_down</i></a>
    <ul class="dropdown-menu" style="width: 100%;">
      <!-- Dropdown menu links -->
      <li>
        <a class="dropdown-item" href="<?php echo e(url('gpa/all-gpa')); ?>"><i class="material-icons">developer_board</i> <span
            class="nav-link-text"><?php echo app('translator')->get('All GPA'); ?></span></a>
      </li>
      <li>
        <a class="dropdown-item" href="<?php echo e(url('gpa/create-gpa')); ?>"><i class="material-icons">note_add</i> <span class="nav-link-text"><?php echo app('translator')->get('Add New GPA'); ?></span></a>
      </li>
    </ul>
  </li>
  <?php endif; ?>
  <?php if(Auth::user()->role == 'admin' || Auth::user()->role == 'accountant'): ?>
  <li class="nav-item dropdown">
    <a role="button" href="#" class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
        class="material-icons">monetization_on</i> <span class="nav-link-text"><?php echo app('translator')->get('Fees Generator'); ?></span> <i class="material-icons pull-right">keyboard_arrow_down</i></a>
    <ul class="dropdown-menu" style="width: 100%;">
      <!-- Dropdown menu links -->
      <li>
        <a class="dropdown-item" href="<?php echo e(url('fees/all')); ?>"><i class="material-icons">developer_board</i> <span class="nav-link-text"><?php echo app('translator')->get('Generate Form'); ?></span></a>
      </li>
      <li>
        <a class="dropdown-item" href="<?php echo e(url('fees/create')); ?>"><i class="material-icons">note_add</i> <span class="nav-link-text"><?php echo app('translator')->get('Add Fee Field'); ?></span></a>
      </li>
    </ul>
  </li>
  <?php endif; ?>
   
  <?php if(Auth::user()->role == 'admin' || Auth::user()->role == 'accountant'): ?>
  <li class="nav-item dropdown">
    <a role="button" href="#" class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
        class="material-icons">account_balance_wallet</i> <span class="nav-link-text"><?php echo app('translator')->get('Manage Accounts'); ?></span> <i class="material-icons pull-right">keyboard_arrow_down</i></a>
    <ul class="dropdown-menu" style="width: 100%;">
      <!-- Dropdown menu links -->
      <li>
        <a class="dropdown-item" href="<?php echo e(url('users/'.Auth::user()->school->code.'/accountant')); ?>"><i class="material-icons">account_balance_wallet</i>
          <span class="nav-link-text"><?php echo app('translator')->get('Accountant List'); ?></span></a>
      </li>
      <li>
        <a class="dropdown-item" href="<?php echo e(url('accounts/sectors')); ?>"><i class="material-icons">developer_board</i>
		<span class="nav-link-text"><?php echo app('translator')->get('Add Account Sector'); ?></span></a>
      </li>
      <li>
        <a class="dropdown-item" href="<?php echo e(url('accounts/expense')); ?>"><i class="material-icons">note_add</i> <span
            class="nav-link-text"><?php echo app('translator')->get('Add New Expense'); ?></span></a>
      </li>
      <li>
        <a class="dropdown-item" href="<?php echo e(url('accounts/expense-list')); ?>"><i class="material-icons">developer_board</i>
          <span class="nav-link-text"><?php echo app('translator')->get('Expense List'); ?></span></a>
      </li>
      <li>
        <a class="dropdown-item" href="<?php echo e(url('accounts/income')); ?>"><i class="material-icons">note_add</i> <span class="nav-link-text"><?php echo app('translator')->get('Add New Income'); ?></span></a>
      </li>
      <li>
        <a class="dropdown-item" href="<?php echo e(url('accounts/income-list')); ?>"><i class="material-icons">developer_board</i>
          <span class="nav-link-text"><?php echo app('translator')->get('Income List'); ?></span></a>
      </li>
    </ul>
  </li>
  <?php endif; ?>
  <?php if(Auth::user()->role == 'student'): ?>
  <li class="nav-item">
    <a class="nav-link active" href="<?php echo e(url('attendances/0/'.Auth::user()->id.'/0')); ?>"><i class="material-icons">date_range</i>
      <span class="nav-link-text"><?php echo app('translator')->get('My Attendance'); ?></span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo e(url('courses/0/'.Auth::user()->section_id)); ?>"><i class="material-icons">subject</i>
      <span class="nav-link-text"><?php echo app('translator')->get('My Courses'); ?></span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo e(url('grades/'.Auth::user()->id)); ?>"><i class="material-icons">bubble_chart</i> <span
        class="nav-link-text"><?php echo app('translator')->get('My Grade'); ?></span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo e(url('stripe/charge')); ?>"><i class="material-icons">payment</i> <span class="nav-link-text"><?php echo app('translator')->get('Payment'); ?></span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo e(url('stripe/receipts')); ?>"><i class="material-icons">receipt</i> <span class="nav-link-text"><?php echo app('translator')->get('Receipt'); ?></span></a>
  </li>
  <?php endif; ?>
  
  
  <?php if(Auth::user()->role == 'admin' || Auth::user()->role == 'librarian'): ?>
  <li class="nav-item dropdown">
    <a role="button" href="#" class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
        class="material-icons">local_library</i> <span class="nav-link-text"><?php echo app('translator')->get('Manage Library'); ?></span> <i class="material-icons pull-right">keyboard_arrow_down</i></a>
    <ul class="dropdown-menu" style="width: 100%;">
      <!-- Dropdown menu links -->
      <li>
        <a class="dropdown-item" href="<?php echo e(url('users/'.Auth::user()->school->code.'/librarian')); ?>"><i class="material-icons">local_library</i>
          <span class="nav-link-text"><?php echo app('translator')->get('Librarian List'); ?></span></a>
      </li>
      <li>
        <a class="dropdown-item" href="<?php echo e(route('library.books.index')); ?>"><i class="material-icons">developer_board</i>
          <span class="nav-link-text"><?php echo app('translator')->get('All Books'); ?></span></a>
      </li>
      <li>
        <a class="dropdown-item" href="<?php echo e(url('library/issued-books')); ?>"><i class="material-icons">developer_board</i>
          <span class="nav-link-text"><?php echo app('translator')->get('All Issued Books'); ?></span></a>
      </li>
      <li>
        <a class="dropdown-item" href="<?php echo e(url('library/issue-books')); ?>"><i class="material-icons">receipt</i> <span
            class="nav-link-text"><?php echo app('translator')->get('Issue Book'); ?></span></a>
      </li>
      <li>
        <a class="dropdown-item" href="<?php echo e(route('library.books.create')); ?>"><i class="material-icons">note_add</i> <span
            class="nav-link-text"><?php echo app('translator')->get('Add New Book'); ?></span></a>
      </li>
    </ul>
  </li>
  <?php endif; ?>
  <?php if(Auth::user()->role == 'teacher'): ?>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo e(url('courses/'.Auth::user()->id.'/0')); ?>"><i class="material-icons">import_contacts</i>
      <span class="nav-link-text"><?php echo app('translator')->get('My Courses'); ?></span></a>
  </li>
  <?php endif; ?>
</ul>
<?php /**PATH C:\dev\Unifiedtransform\resources\views/layouts/leftside-menubar.blade.php ENDPATH**/ ?>