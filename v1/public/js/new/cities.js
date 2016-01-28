//(function(){
function getCitiesObject() {
	
	var arrCities = {
		'AMS': 'Amsterdam',
		'BER': 'Berlin',
		'BCN': 'Barcelona',
		'LON': 'London',
		'CPH': 'Copenhagen',
		'PAR': 'Paris',
		'IST': 'Istanbul',
		'BRU': 'Brussels',
		'AGP': 'Malaga',
		'ROM': 'Rome',
		'KRK': 'Krakow',
		'TLL': 'Tallin',
		'LIS': 'Lisbon',
		/*'SEN': 'SEN',
		'LTN': 'LTN',
		'LGW': 'LGW',
		'SFX': 'SFX'*/
	};


	var cityAlias = {
		'RTM': 'AMS', 'EIN': 'AMS', 'DUS': 'AMS', 
		'SXF': 'BER', 'THF': 'BER', 'TXL': 'BER',
		'BLA': 'BCN', 'GRO': 'BCN', 
		'LCY': 'LON', 'LGW': 'LON', 'LHR': 'LON', 'LOZ': 'LON', 'STN': 'LON', 'LTN': 'LON', 
		'MMX': 'CPH', 
		'LBG': 'PAR', 'ORY': 'PAR', 'PHT': 'PAR', 'PRX': 'PAR', 'XCR': 'PAR', 'CDG': 'PAR',
		'SAW': 'IST', 
		'ANR': 'BRU', 'CRL': 'BRU', 
		'GRX': 'AGP', 'GIB': 'AGP', 'SVQ': 'AGP', 
		'CIA': 'ROM', 'FCO': 'ROM', 'PEG': 'ROM', 
		'KTW': 'KRK', 
		'HEL': 'TLL', 'TAY': 'TLL', 'TKU': 'TLL',
		'FAO': 'LIS', 

	};

	var publicAPI = {

		getCityName: function(code) {
			if(arrCities[code] != undefined) {
				return arrCities[code];
			}else if(cityAlias[code] != undefined) {
				return getCityName(cityAlias[code])
			}else{
				return code;
			}
		},

		getCityAlias: function(code) {

			if(cityAlias[code] != undefined) {
				return cityAlias[code];
			}else{
				return code;
			}
		}
	};	
	return publicAPI;
}


//})();