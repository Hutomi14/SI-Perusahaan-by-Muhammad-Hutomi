//deklarasi mulai jquery
$('document').ready(function(){
	
	$('.datepicker').datepicker({
		'format' : 'yyyy-mm-dd'
	});

	//scrollbar untuk sidebar
    $("#sidebar").mCustomScrollbar({
        theme: "minimal"
    });

	//sidebar collapse
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('tutup');
        $('#content').toggleClass('layarpenuh');
        $('a[aria-expanded=true]').attr('aria-expanded', 'false');
    });

});