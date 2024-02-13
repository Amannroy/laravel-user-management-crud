$(document).ready(function(){
    $('#user-management_list').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url:"user-management",
            data: function (d) {
                d.search = $('input[type="search"]').val()
            } 
        },
        columns: [
            // {data: 'DT_RowIndex',name: "DT_RowIndex",'orderable': false, 'searchable': false},
            {data: 'name', name: 'name', 'orderable':true},
            {data: 'email', name: 'email', 'orderable':true},
            {data: 'password', name: 'password', 'orderable':true},
        ]
    });

});