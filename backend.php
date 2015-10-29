<?php
	session_start();
	include("mysqlInc.php");
	
	if(isset($_POST['name'])){
		$name 		= $_POST['name'];
		$post 		= (int)$_POST['post'];
		$follower 	= (int)$_POST['follower'];
		$following 	= (int)$_POST['following'];
		$popularity = (float)$_POST['popularity'];
		$respond 	= (int)$_POST['respond'];
		$likes	 	= (int)$_POST['likes'];

		$sql = "SELECT * FROM animal WHERE name = '$name'";
		$result = mysql_query($sql);
        $num = mysql_num_rows($result);

        if($num == 0){
        	$sql = "INSERT INTO animal (name, post, follower, following, popularity, respond, likes) VALUES ('$name', $post, $follower, $following, $popularity, $respond, $likes)";
			mysql_query($sql);
        }
        else{
        	$sql = "UPDATE animal SET post = $post, follower = $follower, following = $following, popularity = $popularity, respond = $respond , likes = $likes WHERE name = '$name'";
        	mysql_query($sql);
        }

        //lemur
        if($popularity > 3 && $likes > 20 && $respond > 10){
    		$_SESSION['animal'] = "img/animals/meerkat_300.png";        
        }
        //elephant
        else if($popularity > 3 && $respond > 10 && $post <= 10){
        	$_SESSION['animal'] = "img/animals/elephant_300.png";  
        }
        //wolf
        else if($popularity > 3 && $respond <= 10){
        	$_SESSION['animal'] = "img/animals/wolf.png";  
        }
        //peacock
        else if($post > 10 && $popularity <= 3){
        	$_SESSION['animal'] = "img/animals/peacock_300.png";  
        }
        //owl
        else if($likes > 20 && $post <= 10 && $respond <= 10){
        	$_SESSION['animal'] = "img/animals/owl_300.png";  
        }
        //fossile
        else{
        	$_SESSION['animal'] = "img/animals/fossil_400.png";  
        }

        echo '<meta http-equiv=REFRESH CONTENT=0;url=animals_face.html>';
	}

	if(isset($_POST['face'])){
		echo $_SESSION['animal'];
	}
?>
