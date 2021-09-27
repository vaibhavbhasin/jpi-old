$(function () {
	
	$('.datepicker').datepicker({
	format:'mm-dd-yyyy'
	});
  
  
    $(document).on('change', '#check_all', function () {
        if (this.checked) {
            $('input:checkbox.check').prop('checked', true);
        } else {
            $('input:checkbox.check').prop('checked', false);
        }
    });

    $(document).on('change', '.check', function () {
        let total = $('input:checkbox.check').length;
        let checked = $('input:checkbox.check:checked').length;
        if (total === checked) {
            $('#check_all').prop('checked', true);
        } else {
            $('#check_all').prop('checked', false);
        }
    });

    $(document).on('click', '.table_action_active_inactive', function () {
        let checked = $('input:checkbox.check:checked').length;
        let status = $(this).data('status');
        let table = $(this).data('for');

        if (checked) {
            let ids = [];
            $('input:checkbox.check:checked').each(function () {
                ids.push($(this).val());
            });
            if (ids) {
                $.ajax({
                    url: "/admin/bulk-active-inactive",
                    method: 'post',
                    dataType: 'json',
                    data: {
                        ids: ids,
                        status: status,
                        table: table,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
					beforeSend: function () {
						if(status == 1)
						{
							$("#table_action_active").html('<img src="/images/loading.gif" alt="" class="loader-btn">').prop('disabled', true);
						}
						else
						{
							$("#table_action_inactive").html('<img src="/images/loading.gif" alt="" class="loader-btn">').prop('disabled', true);
						}
						
					},
                    success: function () {
                        window.location.reload();
                    }
                })
            }
        } else {
            alert('Please check any one record.');
        }
    });
    $(".switch").find("input[type=checkbox].switch_checkbox_update_status").on("change", function () {

        /*
        let status = $(this).checked();
        $.ajax({
            url: $(this).data('route'),
            method: 'PUT',
            dataType: 'json',
            data: {
                id: $(this).val(),
                active: status,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function () {
                window.location.reload();
            }
        });

         */
    });
    $(".switch").on("click", function () {
        console.log($(this).data());
        var status = $(this).find("input[type=checkbox]").prop('checked');
        // console.log(status)


    });
    $(document).on('change', '.switch_checkbox_update_status', function () {
        let id = $(this).val();
        let checked = $(`#switch_checkbox_update_status_${id}`).is(":checked");
        status = checked ? 1 : 0;
        $.ajax({
            url: $(this).data('route'),
            method: 'PUT',
            dataType: 'json',
            data: {
                id: $(this).val(),
                active: status,
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function () {
                // window.location.reload();
            }
        });

    });


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});
