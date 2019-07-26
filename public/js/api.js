function send_data(ajax_url, method, el, func1, func2)
{
    if(obj = func1(el))
    {
        $.ajax({
            type: method,
            url: ajax_url,
            data: obj,
            //contentType: "application/json; charset=utf-8",
            //dataType: "json",
            success: function (data) {
                 func2(data);
            },
            error: function (errormessage) {
                alert(JSON.stringify(errormessage));
            }
        });
        return true;
    }
    else
        return false;
}

/*$( document ).ready(function(){

	}
) */

function edit(id){
	dataObj = {};
	send_data('/api/turist/'+id, 'GET', dataObj, function(dataObj){return dataObj}, function(arr){
			document.querySelector('#turists_table').style.display = 'none';	
			document.querySelector('#turist_edit').style.display = 'block';			
			document.querySelector('#turist-name').value = arr.turists.name;
			document.querySelector('#turist-surname').value = arr.turists.surname;
			document.querySelector('#turist-second_name').value = arr.turists.second_name;
			document.querySelector('#turist-birth_date').value = arr.turists.birth_date;
			document.querySelector('#turist-tel').value = arr.turists.tel;
			document.querySelector('#turist-email').value = arr.email;
			document.querySelector('#turist-passport').value = arr.turists.passport;
			document.querySelector('#turist-passport_date').value = arr.turists.passport_date;
			document.querySelector('#update_turist').id += "_" + arr.id;
		});
}

function update_turist(id){
	id = id.replace('update_turist_', '');

	dataObj = {
		'name': document.querySelector('#turist-name').value,
		'surname': document.querySelector('#turist-surname').value,
		'second_name': document.querySelector('#turist-second_name').value,
		'birth_date': document.querySelector('#turist-birth_date').value,
		'tel': document.querySelector('#turist-tel').value,
		'email': document.querySelector('#turist-email').value,
		'passport': document.querySelector('#turist-passport').value,
		'passport_date': document.querySelector('#turist-passport_date').value,
		'passport_date': document.querySelector('#turist-passport_date').value,
	};
	send_data('/api/turist/'+id, 'POST', dataObj, function(dataObj){return dataObj}, function(arr){
			//JSON.stringify(arr, null, 4);
			if(typeof arr.errors !== 'undefined'){
				$('#errors_ul li').remove();
				for(error in arr.errors){
					$('#errors_ul').append("<li>" + arr.errors[error] + "</li>");
				}
				document.querySelector('#errors').style.display = 'block';
				$("html, body").animate({ scrollTop: 0 }, "slow");
			}
			else{
				document.querySelector('#turists_table').style.display = 'block';	
				document.querySelector('#turist_edit').style.display = 'none';		
				document.querySelector('#turist-name-'+id).innerHTML = arr.turists.name;
				document.querySelector('#turist-surname-'+id).innerHTML = arr.turists.surname;
				document.querySelector('#turist-second_name-'+id).innerHTML = arr.turists.second_name;
				document.querySelector('#turist-birth_date-'+id).innerHTML = arr.turists.birth_date;
				document.querySelector('#turist-tel-'+id).innerHTML = arr.turists.tel;
				document.querySelector('#turist-email-'+id).innerHTML = arr.email;
				document.querySelector('#turist-passport-'+id).innerHTML = arr.turists.passport;
				document.querySelector('#turist-passport_date-'+id).innerHTML = arr.turists.passport_date;
				document.querySelector('#update_turist'+"_" + id).id = 'update_turist';
				document.querySelector('#errors').style.display = 'none';
				$('#errors_ul li').remove();
			}
		});
}