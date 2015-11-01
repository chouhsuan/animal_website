<?php
	session_start();
    
	include("mysqlInc.php");
	
	if(isset($_POST['name'])){
		$name 		= $_POST['name'];
		$post 		= (int)$_POST['post'];
		$follower 	= (int)$_POST['follower'];
		$following 	= (int)$_POST['following'];
		$popularity = (float)$_POST['popularity'];
		$socialActive 	= (int)$_POST['socialActive'];


        //fossile
        if($post == 0){
            $animal = "fossile";
            $_SESSION['animal'] = "img/animals/fossil_400.png";  
        }
        //elephant
        else if($follower > $following  && $follower > 194){
            $animal = "elephant";
            $_SESSION['animal'] = "img/animals/elephant_300.png";
        }
        //lemur
        else if($popularity > 3 && $socialActive > 63 && $post > 21){
            $animal = "meerkat";
    		$_SESSION['animal'] = "img/animals/meerkat_300.png";        
        }
        //elephant
        else if($popularity > 3 && $socialActive > 63 && $post <= 21){
            $animal = "elephant";
        	$_SESSION['animal'] = "img/animals/elephant_300.png";  
        }
        //wolf
        else if($popularity > 3 && $socialActive <= 63){
            $animal = "wolf";
        	$_SESSION['animal'] = "img/animals/wolf.png";  
        }
        //peacock
        else if($post > 21 && $popularity <= 3){
            $animal = "peacock";
        	$_SESSION['animal'] = "img/animals/peacock_300.png";  
        }
        //owl
        else if($socialActive <= 63 && $post <= 21){
            $animal = "owl";
        	$_SESSION['animal'] = "img/animals/owl_300.png";  
        }
        //fossile
        else{
            $animal = "not defined";
        	$_SESSION['animal'] = "img/animals/fossil_400.png";  
        }

        //database
        $sql = "SELECT * FROM animal WHERE name = '$name'";
        $result = mysql_query($sql);
        $num = mysql_num_rows($result);

        if($num == 0){
            $sql = "INSERT INTO animal (name, post, follower, following, popularity, socialActive, result) VALUES ('$name', $post, $follower, $following, $popularity, $socialActive, '$animal')";
            mysql_query($sql);
        }
        else{
            $sql = "UPDATE animal SET post = $post, follower = $follower, following = $following, popularity = $popularity, socialActive = $socialActive , result = '$animal' WHERE name = '$name'";
            mysql_query($sql);
        }

        echo '<meta http-equiv=REFRESH CONTENT=0;url=animals_face.html>';
	}

	if(isset($_POST['face'])){
		echo $_SESSION['animal'];
	}
?>
