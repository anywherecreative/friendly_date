<!--
This program parses time stamps form an object, and creates a friendly version similar to the one seen on popular social networking sites.
the value for timestamp is taken from the server and then compared to the local time stamp and a varience is added to the local time to match server
time. The time re-calculated once every minute to insure accuracy. 

Copyright (C) 2014 Jeff Manning

This program is free software: you can redistribute it and/or modify it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU General Public License for more details.

You should have received a copy of the GNU General Public License along with this program.  If not, see <http://www.gnu.org/licenses/>.

-->
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
	<style>
		H1 {
			text-align:center;
		}
		.post {
			border:1px #c0c0c0 solid;
			padding:0;
			margin-bottom:10px;
		}
		.post > DIV {
			padding:0;
			margin:0;
		}
		.post P:not(.postInfo) {
			padding:10px;
		}
		.postInfo {
			font-size:90%;
			color:#404040;
			background:#e0e0e0;
			margin:0;
			padding:3px;
		}
	</style>
	<script>
		var server = <?php echo(time());?>; //number from php, this could be a curl request however this may add latency
	</script>
	<script src="./main.js"></script>
</head>

<body>
	<h1>Usage of the friendly date</h1>
	<div class='container'>
		<div class="row post">
			<div class="col-md-12">
				<p>This system will translate anything less then a minute down to "Just Now"</p>
				<p class="postInfo"><span data-time="<?=strtotime ('30 seconds ago');?>" data-roll="time"><?=date('F d, Y',strtotime ('1 minute ago'));?></span> by Author</p>
			</div>
		</div>
		<div class="row post">
			<div class="col-md-12">
				<p>And recognizes plural, vs singular times</p>
				<p class="postInfo"><span data-time="<?=strtotime ('1 hour ago');?>" data-roll="time"><?=date('F d, Y',strtotime ('1 minute ago'));?></span> by Author</p>
			</div>
		</div>
		<div class="row post">
			<div class="col-md-12">
				<p>Anything longer then a week gets translated into a full date format</p>
				<p class="postInfo"><span data-time="<?=strtotime ('10 days ago');?>" data-roll="time"><?=date('F d, Y',strtotime ('1 minute ago'));?></span> by author</p>
			</div>
		</div>
	</div>
</body>
</html>