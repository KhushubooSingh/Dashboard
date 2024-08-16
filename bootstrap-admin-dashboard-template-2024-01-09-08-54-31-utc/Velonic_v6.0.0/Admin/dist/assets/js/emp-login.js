
    $(document).ready(function() {
        // Fetch PF numbers and populate the dropdown
        $.ajax({
            url: 'assets/php/fetch_pf_no.php',
            method: 'GET',
            success: function(response) {
                var pfNoDropdown = $('#pf_no');
                var options = response; // No need to parse JSON, as response should be an object/array
                options.forEach(function(option) {
                    pfNoDropdown.append(new Option(option.pf_no, option.pf_no));
                });
            },
            error: function(xhr, status, error) {
                console.error('Error fetching PF numbers:', error);
            }
        });

        // When a PF number is selected, fetch and display its data
        $('#pf_no').change(function() {
            var pfNo = $(this).val();
            if (pfNo) {
                $.ajax({
                    url: 'assets/php/fetch_data.php',
                    method: 'GET',
                    data: { pf_no: pfNo },
                    success: function(response) {
                        if (response.error) {
                            alert(response.error); // Display error if there is one
                        } else {
                            // Populate the form fields with the data
                            $('#name').val(response.name || '');
                            $('#email').val(response.email || '');
                            $('#pan_no').val(response.pan_no || '');
                            $('#emp-status').val(response.status || '');
                            $('#designation').val(response.designation || '');
                            $('#bank_name').val(response.bank_name || '');
                            $('#account_no').val(response.account_no || '');
                            $('#guardian_name').val(response.guardian_name || '');
                            $('#mobile_no').val(response.mobile_no || '');
                            $('#id_no').val(response.id_no || '');
                            $('#gender').val(response.gender || '');
                            $('#alt_email').val(response.alt_email || '');
                            $('#aadhar_no').val(response.aadhar_no || '');
                            $('#joining_date').val(response.joining_date || '');
                            $('#other').val(response.other || '');
                            $('#branch_name').val(response.branch_name || '');
                            $('#ifsc_code').val(response.ifsc_code || '');
                            $('#guardian_contact').val(response.guardian_contact || '');
                            $('#address').val(response.address || '');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching data:', error);
                    }
                });
            } else {
                // Clear the form fields if no PF number is selected
                $('#name').val('');
                $('#email').val('');
                $('#pan_no').val('');
                $('#status').val('');
                $('#designation').val('');
                $('#bank_name').val('');
                $('#account_no').val('');
                $('#guardian_name').val('');
                $('#mobile_no').val('');
                $('#id_no').val('');
                $('#gender').val('');
                $('#alt_email').val('');
                $('#aadhar_no').val('');
                $('#joining_date').val('');
                $('#other').val('');
                $('#branch_name').val('');
                $('#ifsc_code').val('');
                $('#guardian_contact').val('');
                $('#address').val('');
            }
        });
    });

