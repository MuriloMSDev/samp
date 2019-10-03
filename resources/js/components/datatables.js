const datatable_tranlation = {
    "sEmptyTable": "Nenhum registro encontrado",
    "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
    "sInfoPostFix": "",
    "sInfoThousands": ".",
    "sLengthMenu": "Mostrar _MENU_ por página",
    "sLoadingRecords": "Carregando...",
    "sProcessing": "Processando...",
    "sZeroRecords": "Nenhum registro encontrado",
    "sSearch": "Pesquisar",
    "oPaginate": {
        "sNext": "Próximo",
        "sPrevious": "Anterior",
        "sFirst": "Primeiro",
        "sLast": "Último"
    },
    "oAria": {
        "sSortAscending": ": Ordenar colunas de forma ascendente",
        "sSortDescending": ": Ordenar colunas de forma descendente"
    }
}

const datatable_config = {
    language: datatable_tranlation,
    dom: 'l<"dt-search">rtip',
    responsive: true,
    processing: true,
    autoWidth: false,
    serverSide: true,
    order: [],
    lengthMenu: [5, 10, 25, 50, 100]
}

function start(datatableDiv) {
    let table = datatableDiv.find('.dt-table')
    let url = table.attr('url')
    let config = $.extend(true, {
        ajax: {
            url: url
        },
        columns: columns(table),
        fnCreatedRow: rows(table),
        responsive: responsive(table)
    }, datatable_config)

    let datatable = $(table).dataTable(config)

    search(datatable, datatableDiv)

    return datatable
}

function columns(table) {
    return $.map(table.find("th[column-data], th[actions]"), (el) => {
        return {
            data: $(el).attr("column-data") || null,
            name: $(el).attr("column-name") || null,
            width: $(el).attr("column-width"),
            className: $(el).attr("column-class"),
            orderable: !$(el).is("[unorderable], [actions]"),
            searchable: !$(el).is("[unsearchable], [actions]"),
            visible: !$(el).is("[invisible]")
        }
    })
}

function rows(table) {
    return (row, data) => {
        let actions = table.find("th[actions]")
        if(actions.length) {
            let links = actions.data('links')
            let div = $('<div class="options-container"></div>')
            links.forEach((action) => {
                div.append(button(action, data))
            })
            $(row).find(`td:eq(${actions.index()})`)
                .empty()
                .append(div)
        }

        options(row, table.find("th[checkbox]"), (parameter_name) => {
            return input(parameter_name, 'checkbox', data['id'])
        })

        options(row, table.find("th[radio]"), (parameter_name) => {
            return input(parameter_name, 'radio', data['id'])
        })
    }
}

function responsive(datatableTable) {
    return {
        details: {
            renderer: (api, rowIdx, columns) => {
                let table = $('<table/>', {class: 'dt-sub-table'})

                columns.forEach((col) => {
                    if(col.hidden) {
                        let value = $('<td/>').text(col.data)
                        let tableTh = datatableTable.find(`thead > tr > th:eq(${col.columnIndex})`)

                        if(tableTh.is('[actions]')) {
                            value = $('<td class="options-container"></td>')
                            tableTh.data('links').forEach((action) => {
                                value.append(button(action, col.data))
                            })
                        }

                        let tr = $('<tr/>').data('dt-row', col.rowIndex)
                            .data('dt-column', col.columnIndex)
                            .append($('<td/>').text(`${col.title}:`))
                            .append(value)

                        table.append(tr)
                    }
                })

                return table.is(':parent') ? table : false
            }
        }
    }
}

function search(datatable, datatableDiv) {
    let searchInput = $('<input/>', {
        class: 'dt-search-input form-control form-control-sm',
        placeholder: 'Pesquisar'
    })

    let searchBtn = $('<button/>', {
        class: 'dt-search-btn btn btn-sm btn-outline-primary',
        type: 'button'
    }).append($('<i/>', {class: 'fa fa-search'}))

    datatableDiv.find('.dt-search')
        .addClass('input-group')
        .append(searchInput)
        .append($('<div/>', {
            class: 'input-group-append'
        }).append(searchBtn))

    searchBtn.click(() => {
        datatable.fnFilter(searchInput.val())
    })

    searchInput.keypress(function (e) {
        if(e.which === 13) {
            e.preventDefault()
            datatable.fnFilter($(this).val())
        }
    })
}

function button(action, data) {
    let elem = $('<a/>', {
        title: action.title,
        href: processURL(action.url, data) || '#'
    }).tooltip()

    elem.append($('<i/>', {class: `fa ${action.icon} btn-sm`}))

    if(action.method) {
        elem.attr('method', action.method)

        if (action.message) {
            elem.attr('data-message', action.message)
        }
    }

    return elem
}

function input(name, type = 'text', value = '') {
    return $('<input/>', {
        type: type,
        name: name,
        value: value,
    })
}

function options(row, toMap, callback) {
    $.map(toMap, (th) => {
        let name = $(th).attr('column-data')
        let index = $(th).index()
        let option = callback(name, th)

        $(row)
        .find(`td:eq(${index})`)
        .empty()
        .append(option)
    })
}

function processURL(url, data) {
    if(!url) {
        return false
    }
    url = decodeURIComponent(url)
    let match = url.match(/\(([^)]+)\)/g)
    if(match) {
        for (let el of match) {
            let attr = el.substring(1, el.length - 1)
            if(_.get(data, attr) === undefined) {
                return false
            }
            url = url.replace(`(${attr})`, _.get(data, attr))
        }
    }
    return url
}

export default () => {
    $(".datatable").each(function() {
        start($(this))
    })
}

