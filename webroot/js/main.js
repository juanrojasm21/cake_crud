function myLinkBuilder (data, type, full, meta, edit, view, del) {
    return '<a class="btn btn-primary" role="button" href="' + edit + '/' + data + '">' + '<i class="fa-solid fa-pen-to-square"></i>' + '</a>' + '<a class="btn btn-primary" style="margin-left: 2px;" role="button" href="' + view + '/' + data + '">' + '<i class="fa-solid fa-eye"></i>' + '</a>'+ '<a class="btn btn-primary" style="margin-left: 2px;" role="button" href="' + del + '/' + data + '">' + '<i class="fa-solid fa-trash"></i>' + '</a>';
}
