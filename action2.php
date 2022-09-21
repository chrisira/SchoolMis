<?php require_once('jobs.php');

?>

<div class="dropdown float-end">
<a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
<i class="mdi mdi-dots-vertical"></i>
</a>
<div class="dropdown-menu dropdown-menu-end">
<!-- item-->
<a href="edit_job.php?job_id=<?php echo $jobs['id'];?>" class="dropdown-item">edit</a>
<a href="submissions.php?job_id=<?php echo $jobs['id'];?>" class="dropdown-item">Delete</a>

</div>
</div>