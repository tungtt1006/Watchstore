$('.panel_sidebar').addClass('un_active');
$('.panel_content').addClass('active_content');

$('.Header_btnsidebar').click(function() {
   if($('.panel_sidebar').hasClass('un_active')){
      $('.panel_sidebar').removeClass('un_active');
      $('.panel_content').removeClass('active_content');
      $('i.fa-search').show("fast");
   }
   else {
      $('.panel_sidebar').addClass('un_active');
      $('.panel_content').addClass('active_content');
   }
});

var i = $('span.garage').text();
$('button.plus').click(function() {
	i++;
	$('span.garage').text(i);
});

$('#Garage1').click(function() {
   var k = $('#Garage1').val()*140;
   $('#total').text("Total: $" + k +".000");
});

$('#Garage1').keyup((e)=> {
   if(e.keyCode==13) 
      $('#Garage1').click()
});