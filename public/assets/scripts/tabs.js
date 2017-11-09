$("#content div:nth-child(1)").show();

$(".abas div:first div").addClass("selected");

$(".aba").click(function() {
	$(".aba").removeClass("selected");
	$(this).addClass("selected");
	$("#content div").toggle();
});

$(".aba").hover(function() {
	$(this).addClass("ativa")
}, 
function() {
	$(this).removeClass("ativa")
});