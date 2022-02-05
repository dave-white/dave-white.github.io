<!DOCTYPE html>
<html lang="en">
<?php include 'head.html' ?>
<body>
<?php
$page = 'index';
include 'side-nav.php';
?>
  <?php include 'lang-ver-anchor.html'; ?>
  <div style="margin-left: 15%">
    <div id="main" class="main">
      <h1>Welcome to the website of<br><i>David White</i>.</h1>

      <h2>About me</h2>

      <?php include 'grad-yrs-calc.php'; ?>

      <img src="profile.jpeg" alt="Profile picture" width="20%" height="20%" style="margin:0 1em;float:right">
      <p><i>I am a <?php echo $str_yr_dur_ord; ?> year PhD student in the <a href="https://math.sciences.ncsu.edu">Department of Mathematics</a> at <span style="font-variant:small-caps">North Carolina State University</span> (NC State).</i></p>

      <p>My area of research includes <a href="https://en.wikipedia.org/wiki/Low-dimensional_topology">low-dimensional manifold topology</a> and <a href="https://en.wikipedia.org/wiki/Symplectic_geometry">symplectic geometry</a>, in particular <a href="https://en.wikipedia.org/wiki/Floer_homology">Floer-type homologies</a>. I am interested in applications of the latter to constructing invariants of <a href="https://en.wikipedia.org/wiki/Knot_(mathematics)">knots</a> and <a href="https://en.wikipedia.org/wiki/Link_(knot_theory)">links</a>, and in many variations on the <a href="https://en.wikipedia.org/wiki/Floer_homology#Atiyah–Floer_conjecture">Atiyah-Floer conjecture</a>.</p>

      <p>My advisor is <a href="https://sites.google.com/ncsu.edu/tlid/home">Tye Lidman</a>.

      <h2>Contact information</h2>

      <ul>
	<li>Email: <code>dgwhite2</code> "at" <code>ncsu</code> "dot" <code>edu</code></li>
      </ul>
    </div>
  </div>
</body>
</html>