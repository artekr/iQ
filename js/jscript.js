function saveData(_id, _name){

	var _linkInfo = {ID: _id, NAME: _name};
	//var _linkInfo = "test";
	window.localStorage.setItem('_LinkInfo', JSON.stringify(_linkInfo));
	return;
}


function loadData(){

	var _linkInfo = JSON.parse(window.localStorage.getItem('_LinkInfo'));
	//Checks whether the stored data exists
	if(_linkInfo) {
		//Do what you need with the object
		//document.getElementsByName('tempSurvey')[0].id=_linkInfo.ID;
		//document.getElementsByName('tempSurvey')[1].id="gallery"+_linkInfo.ID;
		//document.getElementsByName('tempSurvey')[2].id="counter"+_linkInfo.ID;
		//If you want to delete the object
		localStorage.removeItem('_Account');
	}

}