$(document).ready(function(){
    // DataTable initialization
    $('#user-management_list').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: "user-management",
            data: function (d) {
                d.search = $('input[type="search"]').val();
            } 
        },
        columns: [
            {data: 'name', name: 'name', 'orderable': true},
            {data: 'email', name: 'email', 'orderable': true},
            {data: 'password', name: 'password', 'orderable': true},
        ]
    });

    // Function to confirm deletion
    // function confirmDelete(userId) {
    //     if (confirm('Are you sure you want to delete this data?')) {
    //         document.getElementById('delete-user-' + userId).submit();
    //     }
    // }
});
