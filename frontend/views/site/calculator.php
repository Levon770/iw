<style type="text/css">
	table td, table th {
padding: 0 10px!important;
text-align: left;
}
#total{font-weight:bold;}
</style>
<table>
<tr>
	<th>ID</th>
	<th><?php echo Yii::t('multi', 'Title')?></th>
	<th><?php echo Yii::t('multi', 'Weight')?></th>
	<th><?php echo Yii::t('multi', 'Price')?></th>
	<th><?php echo Yii::t('multi', 'Total')?></th>
</tr>
<script type="text/javascript">
 for (var i = 1; i < 11; i++) {
  document.write('<tr><td>'+i+'</td>');
  document.write('<td><input type="text" ></td>');
  document.write('<td id="ves"><input type="text"  name="value1" class="value" placeholder="0"></td>');
  document.write('<td id="price"><input type="text" name="value2" class="value" placeholder="0"></td>');
  document.write('<td id="total'+i+'">0</td>');
  document.write("</tr>");
}
</script>
<tr><td></td><td></td><td></td><th style="text-align: right;"><?php echo Yii::t('multi', 'Total')?></th>
<td id="total">0.00</td></tr>
</table>


<script type="text/javascript">
	//disbale chars, only digitds allow
    $(".value").keypress(function (eve){
       if ((eve.which != 46 || $(this).val().indexOf('.') != -1) && (eve.which < 48 || eve.which > 57) || (eve.which == 46 && $(this).caret().start == 0) ) {
    eve.preventDefault();
  }

      });
    //----

    //Calculation
	var $value = $('.value'), $temp=1; var $total = 0;
    $value.on('input', function(e){
    	var row = this.parentNode.parentNode.getElementsByTagName('input');
    	var a= row[1].value, b= row[2].value, rowtotal = parseFloat(a*b).toFixed(2);
    	this.parentNode.parentNode.cells[4].innerHTML = rowtotal;
    	var temp=0;
    	for (var i=1;i<11;i++){
    	var temptotal = document.getElementById("total"+i).innerHTML;
    	 temp = temp + parseInt(temptotal);
    	
    	}
    	
    document.getElementById("total").innerHTML = parseFloat(temp).toFixed(2);
    	//
    })
    
    //----- end calculation


</script>