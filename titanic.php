<?php include("topbit.php")?>


	<main class="content"> 
        <?php 
            require_once 'connect.php';

if(isset($_REQUEST['sort'])){
    $sort = $_REQUEST['sort'];
}
else {
    $sort =0;
}

if ($sort=="1"){
    $sql = "SELECT * FROM titanic, country, boarded WHERE titanic.Boarded_ID = boarded.ID AND titanic.Country_ID = country.ID ORDER BY Survived";
} elseif ($sort=="2"){
    $sql = "SELECT * FROM titanic, country, boarded WHERE titanic.Boarded_ID = boarded.ID AND titanic.Country_ID = country.ID ORDER BY First";
} elseif ($sort=="3"){
    $sql = "SELECT * FROM titanic, country, boarded WHERE titanic.Boarded_ID = boarded.ID AND titanic.Country_ID = country.ID ORDER BY Country";
} elseif ($sort=="4"){
    $sql = "SELECT * FROM titanic, country, boarded WHERE titanic.Boarded_ID = boarded.ID AND titanic.Country_ID = country.ID ORDER BY Boarded";
} elseif ($sort=="5"){
    $sql = "SELECT * FROM titanic, country, boarded WHERE titanic.Boarded_ID = boarded.ID AND titanic.Country_ID = country.ID ORDER BY Fare";
} else {
      $sql = "SELECT * FROM titanic, country, boarded WHERE titanic.Boarded_ID = boarded.ID AND titanic.Country_ID = country.ID ORDER BY LastName";

}
            $result = $conn->query($sql);

//Allowing the user to sort your database - adds much usuability (user freedom)
echo '<form id="sort" action="titanic.php" method="post">';
 echo '<select name="sort">';
    echo '<option value="1">Survived</option>';
    echo '<option value="2">First</option>';
    echo '<option value="3">Country</option>';
    echo '<option value="4">Boarded</option>';
    echo '<option value="5">Fare</option>';
 echo '</select>';
echo '<button type="submit" name="submit" class="btn btn-primary">Sort</button>';
echo '</form>';




            echo '<h1 class="titanicHeading">Passengers</h1>';

            echo '<section id=titanicList>';

                if($result->num_rows > 0){
                    while($row = $result->fetch_assoc()){
                        echo '<article>';

                            echo '<h2>' . $row["Title"] . '</h2>';
                            echo '<p><spam id="title">First Name: </span<span>'. $row["First"] . '</span></p>';
                            echo '<p><spam id="title">Last Name: </span<span>'. $row["LastName"] . '</span></p>';
                            echo '<p><spam id="title">Survived: </span<span>'. $row["Survived"] . '</span></p>';
                            echo '<p><spam id="title">Class: </span<span>'. $row["Class"] . '</span></p>';
                            echo '<p><spam id="title">Age: </span<span>'. $row["Age"] . '</span></p>';
                            echo '<p><spam id="title">Country: </span<span>'. $row["Country_ID"] . '</span></p>';
                            echo '<p><spam id="title">Boarded: </span<span>'. $row["Boarded_ID"] . '</span></p>';
                            echo '<p><spam id="title">Price: </span<span>$'. number_format((float)$row["Fare"], 2, '.', '') .'</span>';
                        
                        echo '</article>';
                    }
                }

            echo '</section>';

        ?>





    </main>
		<?php include("bottombit.php")?>