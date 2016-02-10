<html>
	<?php @include 'partials/head.php' ?>
<body>
	<?php @include 'partials/nav.php' ?>
	<div class="container">
    <div class="row">
      <div class="col-md-11 col-md-offset-">
        <h2>Hello, <?= $this->session->userdata('first_name') ?>!</h2>
    </div>
    </div>
		<div class="row">
			<div class="col-md-7">
				<h4 class="well well-lg">Quotable Quotes</h4>

        <?php
        				if (count($quotes) > 0) {
        ?>
        <?php
        					foreach($quotes as $quote) {
        ?>

            <div class="panel panel-default">
              <div class="panel-heading"><?= $quote['quoted_by'] ?><span class="pull-right">Posted by <?= $quote['posted_by'] ?></span></div>
              <div class="panel-body"><?= $quote['quote'] ?></div>
              <h5><a href="quotes/add_fav/<?= $quote['id'] ?>" class="btn btn-success link"><i class="fa fa-thumbs-o-up"></i></a></h5>
            </div>

        <?php
        					}
        				}
        				else {
        					echo "<h3>You sure love quotes!</h3>";
        				}
        ?>


      </div> <!-- end of col -->

      <div class="col-md-4 col-md-offset-1">
        <h4 class="well well-lg" id="well_fav">Your Favorites</h4>

        <?php
        				if (count($favorite_quotes) > 0) {
        ?>
        <?php
        				  foreach($favorite_quotes as $fav) {
        ?>
              <div class="panel panel-info">
                <div class="panel-heading"><?= $fav['quoted_by'] ?><span class="pull-right">Posted by <?= $fav['posted_by'] ?><span></div>
                <div class="panel-body"><?= $fav['quote'] ?></div>
                <h5><a href="/quotes/remove/<?= $fav['id'] ?>" class="btn btn-danger link"><i class="fa fa-trash"></i></a></h5>
              </div>
        <?php
        					}
        				}
        				else {
        					echo "<h3>You don't have any favorites.</h3>";
        				}
        ?>

        <h4 class="well well-lg">Contribute a Quote:</h4>
        <form action="/quotes/add" method="post">
          <div class="form-group">
            <label>Quoted By:</label>
            <input type="text" class="form-control" name="quoted_by">
          </div>
          <div class="form-group">
            <label for="comment">Message:</label>
            <textarea class="form-control" rows="5" name="message"></textarea>
          </div>
          <input type="submit" class="btn btn-default pull-right" value="Add Quote">
        </form>
      </div> <!-- end of col -->
		</div> <!-- end of row -->

	</div> <!-- end of container -->
</body>
</html>
