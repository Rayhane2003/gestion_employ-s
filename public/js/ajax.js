
   
$(document).ready(function () {
 
	var table = $('#myTable').DataTable({
		  ajax: {
			url: "{{ route('ajax-action') }}",
		   
			method: "POST",
			dataType: "json",
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
		  
			"dataSrc": function (response) {
				if (response.status === 200) {
					return response.employees;
				} else {
					return [];
				}
			}
		   
		},
		"columns": [
			{ "data": "id" },
			{ "data": "nom" },
			{ "data": "prénom" },
			{ "data": "dateNaissance" },
			{ "data": "	adresse" },
			{ "data": "telephone" },
			{ "data": "email" },
			{ "data": "poste" },
			{ "data": "salaire" },
			{ "data": "dateEmbauche" },
			{ "data": "statut" },
			{ "data": "typeContrat" },
			{ "data": "photoProfil" },
			{
				"data": null,
				"render": function (data, type, row) {
					return '<a href="#" class="btn btn-sm btn-success edit-btn" data-id="'+data.id+'" data-name="'+data.nom+'" data-email="'+data.email+'" data-address="'+data.address+'" data-phone="'+data.nom+'">Edit</a> ' +
					'<a href="#" class="btn btn-sm btn-danger delete-btn" data-id="'+data.id+'">Delete</a>';


				}
			}
		]
	});
	
	$('#myTable tbody').on('click', '.edit-btn', function () {
		var id = $(this).data('id');
		var name = $(this).data('name');
		var email = $(this).data('email');
		var address = $(this).data('address');
		var phone = $(this).data('phone');
	  
		$('#edit-id').val(id);
		$('#edit-name').val(name);
		$('#edit-email').val(email);
		$('#edit-address').val(address);
		$('#edit-phone').val(phone);
		$('#editModal').modal('show');
	});


	$('#employee-form').submit(function (e) {
		e.preventDefault();
		const employeedata = new FormData(this);

		$.ajax({
			url: "{{ route('store') }}",
			method: 'post',
			data: employeedata,
			cache: false,
			contentType: false,
			processData: false,
			dataType: 'json',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			success: function(response) {
				if (response.status == 200) {
					alert("Saved successfully");
					$('#employee-form')[0].reset();
					$('#exampleModal').modal('hide');
					$('#myTable').DataTable().ajax.reload();
				}
			}
		});
	});

});


$('#edit-form').submit(function (e) {
		e.preventDefault();
		const employeedata = new FormData(this);

		$.ajax({
			url: "{{ route('update') }}",
			method: 'POST',
			data: employeedata,
			cache: false,
			contentType: false,
			processData: false,
			dataType: 'json',
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			success: function(response) {
				if (response.status === 200) {
					alert(response.message);
					$('#edit-form')[0].reset();
					$('#editModal').modal('hide');
					$('#myTable').DataTable().ajax.reload();
				} else {
					alert(response.message);
				}
			}
		});
	});

	$(document).on('click', '.delete-btn', function() {
		var id = $(this).data('id');

		if (confirm('Are you sure you want to delete this employee?')) {
			$.ajax({
				url: "{{ route('delete') }}",
				type: 'DELETE',
				data: {id: id},
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				},
				success: function(response) {
					console.log(response); // Debugging: log the response
					if (response.status === 200) {
						alert(response.message); // Show success message
						$('#myTable').DataTable().ajax.reload(); // Reload the table data
					} else {
						alert(response.message); // Show error message
					}
				},
				error: function(xhr, status, error) {
					console.error(xhr); // Debugging: log the error
					alert('Error: ' + error); // Show generic error message
				}
			});
		}
	});


