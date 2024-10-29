(function(){
    $('#header-currency-dropdown').on('change',async function(){
        const url = $(this).data('url');
        const value = $(this).val();

        $.ajax({
            url: url,
            type: 'POST',
            data:JSON.stringify({
                currency:value
            }),
            contentType: 'application/json',
            success: function(response) {
                showToast('success', response.message, 'Currencies')
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
    });
})();
