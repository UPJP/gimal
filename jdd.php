<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
     global $dbHost, $dbUser, $dbPass, $dbName, $dbChar;
        require './dbConn.php';
        require './memberDAO.php';

        $memDB = new memberDAO($dbHost, $dbUser, $dbPass, $dbName, $dbChar);

        // $cond["username"] = "홍길동"; 
        // $cond["email"] = "hong@ansan.ac.kr"; 
        $rows = $memDB->getRowsByCondition("gimal");
        ?>
     <table>
     <div class="portfolio-group">
					<a class="portfolio-item" href="images/7-large.jpg">
						<img src="images/7-small.jpg" alt="image 7">
						<div class="detail">
							<h3>Rocky Mountain</h3>
							<p>Sed in molestie lectus. Curabitur non est neque. Maecenas id luctus ligula. Mauris dignissim ante eu arcu ultricies, at sodales orci aliquet. Duis ac laoreet mi.</p>
							<span class="btn">View</span>
						</div>
					</a>				
				</div>
                <?php
     foreach($rows as $no => $row) {
            echo "        <tr>\n";
            echo "              <td>{$row["id"]}</td>\n";
            echo "              <td>{$row["line"]}</td>\n";
            echo "              <td>{$row["name"]}</td>\n";
            echo "              <td>{$row["image"]}</td>\n";
            echo "              <td>{$row["introduction_text"]}</td>\n";
            echo "              <td>{$row["website_url"]}</td>\n";
            echo "        </tr>\n";

}   
?>  
    </table>


</body>
</html>
