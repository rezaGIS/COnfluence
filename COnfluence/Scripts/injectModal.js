

function showDetailsAjax(activityAdID) {
    var link = '@Url.Action("_PartialDetails", "ActivityAds", new { id = "-1"})'
    link = link.replace("-1", activityAdID);

    $.ajax({
        type: "GET",
        url: link,
        error: function (data)
        { },
        success: function (data) {
            $("#detailsModal .modal-body").html(data);
            $('#detailsModal').modal('show');
        },
    });
}