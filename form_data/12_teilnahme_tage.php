<script type="text/javascript">
    function teilnahmeTageCheckForErrors() {
        return [false, ""];
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
     
        for ($i = 0; $i < $numberOfDays; $i++) {
            echo "<label class=\"checkbox\">";
            echo "<input type=\"hidden\" name=\"Tag_$i\" value=\"\">";
            echo "<input type=\"checkbox\" id=\"day$i\" name=\"Tag_$i\" value=\"x\" checked=\"checked\">";
            $currentDate = strtotime($startDate."+$i day");
            echo date("d.m.Y (l)", $currentDate);
            echo "</label>";
        }
    ?>

    
    
</div>