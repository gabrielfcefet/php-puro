$("#content div:nth-child(1)").show();

$(".abas div:first div").addClass("selected");

$(".aba").click(function() {
	$(".aba").removeClass("selected");
	$(this).addClass("selected");
	var indice = $(this).parent().index();
	indice++;
	$("#content div").hide();
	$("#content div:nth-child(" + indice + ")").show();
});

$(".aba").hover(function() {
	$(this).addClass("ativa")
}, 
function() {
	$(this).removeClass("ativa")
});