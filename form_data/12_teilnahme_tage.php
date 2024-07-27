<script type="text/javascript">
    function teilnahmeTageCheckForErrors() {
        return "";
    }
    
    registerVerifyCallback(teilnahmeTageCheckForErrors);
</script>

<div class="formGroup" id="kindname">
    <div class="groudHeading">An welchen Tagen nimmst du teil?</div>

    <?php 
        $start=strtotime($startDate);
        $end=strtotime($endDate);
        $datediff=$end-$start;
        $numberOfDays=round($datediff / (60 * 60 * 24))+1;

        if ($numberOfDays > 14) {
            echo "<p>Formularfehler: Das Event geht länger als 14 Tage. Einzelne Teilnahme Tage können nur bei kürzeren Events angegeben werden!</p>";
        } else {
            echo "<table class=\"datetable\">";        
            for ($i = 0; $i < $numberOfDays; $i++) {
                echo "<tr><td><input type=\"checkbox\" id=\"day$i\" name=\"day$i\" value=\"x\" checked=\"checked\"></td>";
                $currentDate = strtotime($startDate."+$i day");
                echo "<td>".date("d.m.Y (l)", $currentDate)."</td></tr>";
            }
            echo "</table>";
        }
    ?>

    
    
</div>