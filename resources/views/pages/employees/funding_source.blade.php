<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update funding source</title>
    <script src="//cdn.dwolla.com/1/dwolla.js"></script>
</head>
<body style="padding-top: 50px">
<div id="iavContainerUpdate"></div>
<script>
    function callDwollaBankPopup() {
        dwolla.configure('{{config('services.dwolla.api_env')}}');
        dwolla.iav.start("{{$token}}", {
            container: 'iavContainerUpdate',
            stylesheets: [
                'https://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext',
                "{{asset('css/custom/dwolla_style.css')}}"
            ],
            microDeposits: false,
            fallbackToMicroDeposits: true,
            backButton: true,
        }, function (err, res) {
            console.log('Error: ' + JSON.stringify(err) + ' -- Response: ' + JSON.stringify(res));
            if (err) {
                toastr.error('Some errors occurred!');
            } else if (res._links['funding-source']['href']) {
                submitBankFundingSource(res._links['funding-source']['href']);
            }
        });
    }
    async function submitBankFundingSource(fundingSource) {
        $.ajax({
            url: "{{ route('employees.index') }}/{{Auth::user()->id}}",
            method: "PUT",
            data: {
                '_token': "{{ csrf_token() }}",
                'from': 'bank_funding_source',
                'fundingSource': fundingSource,
            }, beforeSend: function () {
            }, success: function () {
                $('#iavContainerUpdate').hide();
                $("#jpiModal").modal("close");
                toastr.success('Submitted successfully');
                location.reload();
            }
        });
    }
    callDwollaBankPopup();
</script>
</body>
</html>
