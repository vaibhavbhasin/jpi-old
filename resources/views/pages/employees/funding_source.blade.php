<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Update funding source</title>
    <script src="https://cdn.dwolla.com/1/dwolla.js"></script>
</head>
<body>
<div id="iavContainer" style="background: black;display: block;position: fixed;z-index: 100000;top: 5%;width: 70%;right: 20%;left: 20%; overflow-y: scroll;"></div>
<script>
    function callDwollaBankPopup() {
        var iavToken = "{{$token}}";
        dwolla.configure('sandbox');
        dwolla.iav.start(iavToken, {
            container: 'iavContainer',
            stylesheets: [
                'https://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext'
            ],
            microDeposits: 'false',
            //   fallbackToMicroDeposits: (fallbackToMicroDeposits.value === 'true')
            fallbackToMicroDeposits: ('true')
        }, function(err, res) {
            console.log('Error: ' + JSON.stringify(err) + ' -- Response: ' + JSON.stringify(res));
            if(err){
                toastr.error('Some errors occured!');
            }
            else if(res._links['funding-source']['href'])
            {
                submitBankFundingSource(res._links['funding-source']['href']);
                location.reload();
            }
        });
    }
    async function submitBankFundingSource(fundingSource){
        $.ajax({
            url:"{{ route('employees.index') }}/{{Auth::user()->id}}",
            method:"PUT",
            data:{
                '_token': "{{ csrf_token() }}",
                'from': 'bank_funding_source',
                'fundingSource' : fundingSource,
            },success: function(data){
                $("#jpiModel").modal("close");
                $('#iavContainer').hide();
                toastr.success('The bank details has been added successfully');
            }
        });
    }
    callDwollaBankPopup();
</script>
</body>
</html>
