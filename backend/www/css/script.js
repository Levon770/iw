$( document ).ready(function() {
    $('#datepicker').datepicker({
        autoclose:true,
        format:'d.m.yyyy',
        startDate: '0',
        });

    jQuery(function()
			{
				$('.scroll-pane').jScrollPane();
				
			});
   
});