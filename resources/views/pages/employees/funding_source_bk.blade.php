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
<body style="padding-top: 50px">
<div class="row">
    <div class="col s12">
        <div class='container'>
            <form method="post" action="{{route('employees.updateFunding',$employee->id)}}" id="updateBankForm">
                <div class="row">
                    <div class="input-field col s12">
                        <input id="bank_nick_name" type="text" class="validate" name="name">
                        <label for="bank_nick_name">Bank nickname</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <select id="bank_type" name="bankAccountType" class="select2 browser-default" required>
                            <option value="">Select Bank Type</option>
                            <option value="checking">Checking</option>
                            <option value="savings">Savings</option>
                        </select>
                        <label for="bank_type">Bank Type</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input class="validate" type="text" id="routingNumber" name="routingNumber" required>
                        <label for="routingNumber">Routing</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <input class="validate" type="text" id="accountNumber" name="accountNumber" required>
                        <label for="accountNumber">Bank Account</label>
                    </div>
                </div>
                <div class="row">
                    <div class="s12">
                        <input type="submit" value="Add Bank" class="waves-effect apj-save-btn btn" id="updateBankSubmitBtn"/>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col s12">
                    <div id="logs"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="logs"></div>

<div id="iavContainer"
     style="background: #fff;display: block;position: fixed;z-index: 100000;top: 5%;width: 70%;right: 20%;left: 20%; overflow-y: scroll;"></div>
<script>
    $(document).on('submit',"#updateBankForm",function (e){
        e.preventDefault();
        $.ajax({
            url: "{{route('employees.updateFunding',$employee->id)}}",
            method: 'PUT',
            type: "json",
            data: {
                _token: "{{csrf_token()}}",
                name: document.getElementById("bank_nick_name").value,
                bankAccountType: document.getElementById("bank_type").value,
                routingNumber: document.getElementById("routingNumber").value,
                accountNumber: document.getElementById("accountNumber").value,
            },
            success: function (res) {
                console.log(res);
            }
        });
    });


    $("forms").on("submit", function () {
        dwolla.configure("sandbox");
        let token = "{{$token}}";
        let bankInfo = {
            routingNumber: document.getElementById("routingNumber").value,
            accountNumber: document.getElementById("accountNumber").value,
            type: document.getElementById("bank_type").value,
            name: document.getElementById("bank_nick_name").value,
        };
        dwolla.fundingSources.create(token, bankInfo, function () {
            let $div = $("<div />");
            let logValue = {
                error: err,
                response: res,
            };
            $div.text(JSON.stringify(logValue));
            console.log(logValue);
            $("#logs").append($div);
        });
        return false;
    });


    function callDwollaBankPopup() {
        dwolla.configure('sandbox');
        dwolla.iav.start("{{$token}}", {
            container: 'iavContainer',
            stylesheets: [
                'https://fonts.googleapis.com/css?family=Lato&subset=latin,latin-ext',
                "{{asset('css/custom/dwolla_style.css')}}"
            ],
            microDeposits: false,
            fallbackToMicroDeposits: (fallbackToMicroDeposits.value === 'true'),
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
                $("#jpiModal").modal("close");
            }, success: function () {
                $('#iavContainer').hide();
                toastr.success('Submitted successfully');
                location.reload();
            }
        });
    }

     callDwollaBankPopup();
</script>
</body>
</html>
