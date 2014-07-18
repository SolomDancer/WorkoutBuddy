function formCheck(formobj){
	// Enter name of mandatory fields
	var fieldRequired = Array("date","exercise1","exercise2","exercise3","exercise4"
                                ,"sets1","sets2","sets3","sets4"
                                ,"reps1","reps2","reps3" ,"reps4");
	// Enter field description to appear in the dialog box
	var fieldDescription = Array("Date","Exercise","Exercise","Exercise","Exercise"
                                ,"Number of Sets","Number of Sets","Number of Sets","Number of Sets"
                                ,"Number of Repetition","Number of Repetition","Number of Repetition","Number of Repetition");
	// dialog message
	var alertMsg = "These fileds are required:\n";
	
	var l_Msg = alertMsg.length;
	for (var i = 0; i < fieldRequired.length; i++){
            var obj = formobj.elements[fieldRequired[i]];
            if (obj){
                switch(obj.type){
                    case "select-one":
			if (obj.selectedIndex === -1 || obj.options[obj.selectedIndex].text === ""){
				alertMsg += " - " + fieldDescription[i] + "\n";
			}break;
                    case "select-multiple":
			if (obj.selectedIndex === -1){
				alertMsg += " - " + fieldDescription[i] + "\n";
			}break;
                    case "text":
                    case "textarea":
                    if (obj.value === "" || obj.value === null){
			alertMsg += " - " + fieldDescription[i] + "\n";
                    }break;
                    default:
		}
                if (obj.type === undefined) {
                    var blnchecked = false;
                    for (var j = 0; j < obj.length; j++) {
                        if (obj[j].checked) {
                            blnchecked = true;
                        }
                    }
                    if (!blnchecked) {
                        alertMsg += " - " + fieldDescription[i] + "\n";
                    }
                }
            }
	}
	if  (alertMsg.length === l_Msg){ return true;}
        else{ alert(alertMsg); return false;  }
}