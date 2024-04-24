<?php
class Search extends MyDatabase
{
    protected function SearchMatch($cities, $hobby, $hobby2, $sex, $min_age, $max_age)
    {
        $array_filter = [];
        $array_execute = [];

        if (!empty($cities)) {
            $cityConditions = [];
            foreach (preg_split('/[\s,]+/', $cities) as $index => $city) {
                $cityConditions[] = "city LIKE CONCAT('%', :city$index, '%')";
                $array_execute[":city$index"] = $city;
            }
            $array_filter[] = "(" . implode(' OR ', $cityConditions) . ")";
        }

        $hobbyConditions = [];
        if (!empty($hobby)) {
            foreach (preg_split('/[\s,]+/', $hobby) as $index => $h) {
                $hobbyConditions[] = "hobby LIKE CONCAT('%', :hobby$index, '%')";
                $array_execute[":hobby$index"] = $h;
            }
        }
        if (!empty($hobby2)) {
            foreach (preg_split('/[\s,]+/', $hobby2) as $index => $h2) {
                $hobbyConditions[] = "hobby LIKE CONCAT('%', :hobby2$index, '%')";
                $array_execute[":hobby2$index"] = $h2;
            }
        }

        if (!empty($hobbyConditions)) {
            $array_filter[] = "(" . implode(' OR ', $hobbyConditions) . ")";
        }

        if (!empty($sex) && $sex !== "none") {
            $array_filter[] = "gender = :gender";
            $array_execute[':gender'] = $sex;
        }
        if (!empty($min_age) && !empty($max_age)) {
            $array_filter[] = "(YEAR(now()) - YEAR(birthdate)) BETWEEN :age_min AND :age_max";
            $array_execute[':age_min'] = $min_age;
            $array_execute[':age_max'] = $max_age;
        }

        $whereClause = implode(' AND ', $array_filter);
        $query = "SELECT * FROM user";
        if (!empty($whereClause)) {
            $query .= " WHERE $whereClause";
        }

        $members = $this->connectDb()->prepare($query);
        $members->execute($array_execute);
        $results = $members->fetchAll(PDO::FETCH_ASSOC);

        if (empty($results)) {
            header("Location: ../view/Homepage.php?error=nomatchfound");
            exit();
        } else {

            echo '<div class="carousel">';
            echo '<div class="cards">';
            foreach ($results as $result) {
                echo '<div class="card">';
                echo "<p>" . $result['firstname'] . " " . $result['lastname'] . "</p>";
                echo '</div>';
            }
            echo '</div>';
            echo '</div>';
            echo '<div>';
            echo '<button id="prevBtn">Previous</button>';
            echo '<button id="nextBtn">Next</button>';
            echo '</div>';
        }
    }
}
