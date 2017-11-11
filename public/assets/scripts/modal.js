function popUp(url, width, height, title, window){
	var horizontalPadding = 25;
    var verticalPadding = 30;
    $('<iframe  id="' + window + '" src="' + url + '" />').dialog({
        title : title,
        autoOpen : true,
        width : width,
        height : height,
        modal : true,
        resizable : false,
        autoResize : true,
        draggable: false,
        overlay : {
            opacity : 0.5,
            background : "black"
        },
        close : function() {
            $('#' + window).remove();
        }

    }).width(width - horizontalPadding).height(height - verticalPadding);
}