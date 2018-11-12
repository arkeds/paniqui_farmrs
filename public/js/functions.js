//disable coop input on registration
function isCoop(ownerType){
	var coop = document.querySelector("#cooperative");
	if(ownerType == "P"){
		coop.disabled = true;
		coop.removeAttr('required');
	}else if(ownerType == "C"){
		coop.disabled = false;
		coop.setAttribute("required", "required");
		coop.focus();
	}else{
		coop.disabled = true;
	}
}


function tenurialStatus(status){
	var landOwner = document.querySelector("#land_owner");
	if (status == 'T' || status == 'R'){
		landOwner.disabled = false;
		landOwner.focus();
	}else{
		landOwner.value = "";
		landOwner.disabled = true;
	}
}


function getMachines(machine_type){
	let machine_select = document.querySelector('#machines');
	machine_select.disabled = true;
	var url = "/api/usage/" + machine_type + "/machines";
	let option;
	
	machine_select.options.length = 0;
	option = document.createElement('option');
    option.text = "--SELECT MACHINE--";
    option.value = "";
    machine_select.add(option);

	$.get(url, function(response, status){
		$.each(response.data, function(i, item) {
		  	option = document.createElement('option');
	        option.text = item.machine;
	        option.value = item.code;
	        option.setAttribute('data-capacity', item.unit_capacity);
	        machine_select.add(option);
		});
		machine_select.disabled = false;
	});
	document.querySelector('#unit_capacity').innerHTML = "";
	document.querySelector('#unit_text').text = "";
	
	
}

function setUnitCapacity(){
	let machine_select = document.querySelector('#machines');
	let capacity = machine_select[machine_select.selectedIndex].getAttribute('data-capacity'); 
	document.querySelector('#unit_capacity').innerHTML = capacity;
	document.querySelector('#unit_text').text = capacity;
}

function showEngineForm(control){
	//let engine_checkbox = document.querySelector('#engine_checkbox');
	let engine_div = document.querySelector('#engine_div');
	if(control.checked){
		engine_div.style.display = "block";
	}else{
		engine_div.style.display = "none";
	}
}

//redirect on animal select change
function animalRaisers(animal){
	window.location.href = "/reports/animals/"+animal+"/raisers";
	
}

//redirect on tree select change
function treeGrowers(tree){
	window.location.href = "/reports/trees/"+tree+"/growers";
	
}


function setCropReport(){
	let crop = document.querySelector('#crop').value;
	let cropForm = document.querySelector("#cropReport");
	cropForm.action = "/reports/crops/"+crop+"/croppings"
	$('#cropForm').submit();
}