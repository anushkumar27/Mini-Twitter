<!DOCTYPE html>
<html>
	<?php
		session_start();
		$user = $_SESSION['username'];
	?>
	<head>
		<title>Mini Twitter</title>
		<!-- Fav Icon -->
		<link rel="icon" href="images/favicon.png" sizes="16x16" type="image/png">
		<!-- CSS refreances -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
		<link href="css/sweetalert.css" rel="stylesheet">

		<!-- script references -->
		<script src="js/jquery-2.2.3.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="js/scripts.js"></script>
		<script src="js/sweetalert.min.js"></script>
		<style>
			#user{
				font-weight: bold;
				color: blue;
			}
			#tweetNewDivID{
				padding: 10px;
			}
			#tweetID{
				font-size: 20px;
			}
			#hashTags{
				font-weight: bold;
				font-size: 15px;
				padding: 3px;
			}
		</style>
	</head>

	<body onload="start()">
		<div class="wrapper">
    	<div class="box">
        <div class="row row-offcanvas row-offcanvas-left">

            <!-- sidebar -->
            <div class="column col-sm-2 col-xs-1 sidebar-offcanvas" id="sidebar">

                <ul class="list-unstyled hidden-xs" id="sidebar-footer">
                    <li>
                      <h3>Mini Twitter</h3>
                    </li>
                </ul>

              	<ul class="nav">
									<h3 style="padding: 5px;" id="userHeading" >UserName</h3>
			  				</ul>

          	</div>
            <!-- /sidebar -->

            <!-- main right col -->
            <div class="column col-sm-10 col-xs-11" id="main">

                <!-- top nav -->
              	<div class="navbar navbar-blue navbar-static-top">

                  	<nav class="collapse navbar-collapse" role="navigation">
                    	<ul class="nav navbar-nav" >
                      	<li>
                        	<a href="#">Home</a>
                      	</li>
												<li>
                        	<a href="#" onclick="getTrendingTweets()">Trending Tweets</a>
                      	</li>
												<li>
                        	<a href="#" onclick="getRecentTweets()">Recent Tweets</a>
                      	</li>
												<li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Category</a>
	                        <ul class="dropdown-menu">
	                          <li><a href="" onclick="getCatTweets(2)">General</a></li>
	                          <li><a href="" onclick="getCatTweets(1)">Sports</a></li>
	                          <li><a href="" onclick="getCatTweets(3)">Bollywood</a></li>
	                          <li><a href="" onclick="getCatTweets(4)">Politics</a></li>
	                          <li><a href="" onclick="getCatTweets(5)">Technology</a></li>
	                        </ul>
	                      </li>
												<li>
                        	<a href="#postModal" role="button" data-toggle="modal"> + Tweet</a>
                      	</li>
                    	</ul>
                  	</nav>

                </div>
                <!-- /top nav -->

                <div class="padding">
                    <div class="full col-sm-9">
                        <!-- content -->
                      	<div class="row">
                         <!-- main col left -->
                         <div class="col-sm-7">
                              <div class="panel panel-default">
                                <div class="panel panel-default">
                                 	<div class="panel-heading"><h4>Tweets</h4></div>
																		<div id="tweet-div">
																			<!-- Div for tweets -->
																		</div>
                                </div>
                              </div>
                          </div>

                          <!-- main col right -->
                          <div class="col-sm-5">
														<div class="panel panel-default">
															<div class="panel panel-default">
																 <div class="panel-heading"><h4>Hashtags</h4></div>
																 	<div id="hashtags-div">
																	 	<!-- Div for hashtags -->
																 	</div>
															</div>
														</div>
                          </div>

                       </div>
											 <!--/row-->
                    </div>
										<!-- /col-9 -->
                </div>
								<!-- /padding -->
            </div>
            <!-- /main -->
        </div>
    </div>
		<!-- box -->
</div>
<!-- wrapper -->

<!--post modal-->
<div id="postModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog">
  		<div class="modal-content">

      	<div class="modal-header">
					Add Tweet  	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
      	</div>

      	<div class="modal-body">
        	<form class="form center-block">
          	<div class="form-group">

							<!-- category-dropdown -->
							<span style="position:absolute;left:320px;top:110px;">Category :</span>
							<select style="position:absolute;top:110px;left:400px;" id="catSelect">
							  <option value="2" selected>General</option>
							  <option value="1">Sports</option>
							  <option value="3">Bollywood</option>
							  <option value="4">Politics</option>
								<option value="5">Technology</option>
							</select>

							<!-- tweet-textarea -->
              <textarea class="form-control input-lg" autofocus="" placeholder="What do you want to tweet?" id="tweetText" ></textarea>
            	<hr>

							<!-- location-dropdown -->
							<span style="position:absolute;left:50px">Location :
								<select style="position:absolute;top:1px;left:80px;" id="locSelect">
								  <option value="1" selected>Bangalore</option>
								  <option value="2">Mumbai</option>
								  <option value="3">Chennai</option>
								  <option value="4">Orrisa</option>
									<option value="5">Delhi</option>
								</select>
							</span>
							<br>

						</div>
						<!-- /form class -->
          </form>

      </div>
			<!-- /modal-body -->
			<div class="modal-footer">
					<div>
						<button class="btn btn-primary btn-sm" data-dismiss="modal" aria-hidden="true" onclick="sendTweet()">Tweet :)</button>
					</div>
			</div>
			<!-- /modal-footer -->
  	</div>
		<!-- /modal-content -->
  </div>
	<!-- /modal-dialog -->
</div>

<!-- actual functionality starts -->
<script type="text/javascript">
	// Tweet text area reference
	var tweetTextRef = document.getElementById('tweetText');
	// Category drop-drow ref.
	var catValue = document.getElementById('catSelect');
	// Location drop-drow ref.
	var locValue = document.getElementById('locSelect');

	// Holds the query to be executed
	var query;
	// Hold the response data
	var dataRecieved;

	function sendTweet(){

		if(tweetTextRef.value.toString().length > 0){

			console.log("Sending Tweets");
			var tags = new Array();
			console.log("Tweet:"+tweetTextRef.value+".");
			var temp = tweetTextRef.value;
			var res = temp.split(" ");
			for(var i = 0; i < res.length; i++){
				if(res[i].startsWith('#')){
					tags.push(res[i]);
				}
			}
			console.log("Tags : "+tags.toString());
			// tagID <- stores hashtag id
			var tagID;

			if(tags.length > 0){
				query = "q=INSERT INTO `hashtags`(`uid`, `tags`) VALUES ('"+uid+"','"+tags[0]+"')";
				insertData();
				query = "q=SELECT `tag_id` FROM `hashtags` WHERE `tags`='"+tags[0]+"'";
				console.log("Tag Query: "+query);
				getData("querySelect");
				tagID = dataRecieved;
				console.log("TagID: "+tagID);

			}
			console.log("Posting to server");
			query = "q=INSERT INTO `tweets`(`uid`,`tweet_text`, `cat_id`, `loc_id`, `tweet_trending`, `tag_id`) VALUES ('"+uid+"','"+tweetTextRef.value+"','"+catValue.value+"','"+locValue.value+"','0','"+tagID+"')";
			insertData();
			query="q=SELECT `tweet_id` FROM `tweets` WHERE `tweet_text`='"+tweetTextRef.value+"'";
			getData("querySelectTID");
			var tempTweetID = dataRecieved;
			//console.log("tempTweetID: "+tempTweetID);
			query="q=INSERT INTO `tweetlikes`(`tweet_id`, `tweet_likes`) VALUES ('"+tempTweetID+"','0')";
			insertData();
			//location.reload();
		}else{
			swal("Error!", "Please Enter Tweet");
		}
	}

	var userName = "anush";
	var uid = 1;
	function getUser() {
		var userHeadingRef = document.getElementById("userHeading");
		userName = "<?php echo $user; ?>";
		query = "q=SELECT uid from userlogin where username='"+userName+"'";
		getData("querySelectUser");
		console.log("UserName: "+userName);
		userHeadingRef.innerHTML = "Welcome! "+userName;
		uid = dataRecieved;
		console.log("UID: "+dataRecieved);

	}
	// Function to insert data to DB
	function insertData() {
		var xhttp,data;
		if (window.XMLHttpRequest){
			xhttp = new XMLHttpRequest();
		}
		else{
			xhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xhttp.onreadystatechange = function ()
		{
			if(xhttp.readyState==4 && xhttp.status==200)
			{
				data = xhttp.responseText;
				if(!data.includes("Unsuccessful")){
					console.log(data);
				}
				else{
					console.error("Unsuccessful retrieval");
				}
			}
		};
		xhttp.open("POST","http://localhost/tweet/query.php",false);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		console.log("Query: "+query);
		xhttp.send(query.trim());
	}

	// Functon to get data from DB
	function getData(phpFile) {
		var xhttp,data;
		if (window.XMLHttpRequest){
			xhttp = new XMLHttpRequest();
		}
		else{
			xhttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		xhttp.onreadystatechange = function ()
		{
			if(xhttp.readyState==4 && xhttp.status==200)
			{
				data = xhttp.responseText;
				if(!data.includes("Unsuccessful")){
					//console.log(data);
					dataRecieved = data;
					console.log("DATA: "+data);
				}
				else{
					console.error("Unsuccessful retrieval")
				}
			}
		};
		xhttp.open("POST","http://localhost/tweet/"+phpFile+".php",false);
		xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		console.log("Query: "+query);
		xhttp.send(query.trim());
	}

	function start() {
		getRecentTweets();
		getUser();
	}

	function getHashTags() {
		query = "q=SELECT `tags` FROM `hashtags`";
		getData("querySelectTags");
		console.log("Hash Tags: "+dataRecieved);
		var hashtagsValue = dataRecieved;
		var hastTagsArray = hashtagsValue.split("$");
		for(var i= 0 ; i < hastTagsArray.length - 1 ; i++){
			//console.log("Tag "+i+" = "+hastTagsArray[i]);
			appendHashTag(hastTagsArray[i]);
		}
	}

	function getRecentTweets() {
		//Update the hashtags
		getHashTags();
		var tweetDIV = document.getElementById("tweet-div");
		tweetDIV.innerHTML = " ";
		query = "q=SELECT username, tweet_text, tweet_id FROM `userlogin`,`tweets` where tweets.uid = userlogin.uid ";
		getData("querySelectArray");
		var tweet = dataRecieved.split('@');
		for(var i = 0; i < tweet.length - 1; i++){
			var eachTweet = tweet[i].split("$");
			//console.log("eachTweet: "+eachTweet[0] + eachTweet[1] + eachTweet[2]);
			appendTweet(eachTweet[0],eachTweet[1],eachTweet[2]);
		}
		//console.log("Tweets"+dataRecieved);
	}

	function getCatTweets(catID) {
		//Update the hashtags
		console.log("*******************Get Category Tweets*****************");
		var tweetDIV = document.getElementById("tweet-div");
		tweetDIV.innerHTML = " ";
		query = "q=SELECT username, tweet_text, t.tweet_id FROM `userlogin`,`tweets` t where t.uid = userlogin.uid AND t.cat_id ="+catID;
		getData("querySelectArray");
		var tweet = dataRecieved.split('@');
		for(var i = 0; i < tweet.length - 1; i++){
			var eachTweet = tweet[i].split("$");
			//console.log("eachTweet: "+eachTweet[0] + eachTweet[1] + eachTweet[2]);
			appendTweet(eachTweet[0],eachTweet[1],eachTweet[2]);
		}
		//console.log("Tweets"+dataRecieved);
	}

	function getTrendingTweets() {
		//Update the hashtags
		getHashTags();
		var tweetDIV = document.getElementById("tweet-div");
		tweetDIV.innerHTML = " ";
		query = "q=SELECT username, tweet_text, t.tweet_id FROM `userlogin`,`tweets` tw, `tweetlikes` t where tw.uid = userlogin.uid AND tw.tweet_id = t.tweet_id AND tweet_likes > 3	";
		getData("querySelectArray");
		var tweet = dataRecieved.split('@');
		for(var i = 0; i < tweet.length - 1; i++){
			var eachTweet = tweet[i].split("$");
			//console.log("eachTweet: "+eachTweet[0] + eachTweet[1] + eachTweet[2]);
			appendTweet(eachTweet[0],eachTweet[1],eachTweet[2]);
		}
		//console.log("Tweets"+dataRecieved);
	}

	function appendTweet(user_name, tweet_text, tweet_id){
		// Main tweet Div
		var tweetDIV = document.getElementById("tweet-div");
		// Temp DIV for appending
		var tweetNewDIV = document.createElement("div");
		tweetNewDIV.id = "tweetNewDivID";
		// Username
		var para = document.createElement("p");
		para.id = "user";
		var node = document.createTextNode(user_name);
		para.appendChild(node);
		tweetNewDIV.appendChild(para);
		// tweet
		paraT = document.createElement("p");
		paraT.id = "tweetID";
		var nodeT = document.createTextNode(tweet_text);
		paraT.appendChild(nodeT);
		tweetNewDIV.appendChild(paraT);
		// like Button
		var btn = document.createElement("BUTTON");
		btn.id = tweet_id;
		var t = document.createTextNode("Like");
		btn.appendChild(t);
		// Function to update tweet likes
		btn.addEventListener("click",function(){
			console.log(btn.id);
			query = "q=UPDATE `tweetlikes` SET `tweet_likes`= `tweet_likes` %2B 1 WHERE `tweet_id` = '"+btn.id+"'";
			insertData();
		});
		tweetNewDIV.appendChild(btn);
		//Final appending
		tweetDIV.appendChild(tweetNewDIV);
	}

	function appendHashTag(tag){
		// Main hash Div
		var hashDIV = document.getElementById("hashtags-div");
		// Temp DIV for appending
		var hashNewDIV = document.createElement("div");
		hashNewDIV.id = "hashNewDivID";
		// hashtag
		var para = document.createElement("p");
		para.id = "hashTags";
		var node = document.createTextNode(tag);
		para.appendChild(node);
		hashNewDIV.appendChild(para);

		//Final appending
		hashDIV.appendChild(hashNewDIV);
	}

</script>

</body>
</html>
