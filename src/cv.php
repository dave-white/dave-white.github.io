<!DOCTYPE html>
<html lang="en">
<?php include 'head.html' ?>
<body>
<?php
$page = 'cv';
include 'side-nav.php';
?>
  <?php include 'lang-ver-anchor.html'; ?>
  <div style="margin-left: 15%">
    <div id="main" class="main">
      <p>This page is currently under construction.</p>
      <p><a href="cv-dgw.pdf">PDF copy</a> (draft)</p>
      <h1 id="curriculum-vitae"><em>Curriculum Vitae</em></h1>
      <h2 id="research">Research</h2>
      <p>My area of research includes low-dimensional manifold topology and
      symplectic geometry, in particular Floer-type homologies. I am
      interested in applications of the latter to constructing invariants of
      knots and links, and in many variations on the Atiyah-Floer
      conjecture.</p>
      <h2 id="education">Education</h2>
      <ul>
	<li><p><strong>North Carolina State University</strong> (NC State):
	  Ph.D. candidate, Mathematics, <em>ongoing</em></p></li>
	<li><p><strong>Duke University</strong>: B.A., Philosophy, 2011</p></li>
      </ul>
      <h2 id="teaching">Teaching</h2>
      <?php include 'teaching-tbl.html'; ?>
    </div>
  </div>
</body>
</html>
