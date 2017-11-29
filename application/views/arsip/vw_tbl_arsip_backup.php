<table id="table-data" class="table table-striped">
    <thead>
      	
  	</thead>
  	<tbody>
      	<tr>
            <td colspan="<?php echo count($arrConfigTbl["tablehead"]); ?>">
            	<div style="text-align: center">
            		Loading Content . . .
            	</div>
        	</td>
      	</tr>
  	</tbody>
</table>


<script type="text/javascript">
<!--
$(document).ready(function() {
  var json = <?php echo json_encode($arrConfigTbl); ?>;
  var lib_table = new library_table(json);
});
//-->
</script>